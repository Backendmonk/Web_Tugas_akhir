<?php 

include '../../inc/koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['NIDN'])) {
    header("Location: ../index.php");
}
 
if (isset($_POST['submit'])) {
  
    $NIDN = $_POST['NIDN'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM pembina WHERE NIDN='$NIDN' AND PASSOWRD_PEMBINA='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['NIDN'] = $row['NIDN'];
        $_SESSION['nama'] = $row['NAMA_PEMBINA'];
        header("Location: ../index.php");
    } else {
        echo "<script>alert('NIDN atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../../css/style.css">

    <title>Login #7</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img style="width: 400px;" src="../../img/LogoStiki.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4 text-center">
              <h3 style=" color: #e6e6e6; ">Login</h3>
              <h2 style=" color: #e6e6e6; " class="mb-4">SIMAKS</h2>
              <h4 style=" color: #e6e6e6; " class="mb-4">Pembina</h4>
            </div>
            <form action="" method="post">
              <div class="form-group first">
                <label for="NIDN">NIDN</label>
                <input type="text" class="form-control" id="NIDN" name="NIDN" required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                
              </div>
              
              <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary">
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
  </body>
</html>