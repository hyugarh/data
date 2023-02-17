<?php
$conn = mysqli_connect("localhost","root","","phpdasar");
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
//ambil data(fetch) mahasiswa dari objek result
//mysqli_fetch_row() mengembalikan array numerik
//mysqli_fetch_assoc() mengembalikan array assoc
//mysqli_fetch_array() mengembalikan keduanya
//mysqli_fetch_object()
//while( $mhs = mysqli_fetch_assoc($result) ) {
  // var_dump($mhs["NAMA"]);
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<table border="1" cellpadding="10" cellspacing="0">

    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>

    <?php $i=1; ?>
    <?php while( $row = mysqli_fetch_assoc($result) ) : ?>
        
     <tr>
        <td><?= $i++; ?></td>
        <td>
            <a href="">ubah</a> |
            <a href="">hapus</a>
        </td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["jurusan"]; ?></td>
    </tr>
        <?php endwhile; ?>
</table>
    
</body>
</html>