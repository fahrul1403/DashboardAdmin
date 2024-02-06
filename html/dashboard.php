<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sakai";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data pengunjung
$queryPengunjung = "SELECT * FROM data_pengunjung";
$resultPengunjung = $conn->query($queryPengunjung);

// Memeriksa apakah query berhasil
if ($resultPengunjung) {
    // Mendapatkan hasil sebagai array
    $pengunjungData = $resultPengunjung->fetch_all(MYSQLI_ASSOC);

    // Menutup hasil query
    $resultPengunjung->close();
} else {
    echo "Error fetching pengunjung data: " . $conn->error;
    // Set $klinikData as an empty array to prevent errors
    $pengunjungData = [];
}


// Mengambil data klinik
$queryKlinik = "SELECT * FROM data_klinik";
$resultKlinik = $conn->query($queryKlinik);

// Memeriksa apakah query berhasil
if ($resultKlinik) {
    // Mendapatkan hasil sebagai array
    $klinikData = $resultKlinik->fetch_all(MYSQLI_ASSOC);

    // Menutup hasil query
    $resultKlinik->close();
} else {
    echo "Error fetching klinik data: " . $conn->error;
    // Set $klinikData as an empty array to prevent errors
    $klinikData = [];
}


// Mengambil data klinik
$queryIzin = "SELECT * FROM data_perizinan";
$resultPerizinan = $conn->query($queryIzin);

// Memeriksa apakah query berhasil
if ($resultPerizinan) {
    // Mendapatkan hasil sebagai array
    $izinData = $resultPerizinan->fetch_all(MYSQLI_ASSOC);

    // Menutup hasil query
    $resultPerizinan->close();
} else {
    echo "Error fetching klinik data: " . $conn->error;
    // Set $klinikData as an empty array to prevent errors
    $izinData = [];
}


$queryPengunjung = "SELECT COUNT(*) AS total_pengunjung FROM data_pengunjung";
$resultPengunjung = $conn->query($queryPengunjung);

$queryKlinik = "SELECT COUNT(*) AS total_klinik FROM data_klinik";
$resultKlinik = $conn->query($queryKlinik);

$totalPengunjung = 0;
$totalKlinik = 0;

if ($resultPengunjung && $resultKlinik) {
    $rowPengunjung = $resultPengunjung->fetch_assoc();
    $totalPengunjung = $rowPengunjung['total_pengunjung'];

    $rowKlinik = $resultKlinik->fetch_assoc();
    $totalKlinik = $rowKlinik['total_klinik'];
} else {
    echo "Error fetching data: " . $conn->error;
}

// Mengambil data pengunjung
$queryPerizinan = "SELECT * FROM data_perizinan";
$resultPerizinan = $conn->query($queryPerizinan);

// Memeriksa apakah query berhasil
if ($resultPerizinan) {
    // Mendapatkan hasil sebagai array
    $perizinanData = $resultPerizinan->fetch_all(MYSQLI_ASSOC);

    // Menutup hasil query
    $resultPerizinan->close();
} else {
    echo "Error fetching Perizinan data: " . $conn->error;
    // Set $klinikData as an empty array to prevent errors
    $perizinanData = [];
}

// Menutup koneksi
$conn->close();

include("./backend/function.php");
$data = retrieveData();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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

    /* Gaya untuk data panel di dashboard */
    .dashboard-container {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .data-panel {
        width: 40%;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dashboard {
        margin: 30px;
    }

    .box-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        grid-gap: 24px;
        margin-top: 36px;
    }

    .box-info li {
        padding: 24px;
        background: var(--light);
        border-radius: 20px;
        display: flex;
        align-items: center;
        grid-gap: 24px;
    }

    .box-info li .bx {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        font-size: 36px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box-info li:nth-child(1) .bx {
        background: var(--light-blue);
        color: var(--blue);
    }

    .box-info li:nth-child(2) .bx {
        background: var(--light-yellow);
        color: var(--yellow);
    }

    .box-info li:nth-child(3) .bx {
        background: var(--light-orange);
        color: var(--orange);
    }

    .box-info li .text h3 {
        font-size: 24px;
        font-weight: 600;
        color: var(--dark);
    }

    .box-info li .text p {
        color: var(--dark);
    }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include("sidebar.php"); ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <br>
            <div class="container-fluid">
                <ul class="box-info">
                    <li>
                        <i class='bx bxs-group'></i>
                        <a href="index.php" class="text">
                            <h4>Pengunjung</h4>
                            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                                Notifications <span class="badge badge-light" id="notif"></span>
                            </button>
                            <div id="pesan" class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            </div>
                        </a>
                    </li>
                    <li>
                        <i class='bx bxs-clinic'></i>
                        <a href="data-klinik.php" class="text">
                            <h4>Pasien Klinik</h4>
                            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                                Notifications <span class="badge badge-light" id="kliniknot"></span>
                            </button>
                            <div id="messeage" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            </div>
                        </a>
                    </li>
                    <li>
                        <i class='bx bxs-car'></i>
                        <a href="data-izin-kendaraan.php" class="text">
                            <h4>Izin Kendaraan</h4>
                            <button type="button" class="btn btn-primary" data-toggle="dropdown">
                                Notifications <span class="badge badge-light" id="izinnotif"></span>
                            </button>
                            <div id="izin" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            </div>
                        </a>
                    </li>
                </ul>


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Data Pengunjung</h5>
                        <script>
                        DataTable('#example');
                        </script>
                        <?php
                        // Mengurutkan data berdasarkan tanggal dan jam masuk secara descending
                        usort($data, function ($a, $b) {
                            return strtotime($b['tanggal'] . ' ' . $b['jam_masuk']) - strtotime($a['tanggal'] . ' ' . $a['jam_masuk']);
                        });

                        // Mengambil lima data teratas
                        $data = array_slice($data, 0, 5);
                        ?>

                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Tamu</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row): ?>
                                <tr>
                                    <td>
                                        <?= $row['nama']; ?>
                                    </td>
                                    <td>
                                        <?= $row['tanggal']; ?>
                                    </td>
                                    <td>
                                        <?= substr($row['jam_masuk'], 0, 5); ?>
                                    </td>
                                    <td class="<?php
                                        switch ($row['clear_data']) {
                                            case 'Belum selesai':
                                                echo 'status pending';
                                                break;
                                            case 'Batal':
                                                echo 'status cancelled';
                                                break;
                                            case 'Selesai':
                                                echo 'status completed';
                                                break;
                                            default:
                                                echo 'status unknown';
                                                break;
                                        }
                                        ?>">
                                        <?= $row['clear_data']; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <canvas id="speedChart" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="tampil.js"></script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Add an export button -->


    <!-- Tambahkan inisialisasi DataTable dengan opsi -->