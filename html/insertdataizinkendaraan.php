<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $jabatan = isset($_POST["jabatan"]) ? $_POST["jabatan"] : "";
    $depart = isset($_POST["depart"]) ? $_POST["depart"] : "";
    $hari = isset($_POST["hari"]) ? $_POST["hari"] : "";
    $tanggal = isset($_POST["tanggal"]) ? $_POST["tanggal"] : "";
    $jam_keberangkatan = isset($_POST["jam_keberangkatan"]) ? $_POST["jam_keberangkatan"] : "";
    $tujuan = isset($_POST["tujuan"]) ? $_POST["tujuan"] : "";
    $nama_peminta_izin = isset($_POST["nama_peminta_izin"]) ? $_POST["nama_peminta_izin"] : "";
    $pengemudi = isset($_POST["pengemudi"]) ? $_POST["pengemudi"] : "";
    $persetujuan_atasan = isset($_POST["persetujuan_atasan"]) ? $_POST["persetujuan_atasan"] : "";
    $koordinator_kendaraan = isset($_POST["koordinator_kendaraan"]) ? $_POST["koordinator_kendaraan"] : "";

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
        'persetujuan_atasan' => $persetujuan_atasan,
        'koordinator_kendaraan' => $koordinator_kendaraan,
    ];

    // Include database connection file
    include("./backend/function.php");

    // Assuming you have a function to insert data into the database
    $insertResult = addDataIzinKendaraan($formData);

    if ($insertResult) {
        header("Location: thank-izin.php");
    } else {
        // Handle database insertion failure
        echo "Error: Data not inserted into the database.";
    }
}
?>