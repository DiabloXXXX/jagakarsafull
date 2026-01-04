<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGuard implements FilterInterface
{
    /**
     * Session timeout in seconds (2 hours)
     */
    private int $sessionTimeout = 7200;

    /**
     * Do whatever processing this filter needs to do.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        // Check if logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('msg', 'Silakan login terlebih dahulu.');
        }

        // Check session timeout
        $loginTime = $session->get('login_time');
        if ($loginTime && (time() - $loginTime) > $this->sessionTimeout) {
            $session->destroy();
            log_message('info', 'Session expired for user: ' . ($session->get('username') ?? 'unknown'));
            return redirect()->to('/login')->with('msg', 'Sesi Anda telah berakhir. Silakan login kembali.');
        }

        // Validate IP address hasn't changed (session hijacking protection)
        $storedIP = $session->get('ip_address');
        $currentIP = $request->getIPAddress();
        if ($storedIP && $storedIP !== $currentIP) {
            log_message('warning', "IP mismatch detected. Stored: {$storedIP}, Current: {$currentIP}");
            $session->destroy();
            return redirect()->to('/login')->with('msg', 'Sesi tidak valid. Silakan login kembali.');
        }

        // Validate User-Agent hasn't changed significantly
        $storedUA = $session->get('user_agent');
        $currentUA = service('request')->getUserAgent()->getAgentString();
        if ($storedUA && $storedUA !== $currentUA) {
            log_message('warning', 'User-Agent mismatch detected for user: ' . $session->get('username'));
            $session->destroy();
            return redirect()->to('/login')->with('msg', 'Sesi tidak valid. Silakan login kembali.');
        }

        // Update last activity time
        $session->set('last_activity', time());
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Add security headers for admin pages
        $response->setHeader('X-Content-Type-Options', 'nosniff');
        $response->setHeader('X-Frame-Options', 'DENY');
        $response->setHeader('X-XSS-Protection', '1; mode=block');
        $response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->setHeader('Pragma', 'no-cache');
        
        return $response;
    }
}
