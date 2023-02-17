<?php
require 'function.php';

// var_dump(tambah($_POST));
if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
            </script>   
    ";
    } else {
        echo "
     <script>
    alert('data gagal ditambahkan');
    document.location.href = 'index.php';
    </script> 
    ";
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
</head>

<body>
    <h1>Tambah Data Karyawan</h1>

    <form action="tambah.php" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nim">Nim : </label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">jurusan : </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>


    </form>

</body>

</html>