<?php
        include "SessionKemahasiswaan.php";
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
    <!-- Custom styles for this template -->
 <link href="../css/sb-admin-2.min.css" rel="stylesheet">
<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> <a style="color :black;text-decoration:none;" href="appLPJ.php"> Approval LPJ
                                    </a>
                                |

                                <a style="color: black;text-decoration:none;" href="appBK.php">  Approval Bukti Kegiatan </a>
                            </h6>
                         <br>
                    </div>
                         <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                
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
                            error_reporting(0);
                                $no=1;
                                $qlpj = mysqli_query($koneksi, "SELECT * FROM pengajuan_lpj");
                                while ($dlpj = mysqli_fetch_array($qlpj)) {
                                    
                                    $idlpj = $dlpj['id'];
                                $qALpj = mysqli_query($koneksi,"SELECT * FROM applpj where idlpj = '$idlpj'");
                                $dALpj = mysqli_fetch_row($qALpj);
                            ?>
                            <?php  if ($dALpj[3]!=true) {  ?>
                               
                          
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dlpj['nama_kegiatan'] ?></td>
                                <td><?= $dlpj['nama_ormawa'] ?></td>
                                <?php if (!empty($dALpj)) { 
                                    if ($dALpj[3]==true) {
                                        $sts = 'Approved';
                                    } else {
                                        $sts = 'Unapproved';
                                    }
                                    ?>
                                    <td><?= $sts ?></td>
                             <?php   } else {?>
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
                              <td>ongoing</td>
                            </tr> 
                            <?php } ?>         
                            <?php } ?>         
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
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

    <!-- summon Modal-->
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
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
<?php include 'Template/EditProfilePass.php' ?>
<?php

if (!isset($_SESSION['notifA'])) {
    ?>
                 
          <?php
          unset($_SESSION['notifA']);
  }  else if($_SESSION['notifA']==true) {
    ?>
     <script>
                              Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: 'Approve Berhasil',
                              
                              })
                              </script>
<?php
unset($_SESSION['notifA']);
  }else{
?>
<script>
          Swal.fire({
          icon: 'error',
          title: 'gagal',
          text: 'Approve gagal',
          
          })
          </script>
          
<?php } 
unset($_SESSION['notifA']);

if (!isset($_SESSION['notifU'])) {
    ?>
                 
          <?php
          unset($_SESSION['notifU']);
  }  else if($_SESSION['notifU']==true) {
    ?>
     <script>
                              Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: 'Unapproved Berhasil',
                              
                              })
                              </script>
<?php
unset($_SESSION['notifU']);
  }else{
?>
<script>
          Swal.fire({
          icon: 'error',
          title: 'gagal',
          text: 'UnApproved gagal',
          
          })
          </script>
          
<?php } 
unset($_SESSION['notifU']);
?>