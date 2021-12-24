<!DOCTYPE html>
<html lang="en">
<?php

        include "SessionPengurus.php";

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">
            <div class="bg-light border rounded-3 p-3">
               
                
                            <?php
                                include "../WKIII/Struktur-WKIII.php";
                            ?>
                         
                       
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
    <!-- summon modal untuk allpage -->
   <?php include 'Template/modal.php' ?>

    <?php include '../template/footInc.php' ?>

</body>

</html>

<?php include 'Template/EditProfilePass.php' ?>

<?php 
$ido = $array['ID_ORMAWA'];
$qp = mysqli_query($koneksi,"SELECT ID_PENGAJUAN, NAMA_KEGIATAN, TGL_KEGIATAN FROM PENGAJUAN_KEGIATAN where ID_ORMAWA ='$ido'  ORDER BY TGL_KEGIATAN DESC LIMIT 1");
$dp = mysqli_fetch_row($qp);
$dnow=date_create(date("Y-m-d"));
$dcek=date_create($dp[2]);
$cek= $dcek < date_sub($dnow,date_interval_create_from_date_string("90 days"));
if ($cek) {
    $qpro = mysqli_query($koneksi,"SELECT ID_LPJ FROM proposal WHERE ID_PENGAJUAN = '$dp[0]'");
    $dpro = mysqli_fetch_row($qpro);
    if (!isset($dpro[0])) {
        ?>
        <script>
        Swal.fire({
            title: 'Apakah mau kumpul lpj ?',
            text: "LPJ dan Bukti Kegiatan terakhir belum dikumpul!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Kumpul LPJ'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='Administrasi.php';
            }
            })
        </script>
    <?php
    }
}
?>