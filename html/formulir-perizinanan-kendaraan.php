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
                    <form action="insertdataizinkendaraan.php" method="post" onsubmit="showSuccessPopup();">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap Pemohon :</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan :</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan"
                                placeholder="Apa jabatan anda?">
                        </div>
                        <div class="form-group">
                            <label for="depart">Departement : </label>
                            <input type="text" class="form-control" id="depart" name="depart"
                                placeholder="Dari Departement mana?">
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari : </label>
                            <input type="text" class="form-control" id="hari" name="hari" placeholder="Hari pengajuan">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                placeholder="Masukan tanggal pengajuan">
                        </div>
                        <div class="form-group">
                            <label for="jam_keberangkatan">Jam Keberangkatan :</label>
                            <input type="time" class="form-control" id="jam_keberangkatan" name="jam_keberangkatan"
                                placeholder="Masukan jam keberangkatan">
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan :</label>
                            <textarea type="text" class="form-control" id="tujuan" name="tujuan"
                                placeholder="Masukan tujuan penggunaan kendaraan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="persetujuan_atasan">Persetujuan Atasan : </label>
                            <select class="form-control" id="persetujuan_atasan" name="persetujuan_atasan">
                                <option value="">--Pilih--</option>
                                <option value="Setuju">Setuju</option>
                                <option value="Tidak Setuju">Tidak Setuju</option>
                            </select>
                        </div>


                        <!--This is confirmation part-->
                        <div class="form-group" hidden>
                            <label for="nama_peminta_izin">Nama :</label>
                            <input type="text" class="form-control" id="nama_peminta_izin" name="nama_peminta_izin"
                                placeholder="Masukkan nama anda">
                        </div>
                        <div class="form-group" hidden>
                            <label el for="pengemudi">Pengemudi :</label>
                            <input type="date" class="form-control" id="pengemudi" name="pengemudi"
                                placeholder="Masukkan nama pengemudi">
                        </div>
                        <div class="form-group" hidden>
                            <label for="no_polisi">No. Polisi :</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi">
                        </div>
                        <h5 class="card-title fw-semibold mb-4" hidden>Konfirmasi Perizinan Menggunakana Kendaraan</h5>
                        <div class="form-group" hidden>
                            <label for="koordinator_kendaraan">Koordinator Kendaraan : </label>
                            <select class="form-control" id="koordinator_kendaraan" name="koordinator_kendaraan">
                                <option value="">--Pilih--</option>
                                <option value="Setuju">Setuju</option>
                                <option value="Tidak Setuju">Tidak Setuju</option>
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