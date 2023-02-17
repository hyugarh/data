<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    //$gambar = htmlspecialchars($data["gambar"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //upload gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO mahasiswa 
    VALUES
    ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";



    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpFile = $_FILES['gambar']['tmp_name'];

    //tidak ada gambar yang di upload
    if( $error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu');
             </script>";
             return false; 
    }

//cek apakah gambar atau bukan
$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
    echo "<script>
    alert('gambar tidak sesuai ketentuan');
         </script>";
         return false; 
}

//cek ukuran gambar 
if( $ukuranFile < 100000){
    echo "<script>
        alert('ukuran gambar terlalu besar');
             </script>";
             return false; 
}
//siap upload
//generate gambar baru
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;


/**
 * Cek bagian ini
 */
move_uploaded_file($tmpName, ' img/' . $namaFileBaru);

return $namaFileBaru;


}




function hapus($id)
{
    global $conn;
    $query = "DELETE FROM mahasiswa WHERE id = " . $id;
    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function ubah($data, $id)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if( $_FILES['gambar']['error'] === null) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    //$gambar = htmlspecialchars($data["gambar"]);


    $query = "UPDATE mahasiswa SET
                nim = '$nim',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
                ";


    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                nim LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                email LIKE '%$keyword%'
                
    ";
    return query($query);
}
