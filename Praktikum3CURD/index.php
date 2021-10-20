<?php
include_once("koneksi.php");
$result = mysqli_query($con, "SELECT * FROM mahasiswa ");
?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Halaman Utama</title>
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        <a href="tambah.php" class="btn btn-success btn-sm m-2">Tambah Data Baru</a><br /><br />
        <table class="table table.bordered">
            <thead>
                <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>tgl lahir</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td> <?= $user_data['nim'] ?> </td>
                        <td> <?= $user_data['nama'] ?> </td>
                        <td> <?= $user_data['jkel'] ?> </td>
                        <td> <?= $user_data['alamat'] ?> </td>
                        <td> <?= $user_data['tgllhr'] ?> </td>
                        <td><a href="edit.php?nim=<?= $user_data['nim'] ?>" class="btn btn-warning btn-sm">Update</a> |
                            <a href="delete.php?nim=<?= $user_data['nim'] ?>" onclick="return confirm('Yakin Menghapus Data ?')" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<html>