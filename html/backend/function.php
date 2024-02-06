<?php
// connect to db
function connection()
{
    $conn = mysqli_connect('localhost', 'root', '', 'sakai') or die('Connection to database failure!');
    return $conn;
}

function query($query)
{
    $conn = connection();
    $result = mysqli_query($conn, $query) or die('Query Failure' . mysqli_error($conn));
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function addData($data)
{
    $conn = connection();

    $nama = $data['nama'];
    $jumlah = $data['jumlah'];
    $telepon = $data['telepon'];
    $tipe = $data['tipe'];
    $bertemu = $data['bertemu'];
    $depart = $data['depart'];
    $alamat = $data['alamat'];
    $no_kendaraan = $data['no_kendaraan'];
    $tanggal = $data['tanggal'];
    $jam_masuk = $data['jam_masuk'];
    $jam_keluar = $data['jam_keluar'];
    $tujuan = $data['tujuan'];
    $clear_data = $data['clear_data'];    // query insert data
    $query = "INSERT INTO data_pengunjung 
              (nama, jumlah, telepon, tipe, bertemu, depart, alamat, no_kendaraan, tanggal, jam_masuk, jam_keluar, tujuan, clear_data)
              VALUES('$nama', '$jumlah', '$telepon', '$tipe', '$bertemu', '$depart', '$alamat', '$no_kendaraan', 
                     '$tanggal', '$jam_masuk', '$jam_keluar', '$tujuan', '$clear_data')";

    // insert data to data_pengunjung table
    $result = mysqli_query($conn, $query) or die('Query Failure: ' . mysqli_error($conn));

    // close the database connection
    mysqli_close($conn);

    // check if the data is successfully inserted
    if ($result) {
        return "Data berhasil disimpan";
    } else {
        return "Gagal menyimpan data";
    }
}

function addDataIzinKendaraan($data)
{
    $conn = connection();

    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $depart = $_POST['depart'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam_keberangkatan = $_POST['jam_keberangkatan'];
    $tujuan = $_POST['tujuan'];
    $nama_peminta_izin = $_POST['nama_peminta_izin'];
    $pengemudi = $_POST['pengemudi'];
    $no_polisi = $_POST['no_polisi'];
    $persetujuan_atasan = $_POST['persetujuan_atasan'];
    $koordinator_kendaraan = $_POST['koordinator_kendaraan'];
    $query = "INSERT INTO data_perizinan (nama, jabatan, depart, hari, tanggal, jam_keberangkatan, tujuan, nama_peminta_izin, pengemudi, no_polisi, persetujuan_atasan, koordinator_kendaraan) VALUES ('$nama', '$jabatan', '$depart', '$hari', '$tanggal', '$jam_keberangkatan', '$tujuan', '$nama_peminta_izin', '$pengemudi', '$no_polisi', '$persetujuan_atasan', '$koordinator_kendaraan')";

    // insert data to data_pengunjung table
    $result = mysqli_query($conn, $query) or die('Query Failure: ' . mysqli_error($conn));

    // close the database connection
    mysqli_close($conn);

    // check if the data is successfully inserted
    if ($result) {
        return "Data berhasil disimpan";
    } else {
        return "Gagal menyimpan data";
    }
}

function retrieveData()
{
    $conn = connection();

    // query to get all data
    $query = "SELECT * FROM data_pengunjung";
    $result = mysqli_query($conn, $query) or die('Query Failure: ' . mysqli_error($conn));

    // fetch data as an associative array
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // close the database connection
    mysqli_close($conn);

    return $data;
}

function retrieveDataKlinik1()
{
    $conn = connection();

    // query to get all data
    $query = "SELECT * FROM data_klinik";
    $result = mysqli_query($conn, $query) or die('Query Failure: ' . mysqli_error($conn));

    // fetch data as an associative array
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // close the database connection
    mysqli_close($conn);

    return $data;
}

// function.php

function updateData($id, $data)
{
    // Assume you have a database connection
    $conn = connection();

    // Escape the data to prevent SQL injection
    $nama = mysqli_real_escape_string($conn, $data['nama']);
    $jumlah = mysqli_real_escape_string($conn, $data['jumlah']);
    $telepon = mysqli_real_escape_string($conn, $data['telepon']);
    $tipe = mysqli_real_escape_string($conn, $data['tipe']);
    $bertemu = mysqli_real_escape_string($conn, $data['bertemu']);
    $depart = mysqli_real_escape_string($conn, $data['depart']);
    $alamat = mysqli_real_escape_string($conn, $data['alamat']);
    $no_kendaraan = mysqli_real_escape_string($conn, $data['no_kendaraan']);
    $tanggal = mysqli_real_escape_string($conn, $data['tanggal']);
    $jam_masuk = mysqli_real_escape_string($conn, $data['jam_masuk']);
    $jam_keluar = mysqli_real_escape_string($conn, $data['jam_keluar']);
    $tujuan = mysqli_real_escape_string($conn, $data['tujuan']);
    $clear_data = mysqli_real_escape_string($conn, $data['clear_data']);

    // Update data in the database
    $query = "UPDATE data_pengunjung SET
        nama = '$nama',
        jumlah = '$jumlah',
        telepon = '$telepon',
        tipe = '$tipe',
        bertemu = '$bertemu',
        depart = '$depart',
        alamat = '$alamat',
        no_kendaraan = '$no_kendaraan',
        tanggal = '$tanggal',
        jam_masuk = '$jam_masuk',
        jam_keluar = '$jam_keluar',
        tujuan = '$tujuan',
        clear_data = '$clear_data'
        WHERE id = $id";

    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        return true; // Data updated successfully
    } else {
        return false; // Error updating data
    }
}

// Add other functions as needed

// function.php

function getDataById($id)
{
    // Assume you have a database connection
    $conn = connection();

    // Escape the id to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Fetch data from the database based on the provided id
    $query = "SELECT * FROM data_pengunjung WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        return $data; // Return the fetched data
    } else {
        return null; // No data found for the given id
    }
}

function getDataIzinKendaraan($id)
{
    // Assume you have a database connection
    $conn = connection();

    // Escape the id to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Fetch data from the database based on the provided id
    $query = "SELECT * FROM data_perizinan WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        return $data; // Return the fetched data
    } else {
        return null; // No data found for the given id
    }
}

function addDataKlinik($data)
{
    $conn = connection();

    $nama = $data['nama_karyawan'];
    $depart = $data['departement'];
    $jam_masuk = $data['jam_masuk'];
    $jam_keluar = $data['jam_keluar'];
    $keluhan = $data['keluhan'];
    $kondisi = $data['kondisi_pasien'];
    $tanggapan = $data['tanggapan_pasien'];

    // query insert data
    $query = "INSERT INTO data_klinik
              (nama_karyawan, departement, jam_masuk, jam_keluar, keluhan, kondisi_pasien, tanggapan_pasien)
              VALUES('$nama', '$depart', '$jam_masuk', '$jam_keluar', '$keluhan', '$kondisi', '$tanggapan')";


    // insert data to data_pengunjung table
    $result = mysqli_query($conn, $query) or die('Query Failure: ' . mysqli_error($conn));

    // close the database connection
    mysqli_close($conn);

    // check if the data is successfully inserted
    if ($result) {
        return "Data berhasil disimpan";
    } else {
        return "Gagal menyimpan data";
    }
}

function retrieveDataKlinik($id)
{
    // Assume you have a database connection
    $conn = connection();

    // Perform a query to retrieve data by ID
    $query = "SELECT * FROM data_klinik WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $row;
}


function deleteData($id)
{
    $conn = connection();

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete data based on ID
    $sql = "DELETE FROM data_pengunjung WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("i", $id);

    // Execute the statement
    $stmt->execute();

    // Get the result of deletion
    $deleteResult = $stmt->affected_rows;

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return the result of deletion
    return $deleteResult > 0;
}

function deleteDataKlinik($id)
{
    $conn = connection();

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete data based on ID
    $sql = "DELETE FROM data_klinik WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("i", $id);

    // Execute the statement
    $stmt->execute();

    // Get the result of deletion
    $deleteResult = $stmt->affected_rows;

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return the result of deletion
    return $deleteResult > 0;
}

function deleteDataIzinKendaraan($id)
{
    $conn = connection();

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete data based on ID
    $sql = "DELETE FROM data_perizinan WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("i", $id);

    // Execute the statement
    $stmt->execute();

    // Get the result of deletion
    $deleteResult = $stmt->affected_rows;

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return the result of deletion
    return $deleteResult > 0;
}

function updateDataIzinKendaraan($id, $data)
{
    $conn = connection();

    // Sanitize input data to prevent SQL injection
    $nama = mysqli_real_escape_string($conn, $data['nama']);
    $jabatan = mysqli_real_escape_string($conn, $data['jabatan']);
    $depart = mysqli_real_escape_string($conn, $data['depart']);
    $hari = mysqli_real_escape_string($conn, $data['hari']);
    $tanggal = mysqli_real_escape_string($conn, $data['tanggal']);
    $jam = mysqli_real_escape_string($conn, $data['jam_keberangkatan']);
    $tujuan = mysqli_real_escape_string($conn, $data['tujuan']);
    $peminta = mysqli_real_escape_string($conn, $data['nama_peminta_izin']);
    $pengemudi = mysqli_real_escape_string($conn, $data['pengemudi']);
    $nopolisi = mysqli_real_escape_string($conn, $data['no_polisi']);
    $atasan = mysqli_real_escape_string($conn, $data['persetujuan_atasan']);
    $koordinator = mysqli_real_escape_string($conn, $data['koordinator_kendaraan']);

    // Update data in the database
    $query = "UPDATE data_perizinan SET
                nama = '$nama',
                jabatan = '$jabatan',
                depart = '$depart',
                hari = '$hari',
                tanggal = '$tanggal',
                jam_keberangkatan = '$jam',
                tujuan = '$tujuan',
                nama_peminta_izin = '$peminta',
                pengemudi = '$pengemudi',
                no_polisi = '$nopolisi',
                persetujuan_atasan = '$atasan',
                koordinator_kendaraan = '$koordinator'
              WHERE id = $id";

    $result = mysqli_query($conn, $query) or die('Query Failure: ' . mysqli_error($conn));

    // Check if the query was successful
    if ($result) {
        return "Data berhasil diperbarui";
    } else {
        return "Gagal menyimpan data";
    }
}



function updateDataKlinik($id, $formData)
{
    // Establish database connection
    $conn = connection(); // Modify this according to your connection function

    // Escape special characters to prevent SQL injection
    $nama = mysqli_real_escape_string($conn, $formData['nama_karyawan']);
    $depart = mysqli_real_escape_string($conn, $formData['departement']);
    $jam_masuk = mysqli_real_escape_string($conn, $formData['jam_masuk']);
    $jam_keluar = mysqli_real_escape_string($conn, $formData['jam_keluar']);
    $keluhan = mysqli_real_escape_string($conn, $formData['keluhan']);
    $kondisi = mysqli_real_escape_string($conn, $formData['kondisi_pasien']);
    $tanggapan = mysqli_real_escape_string($conn, $formData['tanggapan_pasien']);

    // Prepare update query
    $query = "UPDATE data_klinik SET
                nama_karyawan = '$nama',
                departement = '$depart',
                jam_masuk = '$jam_masuk',
                jam_keluar = '$jam_keluar',
                keluhan = '$keluhan',
                kondisi_pasien = '$kondisi',
                tanggapan_pasien = '$tanggapan'
              WHERE id = $id";

    // Execute update query
    $result = mysqli_query($conn, $query);

    // Check if update was successful
    if ($result) {
        return true; // Data updated successfully
    } else {
        return false; // Failed to update data
    }
}

// Fungsi untuk mengambil data terbaru dari database
function getLatestData($lastRecordId)
{
    // Sesuaikan dengan koneksi database Anda
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sakai";

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk mengambil data terbaru
    $sql = "SELECT * FROM nama_tabel WHERE id > $lastRecordId ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    // Periksa apakah ada hasil
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Tutup koneksi database
        $conn->close();
        return $row;
    } else {
        // Tutup koneksi database
        $conn->close();
        return null;
    }
}



function retrieveDataIzinKendaraan()
{
    $conn = connection();

    // query to get all data
    $query = "SELECT * FROM data_perizinan";
    $result = mysqli_query($conn, $query) or die('Query Failure: ' . mysqli_error($conn));

    // fetch data as an associative array
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // close the database connection
    mysqli_close($conn);

    return $data;
}
?>