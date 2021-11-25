<?php 

include '../../inc/koneksi.php';
 
error_reporting(0);
 
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include '../template/headRegis.php' ?> 
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
              <h3 style=" color: #e6e6e6; ">REGISTER PEMBINA</h3>
              <h2 style=" color: #e6e6e6; " class="mb-4">SIMAKS</h2>
            </div>
            <form action="" method="post">
              <div class="form-group first">
                <label for="NIDN">NIDN</label>
                <input type="text" class="form-control" id="NIDN" name="NIDN" required>

              </div>
              <div class="form-group first" style="border-radius: 0px;">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                
              </div>
              <div class="form-group first" style="border-radius: 0px;">
                <label for="NIDN">NAMA</label>
                <input type="text" class="form-control" id="NIDN" name="NAMA" required>

              </div>
             
              <div class="form-group first" style="border-radius: 0px;">
                <label for="NIDN">ALAMAT</label>
                <input type="text" class="form-control" id="NIDN" name="ALAMAT" required>

              </div>
             
              <div class="form-group last mb-4" >
                <label for="NIDN">NO TELEPON</label>
                <input type="text" class="form-control" id="NIDN" name="NO" required>

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

<?php 
if (isset($_POST['submit'])) {
  
  $NIDN = $_POST['NIDN'];
  $pw = $_PPOST['password'];
  $password = password_hash($pw, PASSWORD_DEFAULT);
  $NAMA = $_POST['NAMA'];
  $ALAMAT = $_POST['ALAMAT'];
  $NO = $_POST['NO'];

    $sql = "SELECT * FROM pembina WHERE NIDN='$NIDN'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO pembina (NAMA_PEMBINA, NIDN, PASSOWRD_PEMBINA,ALAMAT_PEMBINA,NO_TELP_PEMBINA)
                  VALUES ('$NAMA', '$NIDN', '$password',$ALAMAT,$NO)";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
            $_POST['NIDN']="";
          $_POST['NAMA']="";
          $_POST['Jabatan']="";
            $_POST['password'] = "";
            ?>
            <script>
              Swal.fire({
              icon: 'success',
              title: 'success',
              text: 'register pembina berhasil',
              
              })
          </script>
        <?php
          
        } else {
          ?>
          <script>
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'register gagal',
          
          })
        </script>
        <?php
        }
    } else {
      ?>
      <script>
      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'NIDN SUDAH Terpakai',
      
      })
    </script>
    <?php
    }

}
?>