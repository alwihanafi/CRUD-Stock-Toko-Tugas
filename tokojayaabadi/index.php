<?php
//login cek
                    include 'config.php';
 
                    error_reporting(0);
                    
                    session_start();
                    
                    if (isset($_SESSION['username'])) {
                        header("Location: halaman.php");
                    }
                    
                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $password = md5($_POST['password']);
                    
                        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
                        $result = mysqli_query($connmasuk, $sql);
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['username'] = $row['username'];
                            header("Location: halaman.php");
                        } else {
                            echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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

    <title>Sign In</title>
</head>
<body class="bg-primary">
        <?php echo $_SESSION['error']?>

    <header class="p-4 bg-dark text-white"></header>             
        <main class="form-singin">
            <div class="container-md my-5 shadow p-5 bg-body rounded w-25">
                <form action="" method="POST" class="login-email">
                    <p class="fs-1 fw-bold">Sign In</p>
                    <p >Please sign in</p>
                    <div class="form-floating my-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                        <label for="floatingPassword">E-mail</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" label for="floatingPassword" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div >
                        <button class="w-100 btn btn-lg btn-primary my-2" name="submit">Sign In</button>
                    </div>
                    <p class="text-md-start">Anda belum punya akun? <a href="register.php">Register</a></p>
                </form>
            </div>
        </main>
    <footer class="p-4 bg-dark text-white"></footer>
</body>
</html>