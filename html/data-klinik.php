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
    $nama = isset($_POST["nama_karyawan"]) ? $_POST["nama_karyawan"] : "";
    $depart = isset($_POST["departement"]) ? $_POST["departement"] : "";
    $jam_masuk = isset($_POST["jam_masuk"]) ? $_POST["jam_masuk"] : "";
    $jam_keluar = isset($_POST["jam_keluar"]) ? $_POST["jam_keluar"] : "";
    $keluhan = isset($_POST["keluhan"]) ? $_POST["keluhan"] : "";
    $kondisi = isset($_POST["kondisi_pasien"]) ? $_POST["kondisi_pasien"] : "";
    $tanggapan = isset($_POST["tanggapan_pasien"]) ? $_POST["tanggapan_pasien"] : "";

    $formData = [
        'nama_karyawan' => $nama,
        'departement' => $depart,
        'jam_masuk' => $jam_masuk,
        'jam_keluar' => $jam_keluar,
        'keluhan' => $keluhan,
        'kondisi_pasien' => $kondisi,
        'tanggapan_pasien' => $tanggapan,
    ];
    // Perform necessary database operations or other processing
    include("./backend/function.php");

    // Assuming you have a function to insert data into the database
    $insertResult = addDataKlinik($formData);

    if ($insertResult) {
        // Redirect back to the form or any other page
        header("Location: thanks.php");
        exit();  // Make sure to exit after redirect
    }
}

// If not a POST request, retrieve data and continue with the HTML part
include("./backend/function.php");
$data = retrieveDataKlinik1();
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Klinik</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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

                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <button id="exportButton" class="btn btn-primary">Export Data</button>

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Data Klinik</h5>
                        <script>
                        DataTable('#example');
                        </script>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Departement</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Keluhan</th>
                                    <th>Kondisi Pasien</th>
                                    <th>Tanggapan Pasien</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row): ?>
                                <tr>
                                    <td>
                                        <?= $row['nama_karyawan']; ?>
                                    </td>
                                    <td>
                                        <?= $row['departement']; ?>
                                    </td>
                                    <td>
                                        <?= substr($row['jam_masuk'], 0, 5); ?>
                                    </td>
                                    <td>
                                        <?= substr($row['jam_keluar'], 0, 5); ?>
                                    </td>
                                    <td>
                                        <?= $row['keluhan']; ?>
                                    </td>

                                    <td>
                                        <?= $row['kondisi_pasien']; ?>
                                    </td>
                                    <td>
                                        <?= $row['tanggapan_pasien']; ?>
                                    </td>
                                    <td>
                                        <a href="edit-data-klinik.php?id=<?= $row['id']; ?>"
                                            class="btn btn-info btn-sm">Edit</a>
                                        <a href="delete-data-klinik.php?id=<?= $row['id']; ?>"
                                            class="btn btn-danger btn-sm action-buttons"
                                            onclick="return confirm('Apakah anda ingin menghapus data ini?')">Delete</a>
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
    function deleteEntry(id) {
        if (confirm('Are you sure you want to delete this entry?')) {
            // Redirect to delete-data-klinik.php with the ID to handle the deletion
            window.location.href = 'delete-data-klinik.php?id=' + id;
        }
    }
    // Function to convert the table data to CSV and trigger download
    function exportTableToCSV() {
        var table = $('#example').DataTable();

        // Get the column index to exclude the 'Action' column
        var columnIndexToExclude = table.column(':contains("Action")').index();

        // Exclude the 'Action' column from the header
        var header = table.columns().header().toArray().map(function(column, index) {
            return index !== columnIndexToExclude ? $(column).text() : null;
        }).filter(Boolean);

        // Exclude the 'Action' column from each row
        var data = table.data().toArray().map(function(row) {
            return row.filter(function(_, index) {
                return index !== columnIndexToExclude;
            });
        });

        var csv = Papa.unparse([header, ...data]);

        // Create a Blob and create a download link
        var blob = new Blob([csv], {
            type: 'text/csv;charset=utf-8;'
        });
        var link = document.createElement('a');
        var url = URL.createObjectURL(blob);
        link.href = url;
        link.setAttribute('download', 'data_klinik.csv');
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Function to handle the deletion of an entry
    function deleteEntry(id) {
        if (confirm('Are you sure you want to delete this entry?')) {
            // Redirect to delete-data-klinik.php with the ID to handle the deletion
            window.location.href = 'delete-data-klinik.php?id=' + id;
        }
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
            "buttons": [{
                extend: 'csv',
                title: 'Data Klinik',
                filename: 'data_klinik'
            }],
            "columnDefs": [{
                "targets": [2], // Index of the 'Jam Masuk' column
                "type": "time", // Specify the type for proper time sorting
                "orderSequence": ["asc", "desc"] // Sorting order: ascending and then descending
            }],
            "order": [
                [2, "asc"] // Initial sorting order based on the 'Jam Masuk' column
            ]
        });
    });
    </script>


    < /html>