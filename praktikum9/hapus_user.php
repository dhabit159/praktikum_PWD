<?php
include_once("koneksi.php");
$sql = "DELETE from users where id_user= '$_GET[id]'";
mysqli_query($con, $sql);
mysqli_close($con);
header('location:tampil_user.php');
