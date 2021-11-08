<!doctype html>

<?php

      include "../../inc/koneksi.php";
      session_start();
      //cek sesi apakah userweb_Pemb (NIDN) sudah masuk dalam session ? kalau sudah header langsung ke index
		    if (@$_SESSION['userweb_Pemb']!="") {
			header("Location: ../Home-Pembina.php.php");
	}
?>
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
    <!-- Sweet Alert -->
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <title>Login Pembina Ormawa</title>
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
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">NIDN</label>
                <input type="text" class="form-control" name="NIDN">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
             
              </div>

              <input name ="flog" type="submit" value="login"  class="btn btn-block btn-primary">


          
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
      if(isset($_POST['flog'])){
        $nidn=$_POST['NIDN'];
        $password = $_POST['password'];
        error_reporting(0);
        $qlog = mysqli_query($koneksi,"SELECT * FROM `pembina` where `NIDN` = '$nidn' ");
        $rows = mysqli_num_rows($qlog);
        $arr = mysqli_fetch_array($qlog);

        //cek apakah akun yang dimasukkan terdaftar
        //penamaan sesi harus unik
        if ($rows ==  1) {
					if ( $password == $arr['PASSOWRD_PEMBINA'] ) {

						session_start();
						$_SESSION['userweb_Pemb'] = $arr['NIDN'];
						header("Location: ../Home-Pembina.php");
						}
						
					
					else{
							?>
                    		<script>
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Password Salah',
                                
                                })
                      	         </script>
            			 	<?php
					
							}
				}
				else{
					?>
						<script>
									Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'User Tidak Ditemukan',
									
									})
									</script>
				<?php

				}
			}


  ?>