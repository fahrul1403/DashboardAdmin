<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $nama = isset($_POST["nama_karyawan"]) ? $_POST["nama_karyawan"] : "";
    $depart = isset($_POST["departement"]) ? $_POST["departement"] : "";
    $jam_masuk = isset($_POST["jam_masuk"]) ? $_POST["jam_masuk"] : "";
    $jam_keluar = isset($_POST["jam_keluar"]) ? $_POST["jam_keluar"] : "";
    $keluhan = isset($_POST["keluhan"]) ? $_POST["keluhan"] : "";
    $kondisi = isset($_POST["kondisi_pasien"]) ? $_POST["kondisi_pasien"] : "";
    $tanggapan = isset($_POST["tanggapan_pasien"]) ? $_POST["tanggapan_pasien"] : "";

    $formData = [
        'nama_karyawan' => $nama,
        'departement' => $depart,
        'jam_masuk' => $jam_masuk,
        'jam_keluar' => $jam_keluar,
        'keluhan' => $keluhan,
        'kondisi_pasien' => $kondisi,
        'tanggapan_pasien' => $tanggapan,
    ];
    // Perform necessary database operations or other processing
    include("./backend/function.php");

    // Assuming you have a function to insert data into the database
    $insertResult = addDataKlinik($formData);

    if ($insertResult) {
        // Redirect back to the form or any other page
        header("Location: thanks-klinik.php");
        exit();  // Make sure to exit after redirect
    }
}

// If not a POST request, retrieve data and continue with the HTML part
include("./backend/function.php");
$data = retrieveDataKlinik1();
?>
?>