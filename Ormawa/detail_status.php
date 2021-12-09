<!DOCTYPE html>
<html lang="en">
<?php

        include "SessionPengurus.php";
        include "../inc/koneksi.php";

        $id = $_GET['id'];
    
    
     

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
                                            <th>WKIII</th>
                                            <th>Pembina</th>
                                            <th>Kemahasiswaan</th>
                                            <th> Status</th>
                                            
                                        
                                        </tr>
                                    </thead>    

                                  


                                    <tbody>
                                    
                                                             <tr>
                                                                 
                                                                 <td>
                                                                    <?php
                                                                        $q = mysqli_query($koneksi," SELECT count(`id_Persetujuan`) as id FROM `persetujuan_wkiii` WHERE id_pengajuan = $id");
                                                                        $count_wk = mysqli_fetch_array($q);
                                                                        
                                                                        
                                                                        
                                                                        $query_cekapp = mysqli_query($koneksi," SELECT * FROM `persetujuan_wkiii` WHERE id_pengajuan = $id ");

                                                                        
                                                                        
                                                                        $arr  = mysqli_fetch_array($query_cekapp);

                                                                        if ($count_wk['id'] < 1) {
                                                                            echo "Menunggu";
                                                                            $count_wk = 3;

                                                                            
                                                                        }else{
                                                                            echo $arr['approval_status'];
                                                                            if($arr['approval_status']== "Approve"){
                                                                                $count_wk = 1;
                                                                            }elseif ($arr['approval_status']== "Tolak") {
                                                                                $count_wk = 0 ;
                                                                            }


                                                                        }

                                                                        
                                                                       
                                                                    ?>
                                                                 </td>

                                                                 <td>

                                                                 <?php
                                                                        $q = mysqli_query($koneksi," SELECT count(`id_Persetujuan`) as id FROM `persetujuan_pembina` WHERE id_pengajuan = $id ");
                                                                        
                                                                        $query_cekapp = mysqli_query($koneksi," SELECT * FROM `persetujuan_pembina` WHERE id_pengajuan = $id ");

                                                                        $count_p = mysqli_fetch_array($q);
                                                                   
                                                                        
                                                                        $arr  = mysqli_fetch_array($query_cekapp);

                                                                        if ($count_p['id'] < 1) {
                                                                            echo "Menunggu";
                                                                            $count_pm = 3 ;
                                                                        }else{
                                                                            echo $arr['approval_status'];
                                                                            if($arr['approval_status']== "Approve"){
                                                                                $count_pm = 1;
                                                                            }elseif ($arr['approval_status']== "Tolak") {
                                                                                $count_pm = 0 ;
                                                                            }


                                                                        }

                                                                       


                                                                    ?>

                                                                 </td>

                                                                 <td>
                                                                 <?php
                                                                        $q = mysqli_query($koneksi," SELECT count(`id_Persetujuan`) as id FROM `persetujuan_kemahasiswaan` WHERE id_pengajuan = $id ");
                                                                        
                                                                        $query_cekapp = mysqli_query($koneksi," SELECT * FROM `persetujuan_kemahasiswaan` WHERE id_pengajuan = $id ");

                                                                        $count_km = mysqli_fetch_array($q);
                                                                        
                                                                  
                                                                        $arr  = mysqli_fetch_array($query_cekapp);

                                                                        if ($count_km['id'] < 1) {
                                                                            echo "Menunggu";
                                                                            $count_km = 3;
                                                                        }else{
                                                                            echo $arr['approval_status'];
                                                                            if($arr['approval_status']== "Approve"){
                                                                                $count_km = 1;
                                                                            }elseif ($arr['approval_status']== "Tolak") {
                                                                                $count_km = 0 ;
                                                                            }


                                                                        }

                                                                 


                                                                        
                                                                    ?>

                                                                 </td>
                                                                 <td>

                                                                 <?php
                                                                
                                                                      
                                                                        $hasil = $count_wk + $count_pm + $count_km;

                                                                        // echo $hasil;
                                                                         
                                                                     if($hasil == 3 ){

                                                                        $q = mysqli_query($koneksi, "UPDATE `pengajuan_kegiatan` SET `STATUS`='Approve' Where `ID_PENGAJUAN` = $id ");
                                                                        echo "Approve";
                                                                        $ida = rand();
                                                                        mysqli_query($koneksi,"INSERT INTO proposal (ID_PROPOSAL,ID_PENGAJUAN) VALUES ('$ida','$id')");
                                                                        }
                                                                        elseif ($hasil >= 1 && $hasil < 3) {
                                                                            $q = mysqli_query($koneksi, "UPDATE `pengajuan_kegiatan` SET `STATUS`='Tolak' Where `ID_PENGAJUAN` = $id ");
                                                                            echo "DiTolak";
                                                                        }
                                                                       
                                                                    
                                                                       elseif ($hasil <= 9 && $hasil > 3) {
                                                                       $q = mysqli_query($koneksi, "UPDATE `pengajuan_kegiatan` SET `STATUS`='Belum Diterima' Where `ID_PENGAJUAN` = $id ");
                                                                        echo "Belum Diterima ";
                                                                      }


                                                                    ?>
                                                                 </td>
                                                                    
                                                                </tr>

                                               

                                    
                                       
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
