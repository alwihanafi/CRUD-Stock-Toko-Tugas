<?php
 include 'koneksi.php';

 $kode = $_GET['kode'];
 $sqlGet = "SELECT * FROM kelontong WHERE kode='$kode'";
 $queryGet =  mysqli_query($conn, $sqlGet);
 $data = mysqli_fetch_array($queryGet);
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
        <p class="fs-1 fw-bold">Update Data</p>
        <a href="index.php" class="btn btn-primary btn-md mb-3">Kembali ke Home</a>
        <form action="update.php" method="post">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode"  value="<?php echo "$data[kode]";?>" class="form-control" readonly>

            <label for="barang">Nama Barang</label>
            <input type="text" id="barang" name="barang" value="<?php echo "$data[barang]";?>" class="form-control" required>

            <label for="merk">Merk</label>
            <input type="text" id="merk" name="merk" value="<?php echo "$data[merk]";?>" class="form-control" required>

            <label for="jumlah">Jumlah</label>
            <input type="text" id="jumlah" name="jumlah" value="<?php echo "$data[jumlah]";?>" class="form-control" required>

            <label for="distributor">Distributor</label>
            <input type="text" id="distributor" name="distributor" value="<?php echo "$data[distributor]";?>" class="form-control" required>

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

            $sqlUpdate = "UPDATE kelontong 
                          SET barang='$barang', merk='$merk', jumlah='$jumlah', distributor='$distributor'
                          WHERE kode='$kode'";
            
            $queryUpdate = mysqli_query($conn, $sqlUpdate);

            header("location: halaman.php");
        }
    ?>
</body>
</html> 