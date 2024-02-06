<?php
$connect = mysqli_connect('localhost', 'root', '', 'sakai');

// Menghitung jumlah pesan
$sqlCount = mysqli_query($connect, "SELECT COUNT(*) AS total FROM table_klinik");
$rowCount = mysqli_fetch_assoc($sqlCount);
$totalCount = $rowCount['total'];

// Mengambil semua pesan
$sql = mysqli_query($connect, "SELECT * FROM data_klinik ORDER BY id DESC");
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}

echo json_encode(array("total" => $totalCount, "result" => $data));
?>