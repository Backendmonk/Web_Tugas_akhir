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

    <title>Dashboard</title>

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

                        $qalp = mysqli_query($koneksi,"SELECT id from applpj where approve = 1 ");
                        $dalp = mysqli_num_rows($qalp);

                    ?>
                        Jumlah Acara</div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  $dalp ?></div></center>
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
                        $qor = mysqli_query($koneksi,"SELECT * FROM ormawa where NIDN = '$array[NIDN]' ");
                        $dor = mysqli_fetch_row($qor);
                        $query = mysqli_query($koneksi,"SELECT  * FROM  pengajuan_kegiatan_mhs WHERE id_ormawa = '$dor[0]'"); 
                        $dpkm = mysqli_num_rows($query);
                        $queryl = mysqli_query($koneksi,"SELECT  * FROM  pengajuan_lpj WHERE id_ormawa = '$array[ID_ORMAWA]'"); 
                        $dlpj = mysqli_num_rows($queryl);

                        $total =   $dpkm - $dlpj;
                    ?>
                    <center><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                     <a style="text-decoration:none; color:green;" href="lpj_belum.php">LPJ Belum Terkumpul</a> </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$total ?></div></center>
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
                        Acara sedang berlangsung</div>
                        <?php 
                        $namaOr = $array['ID_ORMAWA'];
                            $qak = mysqli_query($koneksi,"SELECT id from approval_kegiatan where status = 'Approve' AND nama_ormawa = '$namaOr' ");
                            $dak = mysqli_num_rows($qak);
                            $total = $dak - $dlpj
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total ?></div></center>
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




<!-- pengumuman -->
<script>

Swal.fire(
  'Pengumuman',

        <?php

        $qpengumuman = mysqli_query($koneksi,"SELECT * FROM `pengumuman`");
        
        ?>

     '<?php  echo "<table class=table> <tr><td> Pengumuman </td>   <td> Tanggal </td> </tr> </table>"; while($data = mysqli_fetch_array($qpengumuman)){echo "<table class=table> <tr><td><textarea class=form-control row = 3> $data[pengumuman]</textarea></td><td> $data[tgl]</td></tr>  </table> ";} ?>',
  'info'
)
    </script>
