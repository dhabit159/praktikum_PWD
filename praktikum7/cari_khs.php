<?php
include_once("koneksi.php");
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
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
        <th>NIM</th>
        <th>Kode MK</th>
        <th>Nilai</th>
    </tr>
    <?php
    // mengecek apakan input cari kosong atau tidak
    if (isset($_GET['cari'])) {
        // untuk melakukan pencarian pada database dengan sql select berdasarkan nim yang dimasukkan
        $cari = $_GET['cari'];
        $sql = "select * from khs where NIM = ' " . $cari . " '";
        $tampil = mysqli_query($con, $sql);
    } else {
        // untuk mencari dari tabel khs semua data
        $sql = "select * from khs";
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1;
    // ketika data yang dicari ada, maka akan ditampilkan pada tabel
    while ($r = mysqli_fetch_array($tampil)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['NIM']; ?></td>
            <td><?php echo $r['kodeMK']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>
</table>