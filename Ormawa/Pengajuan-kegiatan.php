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
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">
        

                    <?php

                    $random = rand(1,1000);

                    ?>

                    <form class="row g-3" method = "post" enctype = "multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">ID Kegiatan</label>
    <input type="text" readonly class="form-control"  value = " <?php echo $random ?> " id="inputEmail4" name = "ID">
  </div>
      <?php

          $dataormawa = mysqli_query($koneksi,"SELECT ormawa.NAMA_ORMAWA as ormawa FROM `pengurus_ormawa` INNER JOIN `ormawa` ON pengurus_ormawa.ID_ORMAWA = ormawa.ID_ORMAWA WHERE pengurus_ormawa.USERNAME_KETUA = '$array[USERNAME_KETUA]' ");
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
    <label for="inputPassword4" class="form-label">Konsep Kegiatan</label>
    <input type="file" class="form-control" id="inputPassword4" name ="konsep">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Sub Kegiatan</label>
    <input type="file" class="form-control" id="inputEmail4" name="sub_kegiatan">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Pj Kegiatan</label>
    <input type="text" class="form-control" id="inputPassword4" name ="pj">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Latar Belakang</label>
    <input type="file" class="form-control" id="inputPassword4" name= "latar_belakang">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tujuan Kegiatan</label>
    <input type="file" class="form-control" id="inputPassword4" name="tujuan">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tanggal Kegiatan</label>
    <input type="date" class="form-control" id="inputPassword4" name="tanggal">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Tempat kegiatan</label>
    <input type="text" class="form-control" id="inputPassword4" name= "tempat">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">SK Kegiatan</label>
    <input type="file" class="form-control" id="inputPassword4" name="sk">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Timeline Kegiatan</label>
    <input type="file" class="form-control" id="inputPassword4" name="timeline">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">RAB</label>
    <input type="file" class="form-control" id="inputPassword4" name= "rab">
  </div>
  <?php

      $ketua = mysqli_query($koneksi, "SELECT pengurus_ormawa.NAMA_KETUA as ketua, pengurus_ormawa.NAMA_WAKIL as wakil,pengurus_ormawa.NAMA_WAKIL2 as wakil2, pengurus_ormawa.SEKRETARIS1 as sek1 ,pengurus_ormawa.SEKRETARIS2 as sek2 ,pengurus_ormawa.BENDAHARA1 as bn1,pengurus_ormawa.BENDAHARA2 as bn2 FROM `pengurus_ormawa` WHERE 1");
      $arr_ketua = mysqli_fetch_array($ketua);

?>


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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
<a class="btn btn-primary" href="login/logout.php">Logout</a>
</div>
</div>
</div>
</div>

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
    

      if(isset($_POST['ajukan'])){
        $id = $_POST['ID'];
        $nama = $_POST['nama_kegiatan'];
        
       // konsep kegiatan
        $ran_Num_kg = rand();
        $filename_kg = $_FILES['konsep']['name'];
        $ext_kg = pathinfo($filename_kg, PATHINFO_EXTENSION);
        $ekstensi_kg = array('doc','docx','pdf');
  
        // sub kegiatan
        $ran_Num_sb = rand();
        $filename_sb = $_FILES['latar_belakang']['name'];
        $ext_sb = pathinfo($filename_sb, PATHINFO_EXTENSION);
        $ekstensi_sb = array('doc','docx','pdf');

        // latar belakang
        $ran_Num_lb = rand();
        $filename_lb= $_FILES['latar_belakang']['name'];
        $ext_lb = pathinfo($filename_lb, PATHINFO_EXTENSION);
        $ekstensi_lb = array('doc','docx','pdf');
      
        //tujuan
        $ran_Num_tj = rand();
        $filename_tj = $_FILES['tujuan']['name'];
        $ext_tj = pathinfo($filename_tj, PATHINFO_EXTENSION);
        $ekstensi_tj = array('doc','docx','pdf');

        $tempat = $_POST['tempat'];
        $tanggal = $_POST['tanggal'];

        //Sk
        $ran_Num_sk  = rand();
        $filename_sk = $_FILES['sk']['name'];
        $ext_sk  = pathinfo($filename_sk, PATHINFO_EXTENSION);
        $ekstensi_sk  = array('doc','docx','pdf');

        //timeline
       
        $ran_Num_tm = rand();
        $filename_tm = $_FILES['timeline']['name'];
        $ext_tm = pathinfo($filename_tm, PATHINFO_EXTENSION);
        $ekstensi_tm = array('doc','docx','pdf');
     
        //rab
        $ran_Num_rb = rand();
        $filename_rb = $_FILES['rab']['name'];
        $ext_rb = pathinfo($filename_rb, PATHINFO_EXTENSION);
        $ekstensi_rb = array('doc','docx','pdf');

    
        $ketua = $_POST['ketua'];
        $contac = $_POST['contact'];
        $kategori = $_POST['kategori'];
        $pj = $_POST['pj'];
        $status = 'Belum Diterima';
        $nama_ormawa = $_POST['nama_ormawa'];
        
        //get ormawa id

        $getid = mysqli_query($koneksi,"SELECT ID_ORMAWA as idormawa FROM `ormawa` Where NAMA_ORMAWA ='$nama_ormawa' ");
        $arr_ID = mysqli_fetch_array($getid);
        $id_ormawa =  $arr_ID['idormawa'];
        //
        
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
        elseif (!in_array($ext_lb,$ekstensi_lb)) {
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
        elseif (!in_array($ext_rb,$ekstensi_rb)) {
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
        elseif (!in_array($ext_sk,$ekstensi_sk)) {
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
        elseif (!in_array($ext_tj,$ekstensi_tj)) {
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
        elseif (!in_array($ext_tm,$ekstensi_tm)) {
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
         move_uploaded_file($_FILES['konsep']['tmp_name'], 'f_kegiatan/'.$ran_Num_kg.'_'.$filename_kg);
         $konsep = $ran_Num_kg.'_'.$filename_kg;

         move_uploaded_file($_FILES['sub_kegiatan']['tmp_name'], 'f_subkegiatan/'.$ran_Num_sb.'_'.$filename_sb);
         $sub_kegiatan = $ran_Num_sb.'_'.$filename_sb;
         
         move_uploaded_file($_FILES['latar_belakang']['tmp_name'], 'f_latarbelakang/'.$ran_Num_lb.'_'.$filename_lb);
         $latar_belakang = $ran_Num_lb.'_'.$filename_lb;

         move_uploaded_file($_FILES['tujuan']['tmp_name'], 'f_tujuan/'.$ran_Num_tj .'_'.$filename_tj );
         $tujuan = $ran_Num_tj .'_'.$filename_tj ;
        
         move_uploaded_file($_FILES['sk']['tmp_name'], 'f_SK/'.$ran_Num_sk .'_'.$filename_sk );
         $sk = $ran_Num_sk .'_'.$filename_sk ;
         
         move_uploaded_file($_FILES['timeline']['tmp_name'], 'f_timeline/'.$ran_Num_tm.'_'.$filename_tm);
         $timeline = $ran_Num_tm.'_'.$filename_tm;

         move_uploaded_file($_FILES['rab']['tmp_name'], 'f_rab/'.$ran_Num_rb.'_'.$filename_rb);
         $rab = $ran_Num_rb.'_'.$filename_rb;
        
       

          //insert query
          $ins = mysqli_query($koneksi,"INSERT INTO `pengajuan_kegiatan`(`ID_PENGAJUAN`, `ID_ORMAWA`, `NAMA_ORMAWA_FK`, `NAMA_KEGIATAN`, `KONSEP_KEGIATAN`, `SUB_KEGIATAN`, `PJ_KEGIATAN`, `LATAR_BELAKANG`, `TUJUAN_KEGIATAN`, `TGL_KEGIATAN`, `TEMPAT_KEGIATAN`, `SK_KEPANITIAAN`, `TIMELINE_KEGIATAN`, `RAB`, `KETUA_PANITIA`, `CONTAC_PERSON`, `KATEGORI_KEGIATAN`, `STATUS`) VALUES ('$id','$id_ormawa','$nama_ormawa','$nama','$konsep','$sub_kegiatan','$pj','$latar_belakang','$tujuan','$tanggal','$tempat','$sk','$timeline','$rab','$ketua','$contac','$kategori','$status')");

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