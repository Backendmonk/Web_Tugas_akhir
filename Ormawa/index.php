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
                    <div class="row">




                    <!-- Content Row -->
                    <div class="row">
                    
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <center> <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <?php

                    $coutn = mysqli_query($koneksi,"SELECT  COUNT(lpj.ID_LPJ) as lpj FROM `lpj` INNER JOIN `approval_lpj` on `lpj`.`ID_APPROVALLPJ` = `approval_lpj`.`ID_APPROVALLPJ` WHERE `approval_lpj`.`ORMAWA` = $array[ID_ORMAWA]");
                    $arr = mysqli_fetch_array($coutn);

                    ?>
                        Jumlah Acara</div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $arr['lpj']; ?></div></center>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <?php

                        $query = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM `status_lpj` WHERE `ORMAWA` = '$array[ID_ORMAWA]' AND `STATUS` = 'Belum Terkumpul' ");
                        
                        $arr = mysqli_fetch_array($query);
                    ?>
                    <center><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                     <a style="text-decoration:none; color:green;" href="lpj_belum.php">LPJ Belum Terkumpul</a> </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $arr['jumlah']; ?></div></center>
                </div>
               
            </div>
        </div>
    </div>
</div>


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <center><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Earnings (Annual)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div></center>
                </div>
               
            </div>
        </div>
    </div>
</div>


</div>

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
$qp = mysqli_query($koneksi,"SELECT id, nama_kegiatan, Tanggal FROM pengajuan_kegiatan_mhs where id_ormawa ='$ido'  ORDER BY Tanggal DESC LIMIT 1");
$dp = mysqli_fetch_row($qp);

$dnow=date_create(date("Y-m-d"));
$dcek=date_create($dp[2]);
$cek= $dcek < date_sub($dnow,date_interval_create_from_date_string("14 days"));
if ($cek) {
    $qpro = mysqli_query($koneksi,"SELECT id FROM pengajuan_lpj WHERE id_pengajuan = '$dp[0]'");
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
                window.location.href='pelaporan_kegiatan.php';
            }
            })
        </script>
    <?php
    }
}
?>