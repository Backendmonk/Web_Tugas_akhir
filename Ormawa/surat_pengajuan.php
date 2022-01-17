<!DOCTYPE html>
<html lang="en">
<?php

        include "SessionPengurus.php";

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengurus Ormawa</title>

<?php include '../template/head.php' ?>

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
               
                 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      
                        
                                
                    </div>
                   
                 

                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">
        

    <form class="row g-3" method = "post" enctype = "multipart/form-data">
      <?php

          $dataormawa = mysqli_query($koneksi,"SELECT ormawa.NAMA_ORMAWA as ormawa, ormawa.ID_ORMAWA as id_ormawa FROM `pengurus_ormawa` INNER JOIN `ormawa` ON pengurus_ormawa.ID_ORMAWA = ormawa.ID_ORMAWA WHERE pengurus_ormawa.USERNAME_KETUA = '$array[USERNAME_KETUA]' ");
          $arr = mysqli_fetch_array($dataormawa);

      ?>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nama Ormawa</label>
    <input type="text" class="form-control" readonly id="inputPassword4" value = "<?php echo $arr['ormawa']; ?>" name="nama_ormawa">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nama Kegiatan</label>
    <input type="text" class="form-control" id="inputEmail4" name = "nama_kegiatan">
  </div>
  
  
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Surat Pengajuan</label>
    
    <input type="file" class="form-control" name="pengajuan">

  </div>


  <div class="col-12">
      <br>
    
    <button type="submit" class="btn btn-primary" name = "ajukan">Ajukan</button>
  </div>
  
</form>
<!-- End of Main Content -->

<br>
</div>

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

<!-- summon modal allpage -->
<?php require 'Template/modal.php'?>

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




<?php 
    require 'Template/EditProfilePass.php';

      if(isset($_POST['ajukan'])){

        $id= $arr['id_ormawa'];

        $nama_kegiatan = $_POST['nama_kegiatan'];
       

        // Pengajuan
        $ran_Num_pengajuan = rand();
        $filename_pengajuan = $_FILES['pengajuan']['name'];
        $ext_pengajuan = pathinfo($filename_pengajuan, PATHINFO_EXTENSION);
        $ekstensi_pengajuan = array('doc','docx','pdf');

        
        if(!in_array($ext_pengajuan,$ekstensi_pengajuan)){
              ?>
              <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Ekstensi Salah',
                    
                    })
                    </script>
          <?php
        }
        else{
        // tmp file

        move_uploaded_file($_FILES['pengajuan']['tmp_name'], 'k_surat_pengajuan/'.$ran_Num_pengajuan.'_'.$filename_pengajuan);
        $pengajuan = $ran_Num_pengajuan.'_'.$filename_pengajuan;
        

    
        $query = mysqli_query($koneksi, "INSERT INTO `surat_pernyataan_kegiatan`(`id_ormawa`, `nama_kegiatan`, `surat_pernyataan`) VALUES ('$id','$nama_kegiatan','$pengajuan')");
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