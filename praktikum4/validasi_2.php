 <html>

 <head>
     <style>
         .error {
             color: #FF0000;
         }
     </style>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 </head>

 <body style="background-color: #00ffff;">
     <?php
        // define variables and set to empty values
        $namaErr = $emailErr = $genderErr = $websiteErr = "";
        $nama = $email = $gender = $comment = $website = "";
        $status = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nama"])) {
                $namaErr = "Nama harus diisi";
                $status = false;
            } else {
                $nama = test_input($_POST["nama"]);
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email harus diisi";
                $status = false;
            } else {
                $email = test_input($_POST["email"]);

                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Email tidak sesuai format";
                    $status = false;
                }
            }

            if (empty($_POST["website"])) {
                $websiteErr = "Website harus di isi";
                $status = false;
            } else {
                $website = test_input($_POST["website"]);
            }

            if (empty($_POST["comment"])) {
                $comment = "";
            } else {
                $comment = test_input($_POST["comment"]);
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Gender harus dipilih";
                $status = false;
            } else {
                $gender = test_input($_POST["gender"]);
            }

            if ($status) {
                // menyimpan data berdasarkan name yang terkirim
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $website = $_POST['website'];
                $comment = $_POST['comment'];
                $gender = $_POST['gender'];
                // melakukan koneksi ke database
                include_once("koneksi.php");

                // memasikan data ke database dengan query insert
                $result = mysqli_query($con, "INSERT INTO mahasiswa(nama,email,website,comment,gender) VALUES('$nama', '$email','$website','$comment','$gender')");
                echo "Data berhasil disimpan";
            }
        }

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
     <p>
         <br>
     </p>

     <div class="col-sm-6 offset-sm-3">
         <div class="container" style="background-color: #f0ffff;">


             <h2>Posting Komentar</h2>
             <p><span class="error">* Harus Diisi.</span></p>
             <!-- form untuk input data -->
             <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                 <div class="form-group m-2">
                     <label>Nama</label>
                     <span class="error">* <?php echo $namaErr; ?></span>
                     <input type="text" name="nama" class="form-control" value="<?= $nama ?>">
                 </div>
                 <div class="form-group m-2">
                     <label>E-mail</label>
                     <span class="error">* <?php echo $emailErr; ?></span>
                     <input type="text" name="email" class="form-control" value="<?= $email ?>">
                 </div>
                 <div class="form-group m-2">
                     <label>Website</label>
                     <span class="error">* <?php echo $websiteErr; ?></span>
                     <input type="text" name="website" class="form-control" value="<?= $website ?>">
                 </div>
                 <div class="form-group m-2">
                     <label>Comment</label>
                     <input type="text" name="comment" class="form-control" value="<?= $comment ?>">
                 </div>
                 <div class="form-group m-2">
                     <label>Gender : </label>
                     <input type="radio" name="gender" value="L"> Laki-Laki
                     <input type="radio" name="gender" value="P"> Perempuan
                     <span class="error">* <?php echo $genderErr; ?></span>
                 </div>


                 <input type="submit" name="submit" value="submit" class="form-group m-2 btn btn-success btn-sm m-2">

                 </table>
             </form>
         </div>
     </div>

 </body>

 </html>