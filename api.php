<?php
header('Content-Type: application/json');

// Menggunakan waktu UTC dengan fungsi gmdate
date_default_timezone_set('UTC');

// Mendapatkan waktu saat ini (UTC)
$currentTime = time();

// Memulai session untuk menyimpan waktu akhir
session_start();
if (!isset($_SESSION['endTime'])) {
    // Jika belum ada waktu akhir, atur 30 menit dari waktu saat ini
    $thirtyMinutes = 30 * 60;
    $_SESSION['endTime'] = $currentTime + $thirtyMinutes;
}

// Mendapatkan waktu akhir dari sesi
$endTime = $_SESSION['endTime'];

// Menghitung sisa waktu
$timeRemaining = $endTime - $currentTime;

if ($timeRemaining <= 0) {
    // Jika hitung mundur selesai, atur ulang waktu akhir untuk 30 menit dari waktu saat ini
    $thirtyMinutes = 30 * 60;
    $_SESSION['endTime'] = $currentTime + $thirtyMinutes;
    $response = [
        'message' => 'Countdown finished!',
        'timeRemaining' => '00:00:00',
        'currentTime' => 0,
        'endTimeUTC' => '0 Jam, 0 Menit, 0 Detik'
    ];
} else {
    // Hitung mundur masih berjalan
    $hours = floor($timeRemaining / 3600);
    $minutes = floor(($timeRemaining % 3600) / 60);
    $seconds = $timeRemaining % 60;

    // Format waktu sisa
    $timeRemainingFormatted = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

    // Menghitung waktu akhir dalam format "0 Jam, 30 Menit, 0 Detik"
    $endHours = floor(($endTime - $currentTime) / 3600);
    $endMinutes = floor((($endTime - $currentTime) % 3600) / 60);
    $endSeconds = ($endTime - $currentTime) % 60;

    $endTimeFormatted = sprintf('%d Jam, %d Menit, %d Detik', $endHours, $endMinutes, $endSeconds);

    $response = [
        'message' => 'Countdown is running',
        'timeRemaining' => $timeRemainingFormatted,
        'endTimeUTC' => $endTimeFormatted,
        'currentTime' => gmdate('Y-m-d H:i:s', $currentTime)
    ];
}

// Mengirimkan response dalam format JSON
echo json_encode($response);
?>
