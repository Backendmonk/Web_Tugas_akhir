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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">
        

                    <?php

                    

                    ?>

                    <form class="row g-3" method = "post" enctype = "multipart/form-data">
 
      <?php

          $dataormawa = mysqli_query($koneksi,"SELECT ormawa.NAMA_ORMAWA as ormawa FROM `pengurus_ormawa` INNER JOIN `ormawa` ON pengurus_ormawa.ID_ORMAWA = ormawa.ID_ORMAWA WHERE pengurus_ormawa.USERNAME_KETUA = '$array[USERNAME_KETUA]' ");
          $arr = mysqli_fetch_array($dataormawa);

      ?>

    <input type="text" class="form-control" name="id"  value = "<?= $array['ID_ORMAWA'] ?>" id="inputEmail4" hidden >
    <input type="text" hidden class="form-control" name="namaOr"  value = "<?= $arr['ormawa'] ?>" id="inputEmail4" >
    <input type="text" hidden class="form-control" name="username"  value = "<?= $array['USERNAME_KETUA'] ?>" id="inputEmail4" >
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nama Ormawa</label>
    <input type="text" readonly class="form-control"  value = "<?= $arr['ormawa'] ?>" id="inputEmail4" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nama Ketua</label>
    <input type="text" class="form-control" readonly id="inputPassword4" value = "<?php echo $array['NAMA_KETUA']; ?>">
  </div>
  <div class="col-md-6">
    <label for="namaWakil" class="form-label">Nama Wakil</label>
    <input type="text" class="form-control" name="namaWk"  id="namaWakil" value = "<?php echo $array['NAMA_WAKIL']; ?>">
  </div>
  <div class="col-md-6">
    <label for="namaWakil2" class="form-label">Nama Wakil 2</label>
    <input type="text" class="form-control" name="namaWK2"  id="namaWakil2" value = "<?php echo $array['NAMA_WAKIL2']; ?>">
  </div>
  <div class="col-md-6">
    <label for="sekre1" class="form-label">Sekretaris 1</label>
    <input type="text" class="form-control" name="sekre1" id="sekre1" value = "<?php echo $array['SEKRETARIS1']; ?>">
  </div>
  <div class="col-md-6">
    <label for="sekre2" class="form-label">Sekretaris 2</label>
    <input type="text" class="form-control" name="sekre2" id="sekre2" value = "<?php echo $array['SEKRETARIS2']; ?>">
  </div>
  <div class="col-md-6">
    <label for="ben1" class="form-label">Bendahara 1</label>
    <input type="text" class="form-control" name="ben1"  id="ben1" value = "<?php echo $array['BENDAHARA1']; ?>">
  </div>
  <div class="col-md-6">
    <label for="ben2" class="form-label">Bendahara 2</label>
    <input type="text" class="form-control" name="ben2" id="ben2" value = "<?php echo $array['BENDAHARA2']; ?>">
  </div>
  <div class="col-md-6">
    <label for="renja" class="form-label">Renja</label>
    <input type="file" class="form-control" name="renja" id="renja" value = "<?php echo $array['RENJA']; ?>">
  </div>
  <div class="col-md-6">
    <label for="ad" class="form-label">AD_ART</label>
    <input type="file" class="form-control"  name="ad_art" id="ad" value = "<?php echo $array['AD_ART']; ?>">
  </div>
  <div class="col-md-6">
    <label for="masaJab" class="form-label">Masa Jabatan</label>
    <select name="masaJab" class="form-control mb-2" >
        <option value="" hidden> pilih tahun </option>
        <?php 
           for ($i=2008; $i < date("Y") ; $i++) { 
        ?>
        <option value="<?= $i ?>-<?= $i+1 ?>"><?= $i ?>-<?= $i+1 ?></option>
        <?php }?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="thnDlt" class="form-label">Tahun Dilantik</label>
    <select name="thnDlt" class="form-control mb-2" >
        <option value="" hidden> pilih tahun </option>
        <?php 
           for ($i=2008; $i < date("Y") ; $i++) { 
        ?>
        <option value="<?= $i ?>"><?= $i ?></option>
        <?php }?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="ad" class="form-label">Gambar Struktur Organisasi</label>
    <input type="file" class="form-control"  name="gambar" id="ad" value = "<?php echo $array['GAMBAR_STRUKTUR_ORGANISASI']; ?>">
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control"  name="email" id="email" value = "<?php echo $array['email']; ?>">
  </div>


  <div class="col-12">
      <br>
    
    <button type="submit" class="btn btn-primary" name = "Simpan">Simpan</button>
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

      if(isset($_POST['Simpan'])){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $namaWk = $_POST['namaWk'];
        $namaWk2 = $_POST['namaWK2'];
        $sekre1 = $_POST['sekre1'];
        $sekre2 = $_POST['sekre2'];
        $ben1 = $_POST['ben1'];
        $ben2 = $_POST['ben2'];
        $masaJab = $_POST['masaJab'];
        $thnDlt = $_POST['thnDlt'];
        $email = $_POST['email'];
       // renja
        $ran_Num_kg = $_POST['namaOr'];
        $filename_kg = $_FILES['renja']['name'];
        $ext_kg = pathinfo($filename_kg, PATHINFO_EXTENSION);
        $ekstensi_kg = array('doc','docx','pdf');
  
        // sub kegiatan
        $ran_Num_sb = $_POST['namaOr'];
        $filename_sb = $_FILES['ad_art']['name'];
        $ext_sb = pathinfo($filename_sb, PATHINFO_EXTENSION);
        $ekstensi_sb = array('doc','docx','pdf');

        //
        $ran_Num_gm = $_POST['namaOr'];
        $filename_gm = $_FILES['gambar']['name'];
        $ext_gm = pathinfo($filename_gm, PATHINFO_EXTENSION);
        $ekstensi_gm = array('png','jpeg','jpg');
        
        if(!in_array($ext_kg,$ekstensi_kg)){
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
        elseif (!in_array($ext_sb,$ekstensi_sb)) {
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
        elseif (!in_array($ext_gm,$ekstensi_gm)) {
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
         move_uploaded_file($_FILES['renja']['tmp_name'], 'f_renja/'.$ran_Num_kg.'_'.$filename_kg);
         $renja = $ran_Num_kg.'_'.$filename_kg;

         move_uploaded_file($_FILES['ad_art']['tmp_name'], 'f_ad_art/'.$ran_Num_sb.'_'.$filename_sb);
         $ad_art = $ran_Num_sb.'_'.$filename_sb;

         move_uploaded_file($_FILES['gambar']['tmp_name'], '../img/ormawa_struktur/'.$ran_Num_gm.'_'.$filename_gm);
         $gambar = $ran_Num_gm.'_'.$filename_gm;

        $sql = "UPDATE pengurus_ormawa SET NAMA_WAKIL = '$namaWk', NAMA_WAKIL2 = '$namaWk2', SEKRETARIS1 = '$sekre1', SEKRETARIS2 = '$sekre2',BENDAHARA1='$ben1',BENDAHARA2='$ben2', RENJA = '$renja', AD_ART = '$ad_art', MASA_JABATAN ='$masaJab', TAHUN_DILANTIK='$thnDlt', GAMBAR_STRUKTUR_ORGANISASI = '$gambar', email = '$email'  WHERE ID_ORMAWA='$id' AND USERNAME_KETUA = '$username' ";
        // var_dump($sql);
          //update query
          $query = mysqli_query($koneksi,$sql);
        if ($query) {
          ?>
						<script>
									Swal.fire({
									icon: 'success',
									title: 'Berhasil',
									text: 'Edit Berhasil',
									
									})
									</script>
				<?php
        } else {
          ?>
          <script>
                Swal.fire({
                icon: 'error',
                title: 'gagal',
                text: 'Edit Gagal',
                
                })
                </script>
      <?php
        }

          
        
       
        

                }
        
      
      }

?>