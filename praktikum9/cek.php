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
?>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Kode MK</th>
            <th>Nama Matakuliah</th>
            <th>Nilai</th>
        </tr>
    <?php } else { ?>
        <table border="1">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Kode MK</th>
                <th>Nilai</th>
            </tr>
            <?php }
        // mengecek apakan input cari kosong atau tidak
        $cek = false;
        if (isset($_GET['cari'])) {
            // untuk melakukan pencarian pada database dengan sql select berdasarkan nim yang dimasukkan
            $cari = $_GET['cari'];
            $sql = "SELECT * FROM khs WHERE NIM = '$cari'";
            $tampil = mysqli_query($con, $sql);
            if ($tampil) {
                $mhs = "SELECT * FROM mahasiswa WHERE NIM = '$cari'";
                $cek_mhs = mysqli_query($con, $mhs);

                while ($c = mysqli_fetch_array($cek_mhs)) {
                    $namaMhs = $c['nama'];
                }
                if ($cek_mhs) {
                    while ($c = mysqli_fetch_array($tampil)) {
                        $k = $c['kodeMK'];
                    }
                    $mk = "SELECT * FROM matakuliah WHERE kode = '$k'";
                    $cek_mk = mysqli_query($con, $mk);

                    while ($d = mysqli_fetch_array($cek_mk)) {
                        $nmMK = $d['nama'];
                    }
                }
            }
        } else {
            // untuk mencari dari tabel khs semua data
            $sql = "select * from khs";
            $tampil = mysqli_query($con, $sql);
        }
        $no = 1;
        // ketika data yang dicari ada, maka akan ditampilkan pada tabel
        while ($r = mysqli_fetch_array($tampil)) {
            if (isset($_GET['cari'])) {
                // $nim = $r['NIM'];
                // $kd = $r['kodeMk'];
                // $ny = $r['nilai'];
                $ny = "ananana";
                var_dump($ny);
                die;
                // tabel($no, $nim, $namaMhs, $kd, $nmMK, $ny);
            } else {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $r['NIM']; ?></td>
                    <td><?php echo $r['kodeMK']; ?></td>
                    <td><?php echo $r['nilai']; ?></td>
                </tr>
        <?php }
        } ?>
        </table>

        <?php

        function tabel($no, $nim, $namaMhs, $kd, $nmMK, $ny)
        { ?>
            <!-- <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $nim; ?></td>
                <td><?php echo $namaMhs; ?></td>
                <td><?php echo $kd; ?></td>
                <td><?php echo $nmMK; ?></td>
                <td><?php echo $ny; ?></td>
            </tr> -->
        <?php
        }

        ?>