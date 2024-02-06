<?php

// melakukan koneksi 
$connect = mysqli_connect('localhost', 'root', '', 'sakai');

//menghitung jumlah pesan dari tabel pesan
$query = mysqli_query($connect, "Select Count(id) as jumlah From data_pengunjung");

//menampilkan data
$hasil = mysqli_fetch_array($query);

//membuat data json
echo json_encode(array('jumlah' => $hasil['jumlah']));

?>