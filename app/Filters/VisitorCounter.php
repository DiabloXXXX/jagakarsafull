<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\VisitorModel;

class VisitorCounter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Abaikan request ke route admin, resource files, atau AJAX
        $uri = service('uri');
        if ($uri->getSegment(1) == 'admin' || $uri->getSegment(1) == 'auth' || $request->isAJAX()) {
            return;
        }

        $ip = $request->getIPAddress();
        $agent = $request->getUserAgent()->getAgentString();
        $date = date('Y-m-d');

        $db = \Config\Database::connect();
        $builder = $db->table('visitors');

        // Cek apakah IP ini sudah tercatat HARI INI
        $exists = $builder->where('ip_address', $ip)
                          ->where('access_date', $date)
                          ->countAllResults();

        if ($exists == 0) {
            $builder->insert([
                'ip_address'   => $ip,
                'user_agent'   => substr($agent, 0, 200),
                'access_date'  => $date,
                'created_at'   => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
