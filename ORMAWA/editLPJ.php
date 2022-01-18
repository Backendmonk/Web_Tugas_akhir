<!DOCTYPE html>
<html lang="en">
<?php

        include "SessionPengurus.php";
        $id = $_GET['id'];

        $q = mysqli_query($koneksi,"SELECT * FROM `pengajuan_lpj` where `id` = $id ");

        $arrp = mysqli_fetch_array($q);

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

                    
                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">
        

                   

                    <form class="row g-3" action="Logic/pengajuanLPJ.php" method = "post" enctype = "multipart/form-data">

      <?php

            $dataormawa = mysqli_query($koneksi,"SELECT ormawa.NAMA_ORMAWA as ormawa FROM `pengurus_ormawa` INNER JOIN `ormawa` ON pengurus_ormawa.ID_ORMAWA = ormawa.ID_ORMAWA WHERE pengurus_ormawa.USERNAME_KETUA = '$array[USERNAME_KETUA]' ");
            $arr = mysqli_fetch_array($dataormawa);
            $tgl = date('Y-m-d'); 
            $dtk = mysqli_query($koneksi, "SELECT id, nama_kegiatan from pengajuan_kegiatan_mhs where Tanggal < '$tgl' ");
            
      ?>
  <div class="col-md-6">
  
    <label for="inputPassword4" class="form-label">Nama Ormawa</label>
    <input type="text" class="form-control" readonly id="inputPassword4" value = "<?php echo $id; ?>" name="id" hidden>
    <input type="text" class="form-control" readonly id="inputPassword4" value = "<?php echo $arrp['id_pengajuan']; ?>" name="nk" hidden>
    <input type="text" class="form-control" readonly id="inputPassword4" value = "<?php echo $arr['ormawa']; ?>" name="no" readonly>
    <input type="text" class="form-control" readonly id="inputPassword4" value = "<?php echo $array['ID_ORMAWA']; ?>" name="ino" hidden>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nama Kegiatan</label>
    <input type="text" class="form-control" value="<?php echo $arrp['nama_kegiatan'];?>" readonly>
  </div>
  <div class="col-md-6">
  <label for="inputPassword4" class="form-label">Pendahuluan</label>
    <textarea class="form-control" id="inputPassword4"  name ="pdln" rows="4" cols="50"><?= $arrp['pendahuluan'];?></textarea>
    
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Pelaksanaan Kegiatan</label>
    <input type="file" class="form-control" id="inputEmail4" value="<?php echo $arrp['pelaksanaan_kegaitan'];?>" name="pk">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Kepanitiaan</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['kepanitiaan'];?>" name ="kepan">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Peserta</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['peserta'];?>" name= "peser">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Pencapaian</label>

    <textarea class="form-control" id="inputPassword4"  name="penca" rows="4" cols="50"><?php echo $arrp['pencapaian'];?></textarea>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">RAB Pemasukan</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['rab_masukan'];?>" name="rabin">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">RAB Pengeluaran</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['rab_pengeluaran'];?>" name= "rabout">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Realisasi Anggaran</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['realisasi_anggaran'];?>" name="rp">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Penutup</label>
    <textarea class="form-control" id="inputPassword4" name="ttp" rows="4" cols="50"><?php echo $arrp['penutup'];?></textarea>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Bukti Pembayaran</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['bukti_pembayaran'];?>" name= "bp">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Berita Acara</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['berita_acara'];?>" name= "ba">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Absensi</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['absensi'];?>" name= "absen">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Notulensi Rapat/Seminar</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['rapat'];?>" name= "nr">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Rekap Penilaian Peserta</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['nilai_peserta'];?>" name= "rpp">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Desain Sertifikat</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['desain_sertifikat'];?>" name= "ds">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Dokumentasi Kegiatan</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['dokumentasi'];?>" name= "dk">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Softcopy LPJ</label>
    <input type="file" class="form-control" id="inputPassword4" value="<?php echo $arrp['LPJ'];?>" name= "slpj">
  </div>
 
  
  
  <div class="col-12">
      <br>
    
    <button type="submit" class="btn btn-primary" name = "edit">Simpan</button>
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

    if (!isset($_SESSION['pk'])) {
        ?>
                     
              <?php
              unset($_SESSION['pk']);
      }  else if($_SESSION['pk']==true) {
        ?>
         <script>
                                  Swal.fire({
                                  icon: 'error',
                                  title: 'gagal',
                                  text: 'ekstensi Pelaksana Kegiatan salah',
                                  
                                  })
                                  </script>
    <?php
    unset($_SESSION['pk']);
                                }else{

                                }
    
    if (!isset($_SESSION['kepan'])) {
        ?>
                        
        <?php
        unset($_SESSION['kepan']);
}  else if($_SESSION['kepan']==true) {
            ?>
            <script>
            Swal.fire({
            icon: 'error',
            title: 'gagal',
            text: 'ekstensi kepanitiaan salah',
            })
            </script>
            <?php
    unset($_SESSION['kepan']);
                                }else {
                                    
                                }

if (!isset($_SESSION['kepan'])) {
        ?>
                        
        <?php
        unset($_SESSION['kepan']);
}  else if($_SESSION['kepan']==true) {
            ?>
            <script>
            Swal.fire({
            icon: 'error',
            title: 'gagal',
            text: 'ekstensi kepanitiaan salah',
            })
            </script>
            <?php
    unset($_SESSION['kepan']);
                                }else {
                                    
                                }


if (!isset($_SESSION['peser'])) {
    ?>
                    
    <?php
    unset($_SESSION['peser']);
}  else if($_SESSION['peser']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi peserta salah',
        })
        </script>
        <?php
unset($_SESSION['peser']);
}else {
    
}

if (!isset($_SESSION['rabin'])) {
    ?>
                    
    <?php
    unset($_SESSION['rabin']);
}  else if($_SESSION['rabin']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi RAB Pemasukan salah',
        })
        </script>
        <?php
unset($_SESSION['rabin']);
}else {
    
}

if (!isset($_SESSION['rabout'])) {
    ?>
                    
    <?php
    unset($_SESSION['rabout']);
}  else if($_SESSION['rabout']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi RAB Pengeluaran salah',
        })
        </script>
        <?php
unset($_SESSION['rabout']);
}else {
    
}

if (!isset($_SESSION['rp'])) {
    ?>
                    
    <?php
    unset($_SESSION['rp']);
}  else if($_SESSION['rp']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Realisasi Anggaran salah',
        })
        </script>
        <?php
unset($_SESSION['rp']);
}else {
    
}



if (!isset($_SESSION['bp'])) {
    ?>
                    
    <?php
    unset($_SESSION['bp']);
}  else if($_SESSION['bp']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Bukti Pembayaran salah',
        })
        </script>
        <?php
unset($_SESSION['bp']);
}else {
    
}

if (!isset($_SESSION['ba'])) {
    ?>
                    
    <?php
    unset($_SESSION['ba']);
}  else if($_SESSION['ba']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Berita Acara salah',
        })
        </script>
        <?php
unset($_SESSION['ba']);
}else {
    
}
if (!isset($_SESSION['absen'])) {
    ?>
                    
    <?php
    unset($_SESSION['absen']);
}  else if($_SESSION['absen']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi absensi salah',
        })
        </script>
        <?php
unset($_SESSION['absen']);
}else {
    
}

if (!isset($_SESSION['nr'])) {
    ?>
                    
    <?php
    unset($_SESSION['nr']);
}  else if($_SESSION['nr']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Notulensi Rapat salah',
        })
        </script>
        <?php
unset($_SESSION['nr']);
}else {
    
}

if (!isset($_SESSION['rpp'])) {
    ?>
                    
    <?php
    unset($_SESSION['rpp']);
}  else if($_SESSION['rpp']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Rangkap Penilaian Peserta salah',
        })
        </script>
        <?php
unset($_SESSION['rpp']);
}else {
    
}

if (!isset($_SESSION['ds'])) {
    ?>
                    
    <?php
    unset($_SESSION['ds']);
}  else if($_SESSION['ds']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Desian Sertifikat salah',
        })
        </script>
        <?php
unset($_SESSION['ds']);
}else {
    
}

if (!isset($_SESSION['dk'])) {
    ?>
                    
    <?php
    unset($_SESSION['dk']);
}  else if($_SESSION['dk']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Dokumentasi Kegiatan salah',
        })
        </script>
        <?php
unset($_SESSION['dk']);
}else {
    
}

if (!isset($_SESSION['slpj'])) {
    ?>
                    
    <?php
    unset($_SESSION['slpj']);
}  else if($_SESSION['slpj']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Softcopy LPJ salah',
        })
        </script>
        <?php
unset($_SESSION['slpj']);
}else {
    
}

if (!isset($_SESSION['ulpj'])) {
    ?>
                    
    <?php
    unset($_SESSION['ulpj']);
}  else if($_SESSION['ulpj']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'success',
        title: 'berhasil',
        text: 'Berhasil Upload',
        })
        </script>
        <?php
unset($_SESSION['ulpj']);
}else {
    ?>
    <script>
    Swal.fire({
    icon: 'error',
    title: 'gagal',
    text: 'gagal upload',
    })
    </script>
    <?php
unset($_SESSION['ulpj']);
}
?>
