<?php 

include '../inc/koneksi.php';
 
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
    <title>REGISTER KEMAHASISWAAN SIMAKS</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img style="width: 400px;" src="../img/LogoStiki.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4 text-center">
              <h3 style=" color: #e6e6e6; ">REGISTER KEMAHASISWAAN</h3>
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
                <label for="NIDN">Nama</label>
                <input type="text" class="form-control" id="NIDN" name="NAMA" required>

              </div>
             
              <div class="form-group last mb-4" >
                <label for="NIDN">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="Jabatan" required>

              </div>
              
              <input type="submit" name="submit"  class="btn btn-block btn-primary">
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>


<?php 
if (isset($_POST['submit'])) {
  
  $NIDN = $_POST['NIDN'];
  $pass = $_POST['password'];
  $password = password_hash($pass,PASSWORD_DEFAULT);
  $NAMA = $_POST['NAMA'];
  $Jabatan = $_POST['Jabatan'];

    $sql = "SELECT * FROM kemahasiswaan WHERE NIDN='$NIDN'";
    $result = mysqli_query($koneksi, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO kemahasiswaan (NAMA_KEMAHASISWAAN, NIDN_KEMAHASISWAAN, PASSWORD_KEMAHASISWAAN,JABATAN_kEMAHASISWAAN)
                VALUES ('$NAMA', '$NIDN', '$password','$Jabatan')";
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

              text: 'register kemahasiswaan berhasil',

              
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