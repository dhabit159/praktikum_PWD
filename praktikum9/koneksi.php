<?php

// deklarasi variabel untuk parameter
$host = "localhost";
$username = "root";
$password = "";
$databasename = "akademik";

// melakukan koneksi ke database dengan mysqli_connect dengan memasukan sejumlah variabel
$con = @mysqli_connect($host, $username, $password, $databasename);

// melakukan pengecekan koneksi ke database
if (!$con) {
    // apabila koneksi gagal maka akan menampilkan pesan error
    echo "Error: " . mysqli_connect_error();
    exit();
}
