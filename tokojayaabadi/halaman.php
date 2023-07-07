<?php
 include 'koneksi.php';
 
 session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kelontong</title>
</head>

<body class="bg-primary">  
    <div class="wrapper">
        <div class="bg-dark text-white text-center p-1">
            <p class="fs-1 fw-bold ">DATA STOK BARANG</p>
            <p class="fs-3 fw-bold"> " TOKO JAYA ABADI "</p>
            <p >Jalan Brigjen Sudiarto No.45 Surakarta</p>
        </div>
   
        <div class="container-md my-5 shadow p-3 bg-body rounded ">
            <a href="add.php" class="btn btn-primary btn-md mt-3">Tambah Data</a>
            <table class="table table-striped table-hover mt-3 border border-2 bg-light">
                <thead class="table-dark">
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Merk</th>
                    <th>Jumlah</th>
                    <th>Distributor</th>
                    <th>Edit</th>
                </thead>
              

                <?php
                    $sqlGet = "SELECT * FROM kelontong";
                    $query = mysqli_query($conn, $sqlGet);

                  
                   //data toko
                    while($data = mysqli_fetch_array($query)) {
                        echo "
                            <tbody>
                        
                            <tr>
                                <td>$data[kode]</td>
                                <td>$data[barang]</td>
                                <td>$data[merk]</td>
                                <td>$data[jumlah]</td>
                                <td>$data[distributor]</td>
                                <td>
                            
                                    <div class='row'>
                                        <div class='col d-flex justify-content-center'>
                                            <a href='update.php?kode=$data[kode]' class='btn btn-sm btn-warning'>Update</a>
                                        </div>
                                        <div class='col d-flex justify-content-center'>
                                            <a href='delete.php?kode=$data[kode]' class='btn btn-sm btn-danger'>Delete</a>
                                        </div>
                                    </div>
                                
                                </td> 
                            </tr>
                    
                            </tbody>
                        ";
                    }
                ?>

            
            </table>
            <a href="logout.php" class="btn btn-danger btn-md mt-3">Logout</a>
        </div>
    </div>
    <footer class="p-4 bg-dark text-white"></footer>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html> 