<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if the delete success message is set
if (isset($_SESSION['delete_success']) && $_SESSION['delete_success']) {
    echo '<script>alert("Data berhasil dihapus.");</script>';
    // Reset the session variable
    $_SESSION['delete_success'] = false;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
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
    ];

    // Perform necessary database operations or other processing
    include("./backend/function.php");

    // Assuming you have a function to insert data into the database
    $insertResult = addData($formData);

    if ($insertResult) {
        header("Location: thanks.php");
        // Show success message using JavaScript
        echo '<script>showNotificationInFormulir("' . $formData['nama'] . '", "' . $formData['bertemu'] . '");</script>';

        // Redirect back to the form or any other page after showing the pop-up
        echo '<script>window.location.href = "formulir-tamu.php";</script>';
        exit;
    } else {
        // Handle database insertion failure
        echo "Error: Data not inserted into the database.";
    }
} else {
    // Handle the case when the form is not submitted
    echo "";
}

include("./backend/function.php");
$data = retrieveData();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tamu</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


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
                            <div id="notificationContainer"
                                style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>

                            <i class="ti ti-menu-2"></i>
                            <!-- Tambahkan ini di dalam body Anda -->
                            <div id="notificationContainer"
                                style="position: fixed; top: 20px; right: 20px; z-index: 1000;"></div>

                            </a>
                        </li>
                        <li class="nav-item">

                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <button id="exportButton" class="btn btn-primary">Export Data</button>

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Data Pengunjung</h5>
                        <script>
                        DataTable('#example');
                        </script>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Tamu</th>
                                    <th>Jumlah</th>
                                    <th>Tipe Kunjungan</th>
                                    <th>Bertemu dengan</th>
                                    <th>Dari Departement</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>No Polisi Kendaraan</th>
                                    <th>Tujuan Kunjungan</th>
                                    <th>Action</th>
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
                                        <?= $row['jumlah']; ?>
                                    </td>
                                    <td>
                                        <?= $row['tipe']; ?>
                                    </td>
                                    <td>
                                        <?= $row['bertemu']; ?>
                                    </td>
                                    <td>
                                        <?= $row['depart']; ?>
                                    </td>
                                    <td>
                                        <?= $row['tanggal']; ?>
                                    </td>
                                    <td>
                                        <?= substr($row['jam_masuk'], 0, 5); ?>
                                    </td>
                                    <td>
                                        <?= substr($row['jam_keluar'], 0, 5) ?: '--:--'; ?>
                                    </td>
                                    <td>
                                        <?= $row['alamat']; ?>
                                    </td>
                                    <td>
                                        <?= $row['telepon']; ?>
                                    </td>
                                    <td>
                                        <?= $row['no_kendaraan']; ?>
                                    </td>
                                    <td>
                                        <?= $row['tujuan']; ?>
                                    </td>
                                    <td>
                                        <a href="edit-data-tamu.php?id=<?= $row['id']; ?>"
                                            class="btn btn-info btn-sm action-buttons">Edit</a>
                                        <a href="delete-data-tamu.php?id=<?= $row['id']; ?>"
                                            class="btn btn-danger btn-sm action-buttons"
                                            onclick="return confirm('Apakah anda ingin menghapus data ini?')">Delete</a>
                                    </td>
                                    <td>
                                        <?= $row['clear_data']; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script>
    // Function to convert the table data to CSV and trigger download
    function exportTableToCSV() {
        // Disable action buttons before exporting
        disableActionButtons(true);

        var table = $('#example').DataTable();
        var header = table.columns().header().toArray().map(function(column) {
            return $(column).text();
        });

        // Exclude 'Action' and 'Telah Bertemu' columns from header
        var excludeColumns = ['Action', 'Telah Bertemu'];
        var headerFiltered = header.filter(function(col) {
            return !excludeColumns.includes(col);
        });

        var data = table.data().toArray().map(function(row) {
            // Exclude 'Action' and 'Telah Bertemu' columns from data
            return row.filter(function(_, index) {
                return !excludeColumns.includes(header[index]);
            });
        });

        var csv = Papa.unparse([headerFiltered, ...data]);

        // Create a Blob and create a download link
        var blob = new Blob([csv], {
            type: 'text/csv;charset=utf-8;'
        });
        var link = document.createElement('a');
        var url = URL.createObjectURL(blob);
        link.href = url;
        link.setAttribute('download', 'data_pengunjung.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        // Enable action buttons after exporting
        disableActionButtons(false);
    }

    // Function to disable/enable action buttons
    function disableActionButtons(disable) {
        var actionButtons = document.querySelectorAll('.action-buttons');

        actionButtons.forEach(function(button) {
            button.disabled = disable;
        });
    }

    // Attach click event to the export button
    document.getElementById('exportButton').addEventListener('click', exportTableToCSV);

    // Initialize DataTable with options
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "dom": 'lBfrtip',
            "order": [
                [5, 'asc'],
                [6, 'asc']
            ], // Urutkan berdasarkan kolom tanggal dan jam masuk secara ascending
            "buttons": [{
                extend: 'csv',
                title: 'Data Pengunjung',
                filename: 'data_pengunjung',
                exportOptions: {
                    columns: ':visible' // Ekspor semua kolom yang terlihat
                }
            }],
            "columnDefs": [{
                    "targets": [0, 3, 5, 6, 7, 12, 13],
                    "visible": true
                },
                {
                    "targets": '_all',
                    "visible": false
                }
            ]
        });
    });


    // Function to handle checkbox state change
    function handleCheckboxChange(checkbox) {
        // Perform any additional actions here based on checkbox state
        // For example, you can update the database or show/hide elements
        // related to the checkbox state.

        // Here, we're just logging the state to the console
        console.log("Checkbox state changed:", checkbox.checked);
    }

    // Attach an event listener to all checkboxes with the class "action-buttons"
    document.querySelectorAll('.action-buttons').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            handleCheckboxChange(this);
        });
    });


    function checkForNewData() {
        $.ajax({
            url: 'checkNewData.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data) {
                    // Tampilkan notifikasi
                    showNotification(data.nama, data.bertemu);
                }
            },
            complete: function() {
                // Lakukan polling setiap 10 detik (sesuaikan dengan kebutuhan Anda)
                setTimeout(checkForNewData, 10000);
            }
        });
    }

    // Fungsi untuk menampilkan notifikasi
    function showNotification(nama, bertemu) {
        var notification = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data baru!</strong> ${nama} ingin bertemu dengan ${bertemu}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
        $('#notificationContainer').prepend(notification);
    }

    // Panggil fungsi polling saat halaman dimuat
    $(document).ready(function() {
        checkForNewData();
    });
    </script>


    < /html>