<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

include("./backend/function.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
    $nama = isset($_POST["nama_karyawan"]) ? $_POST["nama_karyawan"] : "";
    $depart = isset($_POST["departement"]) ? $_POST["departement"] : "";
    $jam_masuk = isset($_POST["jam_masuk"]) ? $_POST["jam_masuk"] : "";
    $jam_keluar = isset($_POST["jam_keluar"]) ? $_POST["jam_keluar"] : "";
    $keluhan = isset($_POST["keluhan"]) ? $_POST["keluhan"] : "";
    $kondisi = isset($_POST["kondisi_pasien"]) ? $_POST["kondisi_pasien"] : "";
    $tanggapan = isset($_POST["tanggapan_pasien"]) ? $_POST["tanggapan_pasien"] : "";

    $formData = [
        'id' => $id,
        'nama_karyawan' => $nama,
        'departement' => $depart,
        'jam_masuk' => $jam_masuk,
        'jam_keluar' => $jam_keluar,
        'keluhan' => $keluhan,
        'kondisi_pasien' => $kondisi,
        'tanggapan_pasien' => $tanggapan,
    ];

    // Assuming you have a function to update data in the database
    $updateResult = updateDataKlinik($id, $formData);

    if ($updateResult) {
        $_SESSION['update_success'] = true;
        header("Location: data-klinik.php");
        exit();
    } else {
        $_SESSION['update_success'] = false;
        header("Location: edit-data-klinik.php?id=$id");
        exit();
    }
} else {
    // If not a POST request, redirect to the data-klinik.php page
    header("Location: data-klinik.php");
    exit();
}
?>