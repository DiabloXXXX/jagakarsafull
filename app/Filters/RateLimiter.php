<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Rate Limiter Filter
 * Protects against brute force attacks and DDoS
 */
class RateLimiter implements FilterInterface
{
    // Max requests per window
    private int $maxAttempts = 60;
    
    // Time window in seconds
    private int $decayMinutes = 1;
    
    // Stricter limits for login
    private int $loginMaxAttempts = 5;
    private int $loginDecayMinutes = 15;

    public function before(RequestInterface $request, $arguments = null)
    {
        $ip = $request->getIPAddress();
        $path = service('request')->getPath();
        
        // Stricter rate limit for login attempts
        if (str_contains($path, 'login') && $request->getMethod() === 'POST') {
            return $this->checkRateLimit($ip, 'login', $this->loginMaxAttempts, $this->loginDecayMinutes);
        }
        
        // General rate limit
        return $this->checkRateLimit($ip, 'general', $this->maxAttempts, $this->decayMinutes);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing to do after
    }

    private function checkRateLimit(string $ip, string $type, int $maxAttempts, int $decayMinutes): ?ResponseInterface
    {
        $cache = \Config\Services::cache();
        $key = "rate_limit_{$type}_" . md5($ip);
        
        $attempts = $cache->get($key);
        
        if ($attempts === null) {
            $cache->save($key, 1, $decayMinutes * 60);
            return null;
        }
        
        if ($attempts >= $maxAttempts) {
            // Log the blocked attempt
            log_message('warning', "Rate limit exceeded for IP: {$ip} on {$type}");
            
            return service('response')
                ->setStatusCode(429)
                ->setBody(view('errors/html/error_429', [
                    'message' => 'Terlalu banyak request. Silakan coba lagi dalam beberapa menit.'
                ]));
        }
        
        $cache->save($key, $attempts + 1, $decayMinutes * 60);
        return null;
    }
}
