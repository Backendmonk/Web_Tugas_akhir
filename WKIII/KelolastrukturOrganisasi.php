
<!DOCTYPE html>
<html lang="en">
<?php

         include "SessionWKIII.php";

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

<?php include '../template/head.php' ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<meta charset="utf-8">
<link rel="stylesheet" href="../LogCSS/style.css">



</head>

<body id="page-top">
<?php include 'template/navbar.php' ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include 'template/sidebar.php' ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column pt-4">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">
                <main class="col overflow-auto h-100">
            <div class="bg-light border rounded-3 p-3">


            <?php 
                 
                    
                     $namakt =  $array['NAMA_WKIII'];
                    ?>

                    <form method="POST" enctype = "multipart/form-data">
            <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Nama Ketua</label>
                    <input type="text" class="form-control" readonly  value = "<?php echo $namakt ?>" name="nama_ketua">
                </div>
              
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Gambar Ketua</label>
                    <input type="file" class="form-control" name ="ketua_gm">
                </div>


                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Nama Bidang Kemahasiswaan</label>
                    <input type="text" class="form-control"  name="nama_kemahasiswaan">
                </div>
              
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Gambar Bidang Kemahasiswaan</label>
                    <input type="file" class="form-control"  name ="kemahasiswaan_gm">
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Nama Bidang Alumni</label>
                    <input type="text" class="form-control"  name="nama_alumni">
                </div>
              
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Gambar Bidang alumni</label>
                    <input type="file" class="form-control"  name ="alumni_gm">
                </div>


                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Nama Bidang Pusat Karir</label>
                    <input type="text" class="form-control"  name="nama_pusat">
                </div>
              
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Gambar Bidang pusat</label>
                    <input type="file" class="form-control"  name ="pusat_gm">
                </div>

                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Nama Sekretaris WKIII</label>
                    <input type="text" class="form-control"  name="nama_sekretaris">
                </div>
              
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Gambar Sekretaris WKIII</label>
                    <input type="file" class="form-control"  name ="sekretaris_gm">
                </div>
                
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Nama Bimbingan Konseling</label>
                    <input type="text" class="form-control"  name="nama_Bimbingan">
                </div>
              
                <div class="col-md-12">
                    <label for="inputPassword4" class="form-label">Gambar Bimbingan Konseling</label>
                    <input type="file" class="form-control"  name ="Bimbingan_gm">
                </div>
                <br>
                <br>
                <button type="Submit" class="btn btn-primary" name = "fkirim" >Kirim</button>

                        </from>



                

            <div class="row mb-2">
            <div class=" col-sm-6  text-center" >
               
                </div>
            </div>
             </div>
        </main>
        </div>
    </div>
   
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<!-- Footer -->
<?php include '../template/footer.php' ?>
<!-- End of Footer -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- summon modal -->
<?php include 'Template/modal.php' ?>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>

</body>
</html>

<?php include 'Template/EditProfilePass.php' ?>



<?php

        if (isset($_POST['fkirim'])) {

               $ra = rand();
            $nama_ketua = $_POST['nama_ketua'];

       
            $ran_Num_kt = rand();
            $filename_kt= $_FILES['ketua_gm']['name'];
            $ext_kt = pathinfo($filename_kt, PATHINFO_EXTENSION);
            $ekstensi_kt = array('jpeg','jpg');
           

            $nama_kemahasiswaan = $_POST['nama_kemahasiswaan'];
            $ran_Num_gm = rand();
            $filename_gm= $_FILES['kemahasiswaan_gm']['name'];
            $ext_gm = pathinfo($filename_gm, PATHINFO_EXTENSION);
            $ekstensi_gm = array('jpeg','jpg');

         
            $nama_alumni  = $_POST['nama_alumni'];
            $ran_Num_am = rand();
            $filename_am= $_FILES['alumni_gm']['name'];
            $ext_am = pathinfo($filename_am, PATHINFO_EXTENSION);
            $ekstensi_am = array('jpeg','jpg');

            
         
            $nama_pusat = $_POST['nama_pusat'];
            $ran_Num_ps = rand();
            $filename_ps= $_FILES['pusat_gm']['name'];
            $ext_ps = pathinfo($filename_ps, PATHINFO_EXTENSION);
            $ekstensi_ps = array('jpeg','jpg');
            
            
           
            $nama_sekretaris = $_POST['nama_sekretaris'];
            $ran_Num_sk = rand();
            $filename_sk= $_FILES['sekretaris_gm']['name'];
            $ext_sk = pathinfo($filename_sk, PATHINFO_EXTENSION);
            $ekstensi_sk = array('jpeg','jpg');

           
            $nama_Bimbingan  = $_POST['nama_Bimbingan'];
            $ran_Num_bg = rand();
            $filename_bg= $_FILES['Bimbingan_gm']['name'];
            $ext_bg = pathinfo($filename_bg, PATHINFO_EXTENSION);
            $ekstensi_bg = array('jpeg','jpg');

            if(!in_array($ext_kt,$ekstensi_kt)){
                ?>
                <script>
                      Swal.fire({
                      icon: 'error',
                      title: 'Gagal',
                      text: 'Ekstensi Harus JPG Atau JPEG',
                      
                      })
                      </script>
            <?php
          }
          elseif (!in_array($ext_gm,$ekstensi_gm)) {
                ?>
                <script>
                      Swal.fire({
                      icon: 'error',
                      title: 'Gagal',
                      text: 'Ekstensi Harus JPG Atau JPEG',
                      
                      })
                      </script>
            <?php
          }
          elseif (!in_array($ext_am,$ekstensi_am)) {
            ?>
            <script>
                  Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: 'Ekstensi Harus JPG Atau JPEG',
                  
                  })
                  </script>
        <?php
      }
      elseif (!in_array($ext_ps,$ekstensi_ps)) {
        ?>
        <script>
              Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Ekstensi Harus JPG Atau JPEG',
              
              })
              </script>
    <?php
  }
  elseif (!in_array($ext_sk,$ekstensi_sk)) {
    ?>
    <script>
          Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Ekstensi Harus JPG Atau JPEG',
          
          })
          </script>
<?php
}
elseif (!in_array($ext_bg,$ekstensi_bg)) {
    ?>
    <script>
          Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Ekstensi Harus JPG Atau JPEG',
          
          })
          </script>
<?php
}
else{
    move_uploaded_file($_FILES['ketua_gm']['tmp_name'], '../img/F_ketua/'.$ran_Num_kt.'_'.$filename_kt);
    $ketua_gm = $ran_Num_kt.'_'.$filename_kt;

    move_uploaded_file($_FILES['kemahasiswaan_gm']['tmp_name'], '../img/F_kemahasiswaan/'.$ran_Num_gm.'_'.$filename_gm);
    $kemahasiswaan_gm  = $ran_Num_gm.'_'.$filename_gm;

    move_uploaded_file($_FILES['alumni_gm']['tmp_name'], '../img/F_alumni/'.$ran_Num_am.'_'.$filename_am);
    $alumni_gm= $ran_Num_am.'_'.$filename_am;

    move_uploaded_file($_FILES['pusat_gm']['tmp_name'], '../img/F_pusat/'.$ran_Num_ps.'_'.$filename_ps);
    $pusat_gm = $ran_Num_ps.'_'.$filename_ps;

    move_uploaded_file($_FILES['sekretaris_gm']['tmp_name'], '../img/F_sekretaris/'.$ran_Num_sk.'_'.$filename_sk);
    $sekretaris_gm = $ran_Num_sk.'_'.$filename_sk;

    move_uploaded_file($_FILES['Bimbingan_gm']['tmp_name'], '../img/F_Bimbingan/'.$ran_Num_bg.'_'.$filename_bg);
    $Bimbingan_gm = $ran_Num_bg.'_'.$filename_bg;


    $q = mysqli_query($koneksi,"INSERT INTO `strukturwkiii`(`id_struktur`, `Nama_ketua`, `gambar_ketua`, `nama_bid_kemahasiswaan`, `gambar_kemahasiswaan`, `nama_bid_alumni`, `gambar_alumni`, `nama_bid_pusat_karir`, `gambar_pusat_karir`, `Sekretaris_WKIII`, `gambar_sekretaris`, `nama_bimbingan_konseling`, `gambar_bimbingan_konseling`) VALUES ('$ra','$nama_ketua','$ketua_gm','$nama_kemahasiswaan',' $kemahasiswaan_gm ','    $nama_alumni','$alumni_gm','  $nama_pusat','$pusat_gm','$nama_sekretaris',' $sekretaris_gm ',' $nama_Bimbingan','  $Bimbingan_gm')");

    ?>
						<script>
									Swal.fire({
									icon: 'success',
									title: 'Berhasil',
									text: 'Pengajuan Berhasil',
									
									})
									</script>
				<?php

}

           




           
           
        }


?>