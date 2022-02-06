<!DOCTYPE html>
<html lang="en">
<head>
    <?php

        include "SessionKemahasiswaan.php";
        $id = trim( $_GET['id']);

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
                            <h6 class="m-0 font-weight-bold text-primary">Table Ormawa</h6>
                            
                            <?php
                                                $sql = "SELECT * FROM ormawa Where ID_ORMAWA = '$id' ";
                                                $qor = mysqli_query($koneksi,$sql);
                                                $data = mysqli_fetch_row($qor);
                                                    ?>
                                                             <tr>
                                                                    <td><?php echo $data[2];?></td>
                                                                   
                                                                </tr>
                            <br>
                                                <?php
                                                $sqlpo = "SELECT * FROM pengurus_ormawa where ID_ORMAWA = '$id' ";
                                                $qpo = mysqli_query($koneksi,$sqlpo);
                                                $dpo = mysqli_fetch_row($qpo);
                                        ?>
                    <p><?= $dpo[12] ?></p>
                    <p><?= $dpo[14] ?></p>
                    <a class="btn btn-primary col-2" href="lihatPdfOrmawa.php?id=f_renja/<?= $dpo[10] ?>" role="button">Renja</a>
                    <a class="btn btn-primary col-2" href="lihatPdfOrmawa.php?id=f_ad_art/<?= $dpo[11] ?>" role="button">AD ART</a>
                     
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jabatan</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                            <td>NAMA KETUA</td>
                                            <td><?= $dpo[3] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA WAKIL</td>
                                            <td><?= $dpo[4] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA WAKIL 2</td>
                                            <td><?= $dpo[5] ?></td>
                                        </tr>
                                        <tr>
                                            <td>SEKRETARIS 1</td>
                                            <td><?= $dpo[6] ?></td>
                                        </tr>
                                        <tr>
                                            <td>SEKRETARIS 2</td>
                                            <td><?= $dpo[7] ?></td>
                                        </tr>
                                        <tr>
                                            <td>BENDAHARA 1</td>
                                            <td><?= $dpo[8] ?></td>
                                        </tr>
                                        <tr>
                                            <td>BENDAHARA 2</td>
                                            <td><?= $dpo[9] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Logo</td>
                                            <td><?php echo '<img src="../Ormawa/f_logo/'.$dpo[15].'" alt="HTML5 Icon" style="width:50px;height:50px">';  ?></td>
                                        </tr>
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