<?php
$connect = mysqli_connect('localhost', 'root', '', 'sakai');
//mengambil data 5 pesan terbaru
$sql = mysqli_query($connect, "SELECT * FROM data_pengunjung ORDER BY id DESC limit 3");
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $data[] = $row;
}

echo json_encode(array("result" => $data)); ?>