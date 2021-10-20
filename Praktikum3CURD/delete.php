<?php
include_once("koneksi.php");
$nim = $_GET['nim'];
$result = mysqli_query($con, "DELETE FROM mahasiswa WHERE nim='$nim'");
header("Location:index.php");
