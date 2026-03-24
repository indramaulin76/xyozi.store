<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class TimezoneFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $tz = $request->getCookie('tz') ?? 'Asia/Jakarta'; // fallback default

        if (! in_array($tz, timezone_identifiers_list())) {
            $tz = 'Asia/Jakarta';
        }

        // Ini penting:
        date_default_timezone_set($tz);
        config('App')->appTimezone = $tz;

        log_message('debug', 'Timezone aktif: ' . $tz);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Kosong
    }
}
