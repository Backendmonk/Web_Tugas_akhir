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
                            <li class="nav-item">
                                <a class="nav-link" href="pelaporan_kegiatan.php">Pengajuan LPJ <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="BuktiKegiatan.php">Bukti Kegiatan</a>
                            </li>
                            </ul>
                        </div>
                        </nav>
                                <table class="table table-bordered">
                                <button type="button" class="btn btn-primary ml-2 mt-2"><a style="text-decoration:none; Color:white;" href="../Format-Format/FORMATSKKepengurusan,SuratPernyataanKegiatan,danBeritaAcara.doc">Format Bukti Kegiatan</a></button>
                                <form action="Logic/BuktiKegiatan.php" method="post"  enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="col-6">
                                            <label for="idk" class="form-label">Nama Kegiatan</label>
                                            <select name="idk" class="form-control mb-2" >
                                                <option value="" hidden> pilih kegiatan</option>
                                                <?php 
                                                    $dtk = mysqli_query($koneksi, "SELECT id, nama_kegiatan from surat_pernyataan_kegiatan");
                                                    while ($adtk = mysqli_fetch_array($dtk)) {
                                                ?>
                                                <option value="<?= $adtk['id'] ?>"><?= $adtk['nama_kegiatan'] ?></option>
                                                <?php }?>
                                            </select>
                                            </div>
                                            </div>
                                            <div class="col-12">
                                            <div class="col-6">
                                            <label for="bk" class="form-label">Bukti Kegiatan</label>
                                            <p>Lampirkan berita acara, absensi, dokumentasi, dan scan sertifikat dalam 1 file format pdf </p>
                                                <input type="file" class="form-control mb-2" name="bk" >
                                            </div>
                                          
                                            </div>
                                            <div class="col-6">
                                           
                                           <button type="submit" name="ajukan" class="btn btn-primary mb-3">Ajukan</button>                                                                                                 
                                           </div>                                                                                                
                                        </form>
                        <h3>Pengajuan Bukti Kegiatan</h3>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kegiatan</th>
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
                                $qlpj = mysqli_query($koneksi, "SELECT * FROM approval_pernyataan_kegiatan where status = 'Approve'");
                                while ($dlpj = mysqli_fetch_array($qlpj)) {
                                    $no++;
                                    $idlpj = $dlpj['id'];
                                $qALpj = mysqli_query($koneksi,"SELECT * FROM appbk where idbk = '$idlpj' ");
                                $dALpj = mysqli_fetch_row($qALpj);
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $dlpj['nama_kegiatan'] ?></td>
                                <?php if (!empty($dALpj)) { 
                                    if ($dALpj[3]==true) {
                                        $sts = 'Approved';
                                        $st = 'complete';
                                    } elseif($dALpj[3]==NULL) {
                                        $sts = 'Diperiksa';
                                        $st = 'ongoing';
                                    } else {
                                        $sts = 'Unapproved';
                                        $st = 'ongoing';
                                    }
                                    ?>
                                    <td><?= $sts ?></td>
                             <?php   } else {?>
                                <td> </td>
                              <?php  } ?>
                                <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "detailBK.php?id= <?php echo  $idlpj?>">Lihat Lebih Detail</a></button></td>
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
                              <?php if (!empty($st)) {?>
                              <td><?= $st  ?></td>
                             <?php   }else{ ?>
                                <td></td>
                             <?php   } ?>
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

if (!isset($_SESSION['bk'])) {
    ?>
                    
    <?php
    unset($_SESSION['bk']);
}  else if($_SESSION['bk']==true) {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'gagal',
        text: 'ekstensi Bukti Kegiatan salah',
        })
        </script>
        <?php
unset($_SESSION['bk']);
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