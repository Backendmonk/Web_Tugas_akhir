<!DOCTYPE html>
<html lang="en">
<?php

        include "SessionPengurus.php";
        include "../inc/koneksi.php";
    

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
                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Pengajuan</th>
                                            <th>STATUS</th>
                                            
                                        
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                                $q = mysqli_query($koneksi,"SELECT * FROM `pengajuan_kegiatan` ");
                                            

                                                while ($data = mysqli_fetch_array($q)) {
                                                    ?>
                                                             <tr>
                                                                    <td><?php echo $data['NAMA_KEGIATAN'];?></td>
                                                                    <td> <button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "detail_status.php?id= <?php echo $data['ID_PENGAJUAN']?>">Cek Status</a></button> </td>
                                                                   
                                                                </tr>

                                                <?php
                                                }

                                        ?>
                                    
                                       
                                    </tbody>
                                </table>
                            </div>

                            

                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">

        
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
