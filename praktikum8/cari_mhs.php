<?php
include_once("koneksi.php");
?>
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<form action="" method="get">
    <label>Cari :</label>
    <!-- untuk membuat input text yang akan dicari -->
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php
// untuk mengecek apakah input cari kosong atau tidak
if (isset($_GET['cari'])) {
    // jika tidak kosong maka akan memunculkan teks hasil pencarian dari kata kunci yang dicari
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
    </tr>
    <?php
    // mengecek apakan input cari kosong atau tidak
    if (isset($_GET['cari'])) {
        // untuk melakukan pencarian pada database dengan sql select berdasarkan nama yang dimasukkan
        $cari = $_GET['cari'];
        $sql = "select * from mahasiswa where nama like'%" . $cari . "%'";
        $tampil = mysqli_query($con, $sql);
    } else {
        // untuk mencari dari tabel mahasiswa semua data
        $sql = "select * from mahasiswa";
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1;
    // ketika data yang dicari ada, maka akan ditampilkan pada tabel
    while ($r = mysqli_fetch_array($tampil)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nama']; ?></td>
        </tr>
    <?php } ?>
</table>