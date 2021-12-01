<?php
session_start();
include_once("koneksi.php");
$id_user = $_POST['id_user'];
$pass = md5($_POST['paswd']);
$sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
// mengecek kode captcha yang dimasukan apakah sesuai dengan kode captcha pada session
if ($_POST['captcha_code'] == $_SESSION['captcha_code']) {


    $login = mysqli_query($con, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);
    if ($ketemu > 0) {
        $_SESSION['iduser'] = $r['id_user'];
        $_SESSION['passuser'] = $r['password'];
        // menambahkan semua field kedalam session
        $_SESSION['email'] = $r['email'];
        $_SESSION['level'] = $r['level'];
        $_SESSION['nama'] = $r['nama_lengkap'];
        echo "USER BERHASIL LOGIN<br>";
        // menampilkan semua field kedalam session
        echo "id user =", $_SESSION['iduser'], "<br>";
        echo "password=", $_SESSION['passuser'], "<br>";
        echo "nama=", $_SESSION['nama'], "<br>";
        echo "email=", $_SESSION['email'], "<br>";
        echo "level=", $_SESSION['level'], "<br>";
        echo "<a href=logout.php><b>LOGOUT</b></a></center>";
    } else {
        echo "<center>Login gagal! username & password tidak benar<br>";
        echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
    }

    mysqli_close($con);
} else {
    echo "<center>Login gagal! Captcha tidak sesuai<br>";
    echo "<a href=form_login.php><b>ULANGI LAGI</b></a></center>";
}
