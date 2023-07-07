<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connmasuk, $sql);
        
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($connmasuk, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                echo "<a href='halaman.php?'></a>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
               
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> 
 
    <title>Jaya Abadi Register</title>
</head>
<body class="bg-primary">
    <header class="p-4 bg-dark text-white"></header>             
        <main class="form-singin">
            <div class="container-md my-4 shadow  p-3 bg-body rounded w-25">
                <form action="" method="POST" class="login-email">
                    <p class="fs-1 fw-bold">Register</p>
                    <p >Please enter your data </p>
                    <div class="form-floating my-2">
                        <input type="text" label for="floatingPassword" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                        <label for="floatingPassword">Username</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="email" label for="floatingPassword" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                        <label for="floatingPassword">E-mail</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" label for="floatingPassword" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" label for="floatingPassword" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                        <label for="floatingPassword">Confirm Passwor</label>
                    </div>
                    <div class="input-group">
                        <button name="submit" class="w-100 btn btn-lg btn-primary my-2">Register</button>
                    </div>
                    <p class="text-md-start">Anda sudah punya akun? <a href="index.php">Login </a></p>
                </form>
            </div>
        </main>
    <footer class="p-4 bg-dark text-white"></footer>
</body>
</html>