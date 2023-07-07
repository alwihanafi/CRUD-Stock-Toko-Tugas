<?php
    include 'koneksi.php';

    $kode = $_GET['kode'];
    $sqlDelete = "DELETE FROM kelontong WHERE kode='$kode'";
    mysqli_query($conn, $sqlDelete);

    header("location: halaman.php");
?>