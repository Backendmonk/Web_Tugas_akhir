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
                <i style="font-size:10px;">Surat Pengajuan hanya untuk pengajuan yang tidak sesuai dengan renja</i>
                 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      
                        <a href="surat_pengajuan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-book fa-sm text-white-50"></i> Surat Pengajuan Kegiatan</a>
                               
                                
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
    <label for="inputEmail4" class="form-label">Tema Kegiatan</label>
    <input type="text" class="form-control" id="inputEmail4" name = "tema_kegiatan">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Konsep Kegiatan</label>
    
    <textarea class="form-control" name="konsep" rows="4" cols="50"></textarea>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Sub Kegiatan</label>
    
    <textarea class="form-control" name="subkegiatan" rows="4" cols="50"></textarea>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Pj Kegiatan</label>
    
    <textarea class="form-control" name="pj" rows="4" cols="50"></textarea>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Latar Belakang</label>
    
    <textarea class="form-control" name="latarbelakang" rows="4" cols="50"></textarea>
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tujuan Kegiatan</label>
    
    <textarea class="form-control" name="tujuan" rows="4" cols="50"></textarea>
  </div>


  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Hasil Yang Diharapkan</label>
    
    <textarea class="form-control" name="harapan" rows="4" cols="50"></textarea>
  </div>
  
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Target Pemasaran</label>
    
    <textarea class="form-control" name="target" rows="4" cols="50"></textarea>
  </div>


  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tanggal Kegiatan</label>
    
    <input type="date" class="form-control" name="tanggal">

  </div>



  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Waktu Kegiatan</label>
    
    <input type="time" class="form-control" name="waktu">

  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tempat Kegiatan</label>
    
    <input type="text" class="form-control" name="tempat">

  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">SK Kepanitiaan</label>
    
    <input type="file" class="form-control" name="sk">

  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Jadwal Kegiatan</label>
    
    <input type="file" class="form-control" name="jadwal">

  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">RAB</label>
    
    <input type="file" class="form-control" name="rab">

  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Renja</label>
    
    <input type="file" class="form-control" name="renja">

  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Profile Pengisi Acara</label>
    
    <input type="file" class="form-control" name="profile">

  </div>


  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Desain Poster Dan Sertifikat</label>
    
    <input type="file" class="form-control" name="poster">

  </div>



  
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Ketua</label>
    
    <input type="text" class="form-control" name="ketua">

  </div>

    
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Contac Person</label>
    
    <input type="text" class="form-control" name="contac">

  </div>

  
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Proposal</label>
    
    <input type="file" class="form-control" name="proposal">

  </div>


  <?php

    //   $ketua = mysqli_query($koneksi, "SELECT pengurus_ormawa.NAMA_KETUA as ketua, pengurus_ormawa.NAMA_WAKIL as wakil,pengurus_ormawa.NAMA_WAKIL2 as wakil2, pengurus_ormawa.SEKRETARIS1 as sek1 ,pengurus_ormawa.SEKRETARIS2 as sek2 ,pengurus_ormawa.BENDAHARA1 as bn1,pengurus_ormawa.BENDAHARA2 as bn2 FROM `pengurus_ormawa` WHERE`ID_ORMAWA` = $array[ID_ORMAWA]");
    //   $arr_ketua = mysqli_fetch_array($ketua);

?>

<!-- 
  <div class="col-md-6" >
    <label for="inputPassword4" class="form-label">Ketua Panitia</label>
    <div  class="input-group mb-3">
    <select name="ketua" class="form-select">
      <option value="">Pilih</option>
        <option value="<?php echo $arr_ketua['ketua'] ?>"><?php echo $arr_ketua['ketua']; ?></option>
        <option value="<?php echo $arr_ketua['wakil'] ?>"><?php echo $arr_ketua['wakil']; ?></option>
        <option value="<?php echo $arr_ketua['wakil2'] ?>"><?php echo $arr_ketua['wakil2']; ?></option>
        <option value="<?php echo $arr_ketua['sek1'] ?>"><?php echo $arr_ketua['sek1']; ?></option>
        <option value="<?php echo $arr_ketua['sek2'] ?>"><?php echo $arr_ketua['sek2']; ?></option>
        <option value="<?php echo $arr_ketua['bn1'] ?>"><?php echo $arr_ketua['bn1']; ?></option>
        <option value="<?php echo $arr_ketua['bn2'] ?>"><?php echo $arr_ketua['bn2']; ?></option>

    </select>
    </div>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Contac Person</label>
    <input type="text" class="form-control" id="inputPassword4" name= "contact">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Katagori Kegiatan</label>
    <input type="text" class="form-control" id="inputPassword4" name="kategori">
  </div> -->
  
  
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
        $nama_ormawa = $arr['ormawa'];
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tema_kegiatan = $_POST['tema_kegiatan'];
        $konsep = $_POST['konsep'];
        $sub_kegiatan =$_POST['subkegiatan'];
        $pj = $_POST['pj'];
        $latar_belakang = $_POST['latarbelakang'];
        $tujuan = $_POST['tujuan'];
        $hasil= $_POST['harapan'];
        $target = $_POST['target'];
        $tanggal =$_POST['tanggal'];
        $waktu = $_POST['waktu'];
        $tempat = $_POST['tempat'];
        $tahun = $array['MASA_JABATAN'];

        $id_random = rand();

        // sk
        $ran_Num_sk = rand();
        $filename_sk = $_FILES['sk']['name'];
        $ext_sk = pathinfo($filename_sk, PATHINFO_EXTENSION);
        $ekstensi_sk = array('doc','docx','pdf');

         // jadwal
         $ran_Num_jadwal = rand();
         $filename_jadwal = $_FILES['jadwal']['name'];
         $ext_jadwal = pathinfo($filename_jadwal, PATHINFO_EXTENSION);
         $ekstensi_jadwal = array('doc','docx','pdf');

          // rab
          $ran_Num_rab = rand();
          $filename_rab = $_FILES['rab']['name'];
          $ext_rab = pathinfo($filename_rab, PATHINFO_EXTENSION);
          $ekstensi_rab = array('doc','docx','pdf');

            // renja
         $ran_Num_renja = rand();
         $filename_renja = $_FILES['renja']['name'];
         $ext_renja = pathinfo($filename_renja, PATHINFO_EXTENSION);
         $ekstensi_renja = array('doc','docx','pdf');

        
            // profile
         $ran_Num_profile = rand();
         $filename_profile = $_FILES['profile']['name'];
         $ext_profile = pathinfo($filename_profile, PATHINFO_EXTENSION);
         $ekstensi_profile = array('doc','docx','pdf');

           // poster
         $ran_Num_poster = rand();
         $filename_poster = $_FILES['poster']['name'];
         $ext_poster = pathinfo($filename_poster, PATHINFO_EXTENSION);
         $ekstensi_poster = array('doc','docx','pdf');

         
 

         // proposal
         $ran_Num_proposal = rand();
         $filename_proposal = $_FILES['proposal']['name'];
         $ext_proposal = pathinfo($filename_proposal, PATHINFO_EXTENSION);
         $ekstensi_proposal = array('doc','docx','pdf');

         $ketua = $_POST['ketua'];
         $contac = $_POST['contac'];


       
        
        if(!in_array($ext_sk,$ekstensi_sk)){
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
        elseif (!in_array($ext_jadwal,$ekstensi_jadwal)) {
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

        elseif (!in_array($ext_rab,$ekstensi_rab)) {
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

        elseif (!in_array($ext_renja,$ekstensi_renja)) {
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
        elseif (!in_array($ext_profile,$ekstensi_profile)) {
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
        elseif (!in_array($ext_poster,$ekstensi_poster)) {
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
        elseif (!in_array($ext_proposal,$ekstensi_proposal)) {
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

        move_uploaded_file($_FILES['sk']['tmp_name'], 'k_SK_kegiatan/'.$ran_Num_sk.'_'.$filename_sk);
        $sk = $ran_Num_sk.'_'.$filename_sk;
        

        move_uploaded_file($_FILES['jadwal']['tmp_name'], 'k_jadwal/'.$ran_Num_jadwal.'_'.$filename_jadwal);
        $jadwal = $ran_Num_jadwal.'_'.$filename_jadwal;

        move_uploaded_file($_FILES['rab']['tmp_name'], 'k_rab/'.$ran_Num_rab.'_'.$filename_rab);
        $rab = $ran_Num_rab.'_'.$filename_rab;

        move_uploaded_file($_FILES['renja']['tmp_name'], 'k_renja/'.$ran_Num_renja.'_'.$filename_renja);
        $renja = $ran_Num_renja.'_'.$filename_renja;


        move_uploaded_file($_FILES['profile']['tmp_name'], 'k_profile/'.$ran_Num_profile.'_'.$filename_profile);
        $profile = $ran_Num_profile.'_'.$filename_profile;
        
        move_uploaded_file($_FILES['poster']['tmp_name'], 'k_poster/'.$ran_Num_poster.'_'.$filename_poster);
        $poster = $ran_Num_poster.'_'.$filename_poster;


        move_uploaded_file($_FILES['proposal']['tmp_name'], 'k_proposal/'.$ran_Num_proposal.'_'.$filename_proposal);
        $proposal = $ran_Num_proposal.'_'.$filename_proposal;

        
        $query = mysqli_query($koneksi, "INSERT INTO `pengajuan_kegiatan_mhs`(`id`,`id_ormawa`, `nama_ormawa`, `nama_kegiatan`, `tema_kegiatan`, `konsep_kegiatan`, `sub_kegiatan`, `pj_kegiatan`, `latar_belakang`, `tujuan_kegiatan`, `hasil_harapan`, `targer_pemasaran`, `Tanggal`, `Waktu`, `Tempat`, `sk_kepanitiaan`, `jadwal_kegiatan`, `rab`, `profile_pengisi_acara`, `desain_poster_sertifikat`, `ketua_panitia`, `contac_person`, `softcopy_proposal`,`TAHUN_BERLANGSUNG`) VALUES ('$id_random','$id','$nama_ormawa','$nama_kegiatan','$tema_kegiatan','$konsep','$sub_kegiatan','$pj','$latar_belakang','$tujuan','$hasil','$target','$tanggal','$waktu','$tempat','$sk','$jadwal','$rab','$profile','$poster','$ketua','$contac','$proposal','$tahun')");


    

        $qinsert = mysqli_query($koneksi,"INSERT INTO `approval_kegiatan`(`id_pengajuan`, `nama_ormawa`, `kegiatan`, `status`) VALUES ('$id_random','$nama_ormawa','$nama_kegiatan','Pending')");
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
