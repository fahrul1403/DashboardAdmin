<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Klinik</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">


        <head>
            <style>
            /* Gaya untuk pop-up */
            .popup {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                padding: 20px;
                background-color: #fff;
                border: 1px solid #ccc;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                z-index: 1000;
                overflow-y: auto;
                /* Tambahkan ini untuk menambahkan scrollbar vertikal jika kontennya lebih panjang dari pop-up */
                max-height: 80vh;
                /* Batasi tinggi pop-up agar sesuai dengan tinggi viewport */
            }

            /* Gaya untuk tombol tutup */
            .close-btn {
                margin-top: 10px;
                padding: 10px;
                background-color: #007BFF;
                color: #fff;
                border: none;
                cursor: pointer;
                align-items: center;
                text-align: center;
            }

            /* Gaya untuk drop-down */
            .dropdown {
                display: inline-block;
                cursor: pointer;
                color: #007BFF;
                text-decoration: underline;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                z-index: 1000;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                display: block;
            }

            /* Gaya untuk tombol tutup di pop-up pertama */
            .popup .close-btn {
                margin-top: 10px;
                padding: 10px;
                background-color: #007BFF;
                color: #fff;
                border: none;
                cursor: pointer;
                text-align: center;
                /* Menengahkan secara horizontal */
            }



            /* Gaya untuk tombol tutup di pop-up kedua */
            .popup-second .close-btn {
                margin-top: 10px;
                padding: 10px;
                background-color: #007BFF;
                color: #fff;
                border: none;
                cursor: pointer;
                text-align: center;
                margin-left: 50%;
                margin-right: 50%;
                max-width: 100%;
                /* Tambahkan properti max-width agar pop-up tetap responsif */
            }
            </style>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Formulir Klinik</h5>
                        <form action="insertdataklinik.php" method="post">
                            <div class="form-group">
                                <label for="nama_karyawan">Nama Karyawan:</label>
                                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"
                                    placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="departement">Departement/Section :</label>
                                <input type="text" class="form-control" id="departement" name="departement"
                                    placeholder="Ketik nama depart/bidang">
                            </div>
                            <div class="form-group">
                                <label for="jam_masuk">Jam Masuk Klinik :</label>
                                <input type="time" class="form-control" id="jam_masuk" name="jam_masuk"
                                    pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$"
                                    placeholder="Format: jam:menit pagi/malam" required>
                            </div>
                            <div class="form-group">
                                <label for="jam_keluar">Jam Keluar Klinik:</label>
                                <input type="time" class="form-control" id="jam_keluar" name="jam_keluar"
                                    placeholder="Jam Keluar">
                            </div>
                            <div class="form-group">
                                <label for="keluhan">Keluhan yang dirasakan :</label>
                                <textarea class="form-control" id="keluhan" rows="4" name="keluhan"
                                    placeholder="Masukkan keluhan Anda"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="kondisi_pasien">Bagaimana kondisi Anda setelah mendapat perawatan dari
                                    klinik
                                    PT. Sakai Indonesia?</label>
                                <select class="form-control" id="kondisi_pasien" name="kondisi_pasien">
                                    <option value="">--Pilih--</option>
                                    <option value="Merasa lebih Baik">Merasa lebih
                                        baik</option>
                                    <option value="Tidak ada perubahan">Tidak ada perubahaan</option>
                                </select>
                            </div>

                            <!-- Pertanyaan 2 -->
                            <div class="form-group">
                                <label for="tanggapan_pasien">Bagaimana tanggapan Anda mengenai pelayanan klinik PT.
                                    Sakai
                                    Indonesia?</label>
                                <select class="form-control" id="tanggapan_pasien" name="tanggapan_pasien">
                                    <option value="">--Pilih--</option>
                                    <option value="Sangat Puas">Sangat Puas</option>
                                    <option value="Puas">Puas</option>
                                    <option value="Tidak Puas">Tidak Puas</option>
                                </select> <!-- Tambahkan tag penutup di sini -->



                                <button type="submit" class="btn btn-primary btn-block">Kirim</button>


                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>



    <script src=" ../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>