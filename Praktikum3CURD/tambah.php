<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tambah data mahasiswa</title>
</head>

<body>
    <div class="container">
        <h1>Tambah Data Mahasiswa</h1>
        <a href="index.php" class="btn btn-info btn-sm m-2">Go to Home</a><br /><br />
        <form action="" method="post">
            <div class="form-group">
                <label>Nim</label>
                <input type="number" name="nim" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Gender (L / P)</label>
                <input type="text" name="jkel" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label>tgl lahir</label>
                <input type="date" name="tgllhr" class="form-control" required>
            </div>
            <button type="submit" name="Submit" class="btn btn-success btn-sm m-2">Tambah</button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <?php
        if (isset($_POST['Submit'])) {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jkel = $_POST['jkel'];
            $alamat = $_POST['alamat'];
            $tgllhr = $_POST['tgllhr'];
            include_once("koneksi.php");

            $result = mysqli_query($con, "INSERT INTO mahasiswa(nim,nama,jkel,alamat,tgllhr) VALUES('$nim','$nama', '$jkel','$alamat','$tgllhr')");
            echo "Data berhasil disimpan. <a href='index.php'>View Mahasiswa</a>";
        }
        ?>
    </div>
</body>

</html>