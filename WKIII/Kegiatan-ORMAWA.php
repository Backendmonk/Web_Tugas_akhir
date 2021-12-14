
<!DOCTYPE html>
<html lang="en">
<?php

         include "SessionWKIII.php";

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

<?php include '../template/head.php' ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<meta charset="utf-8">
<link rel="stylesheet" href="../LogCSS/style.css">



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
                <main class="col overflow-auto h-100">
            <div class="bg-light border rounded-3 p-3">
                <h2>Main</h2>
                <?php

                    $hitung = mysqli_query($koneksi,"SELECT count(`ID_PENGAJUAN`) as id FROM `pengajuan_kegiatan` WHERE `STATUS` = 'Belum Diterima' ");
                    $arr = mysqli_fetch_array($hitung);



                    ?>
            <div class="row mb-2">
            <div class=" col-sm-6  text-center" >
                <a style ="text-decoration:none;" href="Approval_pengajuan.php">
                    <div class="serviceBox  border" style="height: 200px; padding:50px" >
                            <i style="font-size: 40px; padding-left:-100px" class="fa fa-rocket" style="width: 80px;"></i>
                            <h3 class="title">Pengajuan Kegiatan</h3>
                            <h3 class="title"><?php echo $arr['id']; ?></h3>
                    </div>
                    </a>
                </div>

                <div class=" col-sm-6  text-center" >
                <a style ="text-decoration:none;" href="Tracking-Pengajuan.php">
                    <div class="serviceBox border" style="height: 200px; padding:50px" >
                            <i style="font-size: 40px; padding-left:-100px" class="fa fa-rocket" style="width: 80px;"></i>
                            <h3 class="title">Kegiatan ORMAWA</h3>
                    </div>
                    </a>
                </div>
            </div>
             </div>
        </main>
        </div>
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

<!-- summon modal -->
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

</body>

</html>

</body>
</html>

<?php include 'Template/EditProfilePass.php' ?>