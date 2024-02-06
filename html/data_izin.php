<?php

// melakukan koneksi 
$connect = mysqli_connect('localhost', 'root', '', 'sakai');

//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($connect, "Select Count(id) as total From data_perizinan");

//menampilkan data
$hasil = mysqli_fetch_array($query);

//membuat data json
echo json_encode(array('total' => $hasil['total']));

?>