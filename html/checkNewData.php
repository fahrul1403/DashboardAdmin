<?php
session_start();

include("./backend/function.php");

// Fungsi untuk memeriksa apakah ada data baru
function checkNewData()
{
    $lastRecordId = isset($_SESSION['last_record_id']) ? $_SESSION['last_record_id'] : 0;

    // Ambil data terbaru dari database
    $latestData = getLatestData($lastRecordId);

    if ($latestData) {
        $_SESSION['last_record_id'] = $latestData['id'];
        return json_encode(['nama' => $latestData['nama'], 'bertemu' => $latestData['bertemu']]);
    }

    return null;
}

// Panggil fungsi dan kirimkan hasilnya sebagai JSON
echo checkNewData();
?>