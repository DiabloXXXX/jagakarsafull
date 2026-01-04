<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * Max failed login attempts before lockout
     */
    private int $maxLoginAttempts = 5;
    
    /**
     * Lockout duration in minutes
     */
    private int $lockoutDuration = 15;

    public function index()
    {
        // If already logged in, redirect to dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('auth/login');
    }

    public function login()
    {
        // If already logged in, redirect
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        $session = session();
        $model = new UserModel();

        // Validate CSRF
        if (!$this->validate(['csrf_test_name' => 'required'])) {
            log_message('warning', 'CSRF validation failed on login from IP: ' . $this->request->getIPAddress());
            return redirect()->to('/login')->with('msg', 'Sesi tidak valid. Silakan coba lagi.');
        }

        $email = trim($this->request->getVar('email'));
        $password = $this->request->getVar('password');
        $ip = $this->request->getIPAddress();

        // Check if IP is locked out
        if ($this->isLockedOut($ip)) {
            log_message('warning', "Login attempt from locked out IP: {$ip}");
            $session->setFlashdata('msg', 'Akun terkunci sementara karena terlalu banyak percobaan gagal. Coba lagi dalam ' . $this->lockoutDuration . ' menit.');
            return redirect()->to('/login');
        }

        // Basic validation
        if (empty($email) || empty($password)) {
            $session->setFlashdata('msg', 'Email dan password harus diisi.');
            return redirect()->to('/login');
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->recordFailedAttempt($ip);
            $session->setFlashdata('msg', 'Format email tidak valid.');
            return redirect()->to('/login');
        }

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Clear failed attempts on successful login
            $this->clearFailedAttempts($ip);
            
            // Regenerate session ID to prevent session fixation
            session()->regenerate(true);
            
            $session->set([
                'id'         => $user['id'],
                'username'   => $user['username'],
                'email'      => $user['email'],
                'login_time' => time(),
                'ip_address' => $ip,
                'user_agent' => $this->request->getUserAgent()->getAgentString(),
                'isLoggedIn' => true
            ]);
            
            log_message('info', "Successful login for user: {$user['email']} from IP: {$ip}");
            
            return redirect()->to('/admin/dashboard');
        } else {
            // Record failed attempt
            $this->recordFailedAttempt($ip);
            $remainingAttempts = $this->getRemainingAttempts($ip);
            
            log_message('warning', "Failed login attempt for email: {$email} from IP: {$ip}");
            
            if ($remainingAttempts > 0) {
                $session->setFlashdata('msg', "Email atau password salah. Sisa percobaan: {$remainingAttempts}");
            } else {
                $session->setFlashdata('msg', 'Akun terkunci sementara karena terlalu banyak percobaan gagal.');
            }
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $user = session()->get('username');
        log_message('info', "User logged out: {$user}");
        
        session()->destroy();
        return redirect()->to('/login');
    }

    /**
     * Check if IP is locked out
     */
    private function isLockedOut(string $ip): bool
    {
        $cache = \Config\Services::cache();
        $key = 'login_lockout_' . md5($ip);
        return $cache->get($key) === true;
    }

    /**
     * Record a failed login attempt
     */
    private function recordFailedAttempt(string $ip): void
    {
        $cache = \Config\Services::cache();
        $key = 'login_attempts_' . md5($ip);
        
        $attempts = $cache->get($key) ?? 0;
        $attempts++;
        
        $cache->save($key, $attempts, $this->lockoutDuration * 60);
        
        if ($attempts >= $this->maxLoginAttempts) {
            // Lock out the IP
            $lockKey = 'login_lockout_' . md5($ip);
            $cache->save($lockKey, true, $this->lockoutDuration * 60);
            log_message('warning', "IP locked out due to too many failed attempts: {$ip}");
        }
    }

    /**
     * Get remaining login attempts
     */
    private function getRemainingAttempts(string $ip): int
    {
        $cache = \Config\Services::cache();
        $key = 'login_attempts_' . md5($ip);
        $attempts = $cache->get($key) ?? 0;
        return max(0, $this->maxLoginAttempts - $attempts);
    }

    /**
     * Clear failed attempts after successful login
     */
    private function clearFailedAttempts(string $ip): void
    {
        $cache = \Config\Services::cache();
        $cache->delete('login_attempts_' . md5($ip));
        $cache->delete('login_lockout_' . md5($ip));
    }

    // =====================================================
    // REGISTRATION DISABLED FOR SECURITY
    // Admin users should only be created by existing admins
    // =====================================================
    
    /**
     * Registration is disabled in production for security
     * Uncomment only if needed during development
     */
    /*
    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        // Registration logic - DISABLED
    }
    */
}
