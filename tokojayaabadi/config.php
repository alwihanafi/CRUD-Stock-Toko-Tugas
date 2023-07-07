<?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "warung";
 
$connmasuk = mysqli_connect($server, $user, $pass, $database);

if (!$connmasuk) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>