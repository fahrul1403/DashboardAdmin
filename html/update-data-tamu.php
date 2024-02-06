<?php
// Include the necessary functions and establish a database connection
include("./backend/function.php");
$conn = connection(); // Implement your connection function

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = isset($_POST["id"]) ? $_POST["id"] : "";
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

    // Update data in the database
    $updateResult = updateData($id, [
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
    ]);

    if ($updateResult) {
        // Show success message using JavaScript
        echo '
        <script>
            alert("Data berhasil diupdate");
            window.location.href = "index.php";
        </script>';
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