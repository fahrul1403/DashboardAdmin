<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $jumlah = isset($_POST["jumlah"]) ? $_POST["jumlah"] : "";
    $telepon = isset($_POST["telepon"]) ? $_POST["telepon"] : "";
    $tipe = isset($_POST["tipe"]) ? $_POST["tipe"] : "";
    $bertemu = isset($_POST["bertemu"]) ? $_POST["bertemu"] : "";
    $depart = isset($_POST["depart"]) ? $_POST["depart"] : "";
    $alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : "";
    $no_kendaraan = isset($_POST["no_kendaraan"]) ? $_POST["no_kendaraan"] : "";
    $tanggal = isset($_POST["tanggal"]) ? $_POST["tanggal"] : "";
    $jam_masuk = isset($_POST["jam_masuk"]) ? $_POST["jam_masuk"] : "";
    $jam_keluar = isset($_POST["jam_keluar"]) ? $_POST["jam_keluar"] : "";
    $tujuan = isset($_POST["tujuan"]) ? $_POST["tujuan"] : "";
    $clear_data = isset($_POST["clear_data"]) ? $_POST["clear_data"] : "";
    $formData = [
        'nama' => $nama,
        'jumlah' => $jumlah,
        'tipe' => $tipe,
        'telepon' => $telepon,
        'bertemu' => $bertemu,
        'depart' => $depart,
        'alamat' => $alamat,
        'no_kendaraan' => $no_kendaraan,
        'tanggal' => $tanggal,
        'jam_masuk' => $jam_masuk,
        'jam_keluar' => $jam_keluar,
        'tujuan' => $tujuan,
        'clear_data' => $clear_data,
    ];

    // Perform necessary database operations or other processing
    include("./backend/function.php");

    // Assuming you have a function to insert data into the database
    $insertResult = addData($formData);

    if ($insertResult) {
        header("Location: thanks.php");
    } else {
        // Handle database insertion failure
        echo "Error: Data not inserted into the database.";
    }
}
?>