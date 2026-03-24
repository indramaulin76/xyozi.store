<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class TimezoneController extends Controller
{
    public function index()
    {
        // Mendapatkan Timezone default yang digunakan di server
        $serverTimezone = date_default_timezone_get();

        // Mendapatkan waktu saat ini sesuai timezone default server
        $currentTime = Time::now();

        // Menampilkan timezone dan waktu sekarang ke view (bisa juga pakai json)
        return view('timezone_view', [
            'timezone' => $serverTimezone,
            'currentTime' => $currentTime->toLocalizedString('yyyy-MM-dd HH:mm:ss')
        ]);
    }
}
