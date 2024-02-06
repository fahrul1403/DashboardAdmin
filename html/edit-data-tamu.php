<?php
include("./backend/function.php");
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

// Check if the form is submitted for updating data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
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

    // Perform update operation
    $updateResult = updateData($id, $formData);

    if ($updateResult) {
        header("Location: formulir-tamu.php");
        exit;
    } else {
        echo "Error: Data not updated.";
    }
}

// Get ID from the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Retrieve data based on ID
    $data = getDataById($id);
} else {
    // Redirect if ID is not provided
    header("Location: formulir-tamu.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Tamu</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <div class="container">
        <h2>Edit Data Tamu</h2>
        <form method="post" action="update-data-tamu.php">
            <!-- Ganti action dengan file yang sesuai -->
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tamu</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Tamu:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah']; ?>">
            </div>
            <div class="form-group">
                <label for="tipe">Tipe :</label>
                <select class="form-control" id="tipe" name="tipe">
                    <option value="">--Pilih--</option>
                    <option value="Pribadi" <?= ($data['tipe'] == 'Pribadi') ? 'selected' : ''; ?>>Pribadi</option>
                    <option value="Perusahaan" <?= ($data['tipe'] == 'Perusahaan') ? 'selected' : ''; ?>>Perusahaan
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon :</label>
                <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $data['telepon']; ?>">
            </div>
            <div class="form-group">
                <label for="bertemu">Bertemu dengan:</label>
                <input type="text" class="form-control" id="bertemu" name="bertemu" value="<?= $data['bertemu']; ?>">
            </div>
            <div class="form-group">
                <label for="depart">Dari Depart/Bagian :</label>
                <input type="text" class="form-control" id="depart" name="depart" value="<?= $data['depart']; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
            </div>
            <div class="form-group">
                <label for="no_kendaraan">No Kendaraan :</label>
                <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan"
                    value="<?= $data['no_kendaraan']; ?>">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Masuk :</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal']; ?>">
            </div>
            <div class="form-group">
                <label for="jam_masuk">Jam Masuk :</label>
                <input type="time" class="form-control" id="jam_masuk" name="jam_masuk"
                    value="<?= date('H:i', strtotime($data['jam_masuk'])); ?>">
            </div>
            <div class="form-group">
                <label for="jam_keluar">Jam Keluar :</label>
                <input type="time" class="form-control" id="jam_keluar" name="jam_keluar"
                    value="<?= date('H:i', strtotime($data['jam_keluar'])); ?>">
            </div>

            <div class="form-group">
                <label for="tujuan">Tujuan Kunjungan:</label>
                <textarea class="form-control" id="tujuan" rows="4" name="tujuan"><?= $data['tujuan']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="clear_data">Belum/Sudah Bertemu :</label>
                <select class="form-control" id="clear_data" name="clear_data">
                    <option value="">--Pilih--</option>
                    <option value="Batal Kunjungan"
                        <?= ($data['clear_data'] == 'Batal Kunjungan') ? 'selected' : ''; ?>>
                        Batal Kunjungan
                    </option>
                    <option value="Belum Kunjungan"
                        <?= ($data['clear_data'] == 'Belum Kunjungan') ? 'selected' : ''; ?>>
                        Belum Kunjungan
                    </option>
                    <option value="Selesai Kunjungan"
                        <?= ($data['clear_data'] == 'Selesai Kunjungan') ? 'selected' : ''; ?>>
                        Selesai Kunjungan
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
</body>

</html>