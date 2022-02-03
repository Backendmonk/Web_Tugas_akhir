
<!DOCTYPE html>
<html lang="en">
<?php

         include "SessionPembina.php";

?>
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

<?php include '../template/head.php' ?>
 <!-- Custom styles for this template -->
 <link href="../css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
               
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">
            <div class="bg-light border rounded-3 p-3">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kegiatan Sesuai Renja 
                              
                                
                            </h6>

                                 </h6>
                           

                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kegiatan</th>
                                           
                                            <th>Ormawa</th>
                                            <th>Kemahasiswaan</th>
                                            <th>Status</th>
                                            <th>Catatan</th>
                                            <th>Detail</th>
                                        
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    
                                        <?php $qor = mysqli_query($koneksi,"SELECT * FROM ormawa where NIDN = '$array[NIDN]' ");
                                        $dor = mysqli_fetch_row($qor);

                                                 $qp = mysqli_query($koneksi,"SELECT id, nama_kegiatan, Tanggal FROM pengajuan_kegiatan_mhs where id_ormawa = '$dor[0]'  ORDER BY Tanggal DESC ");
                                                while ($dp = mysqli_fetch_array($qp)) {
                                                    $dnow=date_create(date("Y-m-d"));
                                                    $dcek=date_create($dp[2]);
                                                    $cek= $dcek < date_sub($dnow,date_interval_create_from_date_string("0 days"));
                                                    if ($cek) {
                                                        $ak = mysqli_query($koneksi,"SELECT *  FROM approval_kegiatan WHERE status = 'Approve' AND id_pengajuan = '$dp[0]'  ");
                                                        $dak = mysqli_fetch_row($ak);
                                                        if (isset($dak)) {
                                                            $qpro = mysqli_query($koneksi,"SELECT id FROM pengajuan_lpj WHERE id_pengajuan = '$dak[1]'");
                                                            $dpro = mysqli_fetch_row($qpro);
                                                            if (empty($dpro) ) {

                                                                ?>
                                                                <tr>
                                                                       <td><?php echo $dak[3];?></td>

                                                                    <td><?php echo $dak[2];?></td>

                                                                    <td><?php echo $dak[5];?></td>


                                                                    <td><?php echo $dak[7];?></td>

                                                                    <td><?php echo $dak[6];?></td>
                                                                    <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "Detail_pengajuan_tracking.php?id= <?php echo $dak[1]?>">Lihat Lebih Detail</a></button></td>
                                                                <?php
                                                              }else {
                                                                  $idlpj = $dpro[0];
                                                                  $qalpj = mysqli_query($koneksi, "SELECT approve FROM applpj WHERE idlpj = '$idlpj'");
                                                                  $dalpj = mysqli_fetch_row($qalpj);
                                                                  if (empty($dalpj) || $dalpj[0] != true ) {
                                                                    ?>
                                                                    <tr>
                                                                       <td><?php echo $dak[3];?></td>

                                                                    <td><?php echo $dak[2];?></td>

                                                                    <td><?php echo $dak[5];?></td>


                                                                    <td><?php echo $dak[7];?></td>

                                                                    <td><?php echo $dak[6];?></td>
                                                                    <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "Detail_pengajuan_tracking.php?id= <?php echo $dak[1]?>">Lihat Lebih Detail</a></button></td>
                                                                    <?php
                                                                  }
                                                              }
      
                                                        }
                                                        
                                                    
                                                   
                                                    ?>
                                                         
                                                                 
                                                                    
                                                                   <?php } ?>
                                                                </tr>

                                                <?php
                                                }

                                        ?>
                                       
                                       
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <!-- renja end-->


                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kegiatan Tidak Sesuai Renja 
                            
                               
                                
                            </h6>

                                 </h6>
                           

                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kegiatan</th>
                                            <th>Kemahasiswaan</th>
                                            <th>Status</th>
                                            <th>Catatan</th>
                                            <th>Detail</th>
                                        
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    
                                        <?php
                                                $qspk = mysqli_query($koneksi, "SELECT id from surat_pernyataan_kegiatan where id_ormawa = '$dor[0]'");
                                                while ($dspk = mysqli_fetch_array($qspk)) {
                                                    $idspk = $dspk[0];
                                                    $qapk = mysqli_query($koneksi, "SELECT * from approval_pernyataan_kegiatan where status = 'Approve' and id_pernyatan = '$idspk' ");
                                                    $dapk = mysqli_fetch_array($qapk);
                                                    if (empty($dapk)) {
                                                    }else {
                                                      $qbk = mysqli_query($koneksi, "SELECT id from bukti_kegiatan_mahasiswa where id_kegiatan = '$idspk' ");
                                                      $dbk = mysqli_fetch_row($qbk);
                                                      
                                                      if (!isset($dbk)) {
                                                          ?>
                                                            <tr>
                                                                    <td><?php echo $dapk['nama_kegiatan'];?></td>

                                                                    

                                                                    <td><?php echo $dapk['nama_kemahasiswaan'];?></td>


                                                                    <td><?php echo $dapk['status'];?></td>

                                                                    <td><?php echo $dapk['catatan'];?></td>
                                                                    

                                                                    <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "detail_pernyataan_tracking.php?id= <?php echo $dapk['id_pernyatan']?>">Lihat Lebih Detail</a></button></td>
                                                                    </tr>
                                                          <?php
                                                      }else {
                                                          $qabk = mysqli_query($koneksi, "SELECT id from appbk where idbk = '$dbk[0]' and approve <> true ");
                                                          $dabk = mysqli_fetch_row($qabk);
                                                          if (isset($dabk)) {
                                                            ?>
                                                            <tr>
                                                                    <td><?php echo $dapk['nama_kegiatan'];?></td>

                                                                    

                                                                    <td><?php echo $dapk['nama_kemahasiswaan'];?></td>


                                                                    <td><?php echo $dapk['status'];?></td>

                                                                    <td><?php echo $dapk['catatan'];?></td>
                                                                    

                                                                    <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "detail_pernyataan_tracking.php?id= <?php echo $dapk['id_pernyatan']?>">Lihat Lebih Detail</a></button></td>
                                                                    </tr>
                                                          <?php
                                                          }
                                                      }
                                                  
                                                    ?>
                                                            
                                                                   <?php }?>
                                                                   

                                                <?php
                                                }

                                        ?>
                                       
                                       
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
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