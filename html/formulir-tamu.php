<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Tamu</title>
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
                    <h5 class="card-title fw-semibold mb-4">Formulir Kunjungan Tamu</h5>
                    <form action="insertdatatamu.php" method="post" onsubmit="showSuccessPopup();">
                        <div class="form-group">
                            <label for="nama">Nama Tamu:</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah Tamu:</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                placeholder="Masukan jumlah (Misal : 3)">
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe : </label>
                            <select class="form-control" id="tipe" name="tipe">
                                <option value="">--Pilih--</option>
                                <option value="Pribadi">Pribadi</option>
                                <option value="Perusahaan">Perusahaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon : </label>
                            <input type="number" class="form-control" id="telepon" name="telepon"
                                placeholder="08xxxxxxxxx">
                        </div>
                        <div class="form-group">
                            <label for="bertemu">Bertemu dengan:</label>
                            <input type="text" class="form-control" id="bertemu" name="bertemu"
                                placeholder="Ketik nama">
                        </div>
                        <div class="form-group">
                            <label for="depart">Dari Depart/Bagian :</label>
                            <input type="text" class="form-control" id="depart" name="depart"
                                placeholder="Ketik nama depart/bidang">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group">
                            <label for="no_kendaraan">No Kendaraan :</label>
                            <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan"
                                placeholder="Masukkan nomor kendaraan yang digunakan">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Masuk :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                placeholder="Masukkan tanggal masuk">
                        </div>
                        <div class="form-group">
                            <label for="jam_masuk">Jam Masuk :</label>
                            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk">
                        </div>
                        <div class="form-group">
                            <label for="jam_keluar">Jam Keluar :</label>
                            <input type="text" class="form-control" id="jam_keluar" name="jam_keluar"
                                placeholder="Silahkan dikosongkan" disabled>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan Kunjungan:</label>
                            <textarea class="form-control" id="tujuan" rows="4" name="tujuan"
                                placeholder="Masukkan tujuan kunjungan Anda"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="clear_data" hidden>Belum/Sudah Bertemu : </label>
                            <select class="form-control" id="clear_data" name="clear_data" hidden>
                                <option value="">--Pilih--</option>
                                <option value="Belum Kunjungan" selected>Belum</option>
                                <option value="Selesai Kunjungan">Selesai</option>
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