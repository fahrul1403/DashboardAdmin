<?php
session_start();
include("./backend/function.php");

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the data based on the ID for pre-filling the form
    $rowData = retrieveDataKlinik($id);

    if (!$rowData) {
        // Redirect if the data is not found
        header('Location: data-klinik.php');
        exit();
    }
} else {
    // Redirect if the ID is not set
    header('Location: data-klinik.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Klinik</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!-- Your navigation and header code can be added here -->

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Data Klinik</h5>
                <form action="update-data-klinik.php" method="post">
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan:</label>
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"
                            placeholder="Masukkan nama"
                            value="<?= isset($rowData['nama_karyawan']) ? $rowData['nama_karyawan'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="departement">Departement/Section :</label>
                        <input type="text" class="form-control" id="departement" name="departement"
                            placeholder="Ketik nama depart/bidang"
                            value="<?= isset($rowData['departement']) ? $rowData['departement'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jam_masuk">Jam Masuk Klinik :</label>
                        <input type="time" class="form-control" id="jam_masuk" name="jam_masuk"
                            pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" placeholder="Format: jam:menit pagi/malam"
                            required value="<?= isset($rowData['jam_masuk']) ? $rowData['jam_masuk'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jam_keluar">Jam Keluar Klinik:</label>
                        <input type="time" class="form-control" id="jam_keluar" name="jam_keluar"
                            placeholder="Jam Keluar"
                            value="<?= isset($rowData['jam_keluar']) ? $rowData['jam_keluar'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan yang dirasakan :</label>
                        <textarea class="form-control" id="keluhan" rows="4" name="keluhan"
                            placeholder="Masukkan keluhan Anda"><?= isset($rowData['keluhan']) ? $rowData['keluhan'] : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="kondisi_pasien">Bagaimana kondisi Anda setelah mendapat perawatan dari klinik PT.
                            Sakai Indonesia?</label>
                        <select class="form-control" id="kondisi_pasien" name="kondisi_pasien">
                            <option value="" <?= empty($rowData['kondisi_pasien']) ? 'selected' : ''; ?>>--Pilih--
                            </option>
                            <option value="Merasa lebih Baik" <?= $rowData['kondisi_pasien'] == 'Merasa lebih Baik' ? 'selected' : ''; ?>>Merasa lebih
                                Baik</option>
                            <option value="Tidak ada perubahan" <?= $rowData['kondisi_pasien'] == 'Tidak ada perubahan' ? 'selected' : ''; ?>>Tidak ada
                                perubahaan</option>
                        </select>
                    </div>

                    <!-- Pertanyaan 2 -->
                    <div class="form-group">
                        <label for="tanggapan_pasien">Bagaimana tanggapan Anda mengenai pelayanan klinik PT. Sakai
                            Indonesia?</label>
                        <select class="form-control" id="tanggapan_pasien" name="tanggapan_pasien">
                            <option value="" <?= empty($rowData['tanggapan_pasien']) ? 'selected' : ''; ?>>--Pilih--
                            </option>
                            <option value="Sangat Puas" <?= $rowData['tanggapan_pasien'] == 'Sangat Puas' ? 'selected' : ''; ?>>Sangat Puas
                            </option>
                            <option value="Puas" <?= $rowData['tanggapan_pasien'] == 'Puas' ? 'selected' : ''; ?>>Puas
                            </option>
                            <option value="Tidak Puas" <?= $rowData['tanggapan_pasien'] == 'Tidak Puas' ? 'selected' : ''; ?>>Tidak Puas
                            </option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Your footer and script includes can be added here -->
</body>

</html>