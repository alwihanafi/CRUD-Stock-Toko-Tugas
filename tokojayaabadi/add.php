<?php
 include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <title>Aplikasi Kelontong</title>
</head>

<body class="bg-primary">
    <header class="p-4 bg-dark text-white"></header>     
    <div class="container-md bg-body shadow w-50 mx-auto border p-5 my-5 rounded">
        <p class="fs-1 fw-bold">Tambah Data</p>
        <a href="index.php" class="btn btn-primary btn-md mb-3">Kembali ke Home</a>
        <form action="add.php" method="post">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" class="form-control" required>

            <label for="barang">Nama Barang</label>
            <input type="text" id="barang" name="barang" class="form-control" required>

            <label for="merk">Merk</label>
            <input type="text" id="merk" name="merk" class="form-control" required>

            <label for="jumlah">Jumlah</label>
            <input type="text" id="jumlah" name="jumlah" class="form-control" required>

            <label for="distributor">Distributor</label>
            <input type="text" id="distributor" name="distributor" class="form-control" required>

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>
    <footer class="p-4 bg-dark text-white"></footer>
   
    <?php

        if (isset($_POST['tambah'])) {
            $kode = $_POST['kode'];
            $barang = $_POST['barang'];
            $merk = $_POST['merk'];
            $jumlah = $_POST['jumlah'];
            $distributor = $_POST['distributor'];

            $sqlGet = "SELECT * FROM kelontong WHERE kode='$kode'";
            $queryGet = mysqli_query($conn, $sqlGet);
            $cek = mysqli_num_rows($queryGet);

            $sqlInsert = "INSERT INTO kelontong(kode,barang,merk,jumlah,distributor)
                          VALUES ('$kode','$barang','$merk','$jumlah','$distributor')";

            $queryInsert =  mysqli_query($conn, $sqlInsert);

            if (isset($sqlInsert) && $cek < 0) {
                echo "
                    <div class='alert alert-success'>Data Berhasil Ditambahkan <a href='halaman.php'>Cek Data</a></div>
                ";
            } else if ($cek > 0) {
                echo "
                <div class='alert alert-danger'>Data Gagal Ditambahkan <a href='halaman.php'>Cek Data</a></div>
                ";
            }
        }
    ?>
</body>
</html> 