<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Tamu</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />

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

        .jarak {
            margin: 50px;
            text-align: center;
        }

        .warning {
            background-color: #ffcccc;
            padding: 10px;
            border: 1px solid #ff0000;
            color: #ff0000;
            font-weight: bold;
            text-align: center;
        }

        h3,
        p,
        ul,
        li {
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="jarak">

        <div class="warning">
            Mohon untuk membaca perihal berikut.
        </div>
        <h2>KEBIJAKAN PERUSAHAAN ▼</h2>
        <span>Kebijakan ini harus dipahami dan ditaati oleh seluruh karyawan Sakai Group serta pihak terkait lainnya
            dan
            akan ditinjau secara berkala sesuai dengan Visi serta Misi Perusahaan
        </span><br></br>
        <p>Sakai Group sebagai perusahaan pembuat alat berat untuk konstruksi jalan yang merupakan anak
            perusahaan dari Sakal Heavy Industry di Jepang, memiliki komitmen untuk melakukan perbaikan
            berkelanjutan dalam:</p>
        <ul>
            <li>• Memberikan kepuasan pelanggan dengan selalu menjaga mutu produk sesuai harapan pelanggan
                melalui penempatan kerja yang berkualitas.</li>
            <li>• Meningkatkan kemampuan setiap karyawan sesuai dengan tugas dan tanggung jawabnya melalui
                pelatihan yang memadai.</li>


            <li>• Mencegah kerugian, kecelakaan akibat kerja dan penyakit akibat kerja dengan melakukan
                penilaian & pengendalian risiko untuk mengkaji operasional Perusahaan secara sistematis.
            </li>
            <li>• Menciptakan lingkungan kerja yang aman ; terjarnin dan inklusif dengan membangun budaya dan
                etika Perusahaan yang berintegritas dan berperilaku etis serta mencegah segala bentuk pelecehan
            </li>
            <li>• Mematuhi peraturan perundangan dan persyaratan yang relevan dengan operasional perusahaan.
            </li>
            <li>• Menerapkan dan mengembangkan Sistem Manajemen Mutu, Keselamatan, Kesehatan Kerja dan
                Lingkungan yang terintegrasi
            </li>

        </ul>

        <h3>A.Informasi Umum</h3>
        <p>
            • Patuhi semua peraturan, tanda-tanda petunjuk dan instruksi yang telah disediakan.
            <br>• Semua tamu dan sekanan tidak dijinkan untuk berkeliaran di lokasi pabrik tanpa
            persetujuan/Izin khusus dari manajemen.
            <br>• Tidak dibenarkan membawa senjata api senjata tajam atau obat terlarang masuk ke area pabrik.
            <br>• Dilarang menumpang pada unit-unit produksi.
            <br>• Tukarkan KTP atau kartu identitas lainnya (sebagai jaminan untuk dikembalikan), untuk
            mendapatkan "Kartu Visitor".
            <br>• Dilarang melakukan aktivitas perkelahian perjudian, mabuk-mabukan, serta aktivitas pornografi
            atau pornoaksi di area kerja PT. Sakai Indonesia.
            <br>• Laporkan segera ke petugas sekuriti bila terjadi kecelakaan pada diri anda.
            <br>• Tanyakan bila Tidak Mengerti, Jangan mengambil RISIKO.
        </p>

        <h3>B. Batasan-batasan</h3>
        <p>
            • Pastikan kedatangan anda di PT Sakai Indonesia telah diketahui oleh orang yang dituju.
            <br>• Laporkan kedatangan anda di Pos Keamanan (Security) untuk mendapatkan Tanda Pengenal VISITOR
            dan pasang di bagian depan anda agar mudah terlihat.
            <br>• Tamu dilarang memasuki area pabrik tanpa izin dari manajemen PT Sakai Indonesia (Harus ada
            penanggung jawab).
            <br>• Tamu harus selalu didampingi oleh petugas/manajemen yang berwenang selama berada di area
            pabrik.
            <br>• Dilarang mengambil gambar atau merekam di area pabrik tanpa ada persetujuan dari Manajemen PT
            Sakai Indonesia.
            <br>• Tanyakan bila Tidak Mengerti. Jangan mengambil RISIKO.
        </p>

        <h3>C. Alat Pelindung Diri (APD)</h3>
        <p>
            • Selama berkunjung tamu harus memakai Alat Pelindung Diri sebagaimana yang telah dipersyaratkan di
            setiap area kerja.
            <br>• Saat anda akan memasuki area pabrik, pastikan diri anda telah dilengkapi dengan Safety Shoes
            dan Helm.
            <br>• Hanya tamu yang telah melaporkan kedatangannya pada bagian GA yang akan dipinjamkan APD.
            <br>• APD yang dipinjam harus dikembalikan setelah selesai. Kerusakan dan/atau kehilangan APD
            merupakan tanggung jawab peminjam/Visitor.
            <br>• Tanyakan bila Tidak Mengerti, Jangan mengambil RISIKO.
        </p>

        <h3>D. Lalu Lintas Pabrik</h3>
        <p>
            • Tamu dilarang untuk mengoperasikan/mengemudikan mobil selama berada di area pabrik tanpa izin dari
            bagian GA.
            <br>• Parkirlah kendaraan anda pada tempat-tempat yang telah disediakan. Usahakan untuk selalu
            parkir mundur.
            <br>• Tanyakan bila Tidak Mengerti, Jangan mengambil RISIKO.
        </p>

        <h3>E. Prosedur Keadaan Darurat</h3>
        <p>
            Dalam situasi emergency semuanya menjadi tidak teratur dan butuh tindakan yang cepat dalam
            penanganannya, oleh karena itu dihimbau:
            <br>• Jika anda menemukan suatu keadaan darurat dan memerlukan pertolongan penanganan, segera
            laporkan kepada pendamping anda atau dapat menghubungi sekuriti dengan mengikuti ketentuan sebagai
            berikut:
            <br> - Sebutkan "Tolong... Tolong.... Tolong....."
            <br> - Sebutkan identitas anda, jenis kejadian, lokasi kejadian, serta pertolongan yang dibutuhkan.
            <br> - Ulangi pesan yang anda sampaikan sampai mendapat tanggapan.
            <br>• Segera keluar dari ruangan bila mendengarkan sirine (alarm) atau alarm cadangan tanda bahaya
            berbunyi dan segera berkumpul di "Tempat Berkumpul Darurat".
        </p>
        <button onclick="window.location.href='video.php'" class="btn btn-primary">Lanjut ke Video Safety</button>
    </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>