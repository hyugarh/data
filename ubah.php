<?php
require 'function.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    if (ubah($_POST, $id) > 0) {
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
            </script>   
    ";
    } else {
        echo "
     <script>
    alert('data gagal diubah');
    document.location.href = 'index.php';
    </script> 
    ";
    }
}




?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post"> enctype"multipart/form-data">
        <ul>
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">

            </li>
            <li>
                <label for="nim">Nim : </label>
                <input type="text" name="nim" id="nim" value="<?= $mhs["nim"]; ?>">

            </li>
            <li>
                <label for="email">email : </label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">

            </li>
            <li>
                <label for="gambar">gambar : </label>
                <img scr="img/<?= $mhs['gambar']; ?>"width"40"> <br>
                <input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>">

            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>

</body>

</html> -->