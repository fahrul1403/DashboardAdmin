<?php
session_start();
include("./backend/function.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $jabatan = isset($_POST["jabatan"]) ? $_POST["jabatan"] : "";
    $depart = isset($_POST["depart"]) ? $_POST["depart"] : "";
    $hari = isset($_POST["hari"]) ? $_POST["hari"] : "";
    $tanggal = isset($_POST["tanggal"]) ? $_POST["tanggal"] : "";
    $jam_keberangkatan = isset($_POST["jam_keberangkatan"]) ? $_POST["jam_keberangkatan"] : "";
    $tujuan = isset($_POST["tujuan"]) ? $_POST["tujuan"] : "";
    $nama_peminta_izin = isset($_POST["nama_peminta_izin"]) ? $_POST["nama_peminta_izin"] : "";
    $pengemudi = isset($_POST["pengemudi"]) ? $_POST["pengemudi"] : "";
    $no_polisi = isset($_POST["no_polisi"]) ? $_POST["no_polisi"] : "";
    $persetujuan_atasan = isset($_POST["persetujuan_atasan"]) ? $_POST["persetujuan_atasan"] : "";
    $koordinator_kendaraan = isset($_POST["koordinator_kendaraan"]) ? $_POST["koordinator_kendaraan"] : "";

    // Update data in the database
    $formData = [
        'nama' => $nama,
        'jabatan' => $jabatan,
        'depart' => $depart,
        'hari' => $hari,
        'tanggal' => $tanggal,
        'jam_keberangkatan' => $jam_keberangkatan,
        'tujuan' => $tujuan,
        'nama_peminta_izin' => $nama_peminta_izin,
        'pengemudi' => $pengemudi,
        'no_polisi' => $no_polisi,
        'persetujuan_atasan' => $persetujuan_atasan,
        'koordinator_kendaraan' => $koordinator_kendaraan,
    ];

    // Perform update operation
    $updateResult = updateDataIzinKendaraan($id, $formData);

    if ($updateResult) {
        // Redirect to a page after successful update
        header("Location: formulir-perizinan-kendaraan.php");
        exit;
    } else {
        // Handle database update failure
        echo "Error: Data not updated in the database.";
    }
} else {
    // Handle the case when the form is not submitted
    echo "Form not submitted";
}
?>