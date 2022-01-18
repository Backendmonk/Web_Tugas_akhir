
<!DOCTYPE html>
<html lang="en">
<?php

         include "SessionWKIII.php";

?>
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
                            <h6 class="m-0 font-weight-bold text-primary">Kegiatan Sesuai Renja  <a href="menuggu_approval.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-book fa-sm text-white-50"></i> Menunggu Approval</a> 
                            
                              
                                
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
                                            <th>Contoh</th>
                                            <th>Detail</th>
                                        
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                  
                                        <?php
                                                $q = mysqli_query($koneksi,"  SELECT * FROM `approval_kegiatan` WHERE `status` = 'Approve' OR `status` ='Tolak' ");
                                         

                                                while ($data = mysqli_fetch_array($q)) {
                                                    ?>
                                                             <tr>
                                                                    <td><?php echo $data['kegiatan'];?></td>

                                                                    <td><?php echo $data['nama_ormawa'];?></td>

                                                                    <td><?php echo $data['nama_kemahasiswaan'];?></td>


                                                                    <td><?php echo $data['status'];?></td>

                                                                    <td><?php echo $data['catatan'];?></td>

                                                                    <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "Detail_pengajuan_tracking.php?id= <?php echo $data['id_pengajuan']?>">Lihat Lebih Detail</a></button></td>
                                                                    
                                                                   
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
                            <h6 class="m-0 font-weight-bold text-primary">Kegiatan Tidak Sesuai Renja <a href="menuggu_approval.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-book fa-sm text-white-50"></i> Menunggu Approval</a> 
                            
                               
                                
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
                                                $q = mysqli_query($koneksi,"  SELECT * FROM `approval_pernyataan_kegiatan` WHERE `status` = 'Approve' OR `status` ='Tidak' ");
                                         

                                                while ($data = mysqli_fetch_array($q)) {
                                                    ?>
                                                             <tr>
                                                                    <td><?php echo $data['nama_kegiatan'];?></td>

                                                                    

                                                                    <td><?php echo $data['nama_kemahasiswaan'];?></td>


                                                                    <td><?php echo $data['status'];?></td>

                                                                    <td><?php echo $data['catatan'];?></td>

                                                                    <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "detail_pernyataan_tracking.php?id= <?php echo $data['id_pernyatan']?>">Lihat Lebih Detail</a></button></td>
                                                                    
                                                                   
                                                                </tr>

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