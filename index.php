<?php
require 'function.php';
$mhs = query("SELECT * FROM mahasiswa ORDER BY nama ASC ");
$value = [];
$jurusan = [
    'TI',
    'IF',
    'TE',
];

if (isset($_POST["cari"])) {
    $mhs = cari($_POST["keyword"]);
}

if (isset($_POST["submit"])) {
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Halaman Admin</title>
</head>

<body>

    <nav class="navbar bg-danger navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                Daftar Mahasiswa
            </a>


            <a href="tambah.php" class="btn btn-primary float-right">Tambah Data mahasiswa</a>
        </div>
    </nav>

    <main class="mt-3 container">
        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-5">
                    <div class="row g-3">
                        <div class="col-9">
                            <input type="text" name="keyword" class="form-control">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-success">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <table cellpadding="10" cellspacing="0" class="table table-striped table-bordered">

            <thead class="table-dark">
                <tr>
                    <th class="text-center">No.</th>
                    <th>Aksi</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>jurusan</th>
                    <th>gambar</th>
                </tr>
            </thead>

            <?php $i = 1; ?>
            <?php foreach ($mhs as $row) : ?>

                <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td>
                        <a data-bs-toggle="modal" onClick="<?php $value = $row; ?>" data-bs-target="#edit-modal" class="btn btn-warning btn-sm">Edit</a>
                        <!-- <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning btn-sm">Edit</a> -->
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    <td><?= $row["nim"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                    <td><?= $row["gambar"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger">Ya, Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="edit-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit-modal">Ubah Data Mahasiswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $value["id"]; ?>" required>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label required">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Jhon Doe" value="<?= $value["nama"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label required">NIM</label>
                            <input type="number" class="form-control" id="nim" name="nim" placeholder="202144323..." value="<?= $value["nim"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="test@mail.com" value="<?= $value["email"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label required">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" placeholder="test@mail.com" value="<?= $value["gambar"]; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label required">Jurusan</label>
                                <select class="form-select" name="jurusan" aria-label="Pilih Jurusan">
                                    <option selected>Pilih Jurusan</option>
                                    <?php foreach($jurusan as $j) : ?>
                                        <?php if($j == $value['jurusan']) : ?>
                                            <option selected value="<?= $j; ?>"><?= $j; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $j; ?>"><?= $j; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-success" >Submit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>