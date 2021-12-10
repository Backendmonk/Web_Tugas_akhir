<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>


    <?php
            include "../inc/koneksi.php";
    ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column pt-4">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class=" text-center  mb-4">
                        <h3 <span class="text-danger">STRUKTUR ORGANISASI</span> <span class=" text-gray-500"> WAKIL KETUA III</span> </h3>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <main class="col overflow-auto h-100">
                            <div class="row text-center mb-5">
                                <?php
                                    $q = mysqli_query($koneksi,"SELECT * FROM `strukturwkiii`");
                                    $data = mysqli_fetch_array($q);

                                      
                                ?>
                                <div class="col">
                                    <h4>Ketua</h4>
                                    <img class="border border-3 rounded-circle" src="<?php echo "../img/F_ketua/".$data['gambar_ketua'];  ?>" alt="" width="150px" height="150px">

                                    <h5><?php echo $data['Nama_ketua'] ?></h5>
                                </div>
                            </div>
                            <div class="row text-center mb-5">
                                <div class="col">
                                <h4>Bidang Kemahasiswaan</h4>
                                <img class="border border-3 rounded-circle" src="<?php echo "../img/F_kemahasiswaan/".$data['gambar_kemahasiswaan'];  ?>" alt="" width="150px" height="150px">
                                <h5><?php echo $data['nama_bid_kemahasiswaan'] ?></h5>
                                </div>


                                <div class="col">
                                <h4>Bidang Alumni</h4>
                                <img class="border border-3 rounded-circle" src="<?php echo "../img/F_alumni/".$data['gambar_alumni'];  ?>" alt="" width="150px" height="150px">
                                <h5><?php echo $data['nama_bid_alumni'] ?></h5>
                                </div>

                                <div class="col">
                                <h4>Bidang Pusat Karir</h4>
                                <img class="border border-3 rounded-circle" src="<?php echo "../img/F_pusat/".$data['gambar_pusat_karir'];  ?>" alt="" width="150px" height="150px">
                                <h5><?php echo $data['nama_bid_pusat_karir'] ?></h5>
                                </div>
                            </div>
                            
                            <div class="row text-center mb-5 px-5">
                            <div class="col">
                            <h4>Sekretaris WKIII</h4>
                            <img class="border border-3 rounded-circle" src="<?php echo "../img/F_sekretaris/".$data['gambar_sekretaris'];  ?>" alt="" width="150px" height="150px">
                            <h5><?php echo $data['Sekretaris_WKIII'] ?></h5>
                                </div>

                                <div class="col">
                                <h4>Bimbingan Konseling</h4>
                                <img class="border border-3 rounded-circle" src="<?php echo "../img/F_Bimbingan/".$data['gambar_bimbingan_konseling'];  ?>" alt="" width="150px" height="150px">
                                <h5><?php echo $data['nama_bimbingan_konseling'] ?></h5>
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
<!-- summon modal -->
<?php include 'Template/modal.php' ?>
</body>

</html>
<!-- logic modal -->
<?php include 'Template/EditProfilePass.php'?>