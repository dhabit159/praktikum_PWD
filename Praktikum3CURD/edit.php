<?php
include_once("koneksi.php");
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jkel = $_POST['jkel'];
    $alamat = $_POST['alamat'];
    $tgllhr = $_POST['tgllhr'];
    // update user data
    $result = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama',jkel='$jkel',alamat='$alamat',tgllhr='$tgllhr' WHERE nim='$nim'");
    header("Location: index.php");
}
?>
<?php
$nim = $_GET['nim'];
$result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");
while ($user_data = mysqli_fetch_array($result)) {
    $nim = $user_data['nim'];
    $nama = $user_data['nama'];
    $jkel = $user_data['jkel'];
    $alamat = $user_data['alamat'];
    $tgllhr = $user_data['tgllhr'];
}
?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <div class="col-sm-6 offset-sm-3">
        <div class="container">
            <h1>Update Data Mahasiswa</h1>

            <a href="index.php" class="btn btn-info btn-sm m-2">Go to Home</a><br /><br />

            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $_GET['nim'] ?>">
                <div class="form-group">
                    <input type="hidden" name="nim" class="form-control" value="<?= $nim ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $nama ?>" required>
                </div>
                <div class="form-group">
                    <label>Gender (L / P)</label>
                    <input type="text" name="jkel" class="form-control" value="<?= $jkel ?>" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $alamat ?>" required>
                </div>
                <div class="form-group">
                    <label>tgl lahir</label>
                    <input type="date" name="tgllhr" class="form-control" value="<?= $tgllhr ?>" required>
                </div>
                <button type="submit" name="Update" class="btn btn-success btn-sm m-2">Update</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>

    <?php
    if (isset($_POST['Update'])) {
        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jkel = $_POST['jkel'];
        $alamat = $_POST['alamat'];
        $tgllhr = $_POST['tgllhr'];
        include_once("koneksi.php");
        $result = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama', jkel='$jkel', alamat='$alamat', tgllhr='$tgllhr' WHERE nim='$id'");

        header("location: index.php");
    }
    ?>

</body>

</html>