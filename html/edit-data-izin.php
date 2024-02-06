<?php
session_start();
include("./backend/function.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}


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
        header("Location: formulir-perizinan-kendaraan.php");
        exit;
    } else {
        echo "Data not updated";
    }
}

// Get ID from the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Retrieve data based on ID
    $data = getDataIzinKendaraan($id);
} else {
    // Redirect if ID is not provided
    header("Location: formulir-perizinan-kendaraan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Perizinan Kendaraan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <style>
    /* Add your custom styles here if needed */
    </style>
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">


        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Formulir Perizinan Kendaraan</h5>
                    <form action="update-data-perizinan.php" method="post" onsubmit="showSuccessPopup();">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap Pemohon :</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= isset($data['nama']) ? $data['nama'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan :</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                value="<?= isset($data['jabatan']) ? $data['jabatan'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="depart">Departement : </label>
                            <input type="text" class="form-control" id="depart" name="depart"
                                value="<?= isset($data['depart']) ? $data['depart'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari : </label>
                            <input type="text" class="form-control" id="hari" name="hari"
                                value="<?= isset($data['hari']) ? $data['hari'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?= isset($data['tanggal']) ? $data['tanggal'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jam_keberangkatan">Jam Keberangkatan :</label>
                            <input type="time" class="form-control" id="jam_keberangkatan" name="jam_keberangkatan"
                                pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"
                                value="<?= isset($data['jam_keberangkatan']) ? $data['jam_keberangkatan'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan :</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan"
                                value="<?= isset($data['tujuan']) ? $data['tujuan'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="persetujuan_atasan">Persetujuan Atasan:</label>
                            <select class="form-control" id="persetujuan_atasan" name="persetujuan_atasan">
                                <option value="" <?= empty($data['persetujuan_atasan']) ? 'selected' : ''; ?>>--Pilih--
                                </option>
                                <option value="Setuju"
                                    <?= $data['persetujuan_atasan'] == 'Setuju' ? 'selected' : ''; ?>>
                                    Setuju</option>
                                <option value="Tidak Setuju"
                                    <?= $data['persetujuan_atasan'] == 'Tidak Setuju' ? 'selected' : ''; ?>>Tidak Setuju
                                </option>
                            </select>
                        </div>

                        <br><br />
                        <h5 class="card-title fw-semibold mb-4">Konfirmasi Izin Kendaraan</h5>
                        <!--This is confirmation part-->
                        <div class="form-group">
                            <label for="nama_peminta_izin">Nama :</label>
                            <input type="text" class="form-control" id="nama_peminta_izin" name="nama_peminta_izin"
                                value="<?= isset($data['nama_peminta_izin']) ? $data['nama_peminta_izin'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pengemudi">Pengemudi :</label>
                            <input type="text" class="form-control" id="pengemudi" name="pengemudi"
                                value="<?= isset($data['pengemudi']) ? $data['pengemudi'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_polisi">No. Polisi :</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi"
                                value="<?= isset($data['no_polisi']) ? $data['no_polisi'] : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="koordinator_kendaraan">Koordinator Kendaraan : </label>
                            <select class="form-control" id="koordinator_kendaraan" name="koordinator_kendaraan">
                                <option value="" <?= empty($data['koordinator_kendaraan']) ? 'selected' : ''; ?>>
                                    --Pilih--
                                </option>
                                <option value="Setuju"
                                    <?= $data['koordinator_kendaraan'] == 'Setuju' ? 'selected' : ''; ?>>
                                    Setuju</option>
                                <option value="Tidak Setuju"
                                    <?= $data['koordinator_kendaraan'] == 'Tidak Setuju' ? 'selected' : ''; ?>>Tidak
                                    Setuju
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"
                            onclick="showSuccessPopup()">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>