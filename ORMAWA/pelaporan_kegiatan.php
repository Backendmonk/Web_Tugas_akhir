<?php
        include "SessionPengurus.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kegiatan Ormawa</title>

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
                        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="pengajuanLPJ.php">Pengajuan LPJ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="BuktiKegiatan.php">Bukti Kegiatan</a>
                            </li>
                            </ul>
                        </div>
                        </nav>
                                <table class="table table-bordered">
                                <button type="button" class="btn btn-primary mt-2"><a style="text-decoration:none; Color:white;" href="pengajuanLPJ.php">Ajukan LPJ</a></button>
                                <button type="button" class="btn btn-primary ml-2 mt-2"><a style="text-decoration:none; Color:white;" href="../Format-Format/FormatLPJKegiatan.docx">Format LPJ</a></button>
                        <h3>Pengajuan LPJ</h3>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Ormawa</th>
                                <th scope="col">Approval</th>
                                <th scope="col">Action</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Kemahasiswaan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=0;
                                $qlpj = mysqli_query($koneksi, "SELECT * FROM pengajuan_lpj");
                                while ($dlpj = mysqli_fetch_array($qlpj)) {
                                    $no++;
                                    $idlpj = $dlpj['id'];
                                $qALpj = mysqli_query($koneksi,"SELECT * FROM applpj where idlpj = '$idlpj'");
                                $dALpj = mysqli_fetch_row($qALpj);
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $dlpj['nama_kegiatan'] ?></td>
                                <td><?= $dlpj['nama_ormawa'] ?></td>
                                <?php if (!empty($dALpj)) { 
                                    if ($dALpj[3]==true) {
                                        $sts = 'Approved';
                                        $st = 'complete';
                                    } elseif($dALpj[3]==null) {
                                        $st = 'ongoing';
                                        $sts = 'Diperiksa';
                                    }else{
                                        $st = 'ongoing';
                                        $sts = 'Unapproved';
                                    }
                                    ?>
                                    <td><?= $sts ?></td>
                                    
                             <?php   } else {
                                 $st = 'ongoing';
                                 
                                 ?>
                                <td> </td>
                              <?php  } ?>
                                <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "detailLPJ.php?id= <?php echo  $idlpj?>">Lihat Lebih Detail</a></button></td>
                                <?php if (!empty($dALpj)) {
                                    $idkema = $dALpj[2];
                                    $qk = mysqli_query($koneksi, "SELECT NAMA_KEMAHASISWAAN FROM kemahasiswaan where NIDN_KEMAHASISWAAN = '$idkema' ");
                                    $dk = mysqli_fetch_row($qk);
                                    $nmk = $dk[0];
                                    ?>
                                    <td><?= $dALpj[4] ?></td>
                                    <td><?= $nmk ?></td>
                             <?php   } else {?>
                                <td> </td>
                                <td> </td>
                              <?php  } ?>
                              <td><?= $st ?></td>
                            </tr> 
                            <?php } ?>         
                        </tbody>
                    </table>
                        </main>
                    </div>

                   
                    <!-- Content Row -->

                    <div class="row">


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
    <!-- summon modal untuk allpage -->
    <?php include 'Template/modal.php' ?>

    <?php include '../template/footInc.php';
    ?>

</body>

</html>
<?php include 'Template/EditProfilePass.php' ?>
<?php

if (!isset($_SESSION['notif'])) {
    ?>
                 
          <?php
          unset($_SESSION['notif']);
  }  else if($_SESSION['notif']==true) {
    ?>
     <script>
                              Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: 'upload Berhasil',
                              
                              })
                              </script>
<?php
unset($_SESSION['notif']);
  }else{
?>
<script>
          Swal.fire({
          icon: 'error',
          title: 'gagal',
          text: 'gagal ',
          
          })
          </script>
          
<?php } 
unset($_SESSION['notif']);



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