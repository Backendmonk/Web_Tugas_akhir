<!DOCTYPE html>
<html lang="en">
<?php

        include "SessionKemahasiswaan.php";

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

           <!-- Content Row -->
           <div class="row">
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <center> <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php
                                            $qakb = mysqli_query($koneksi,"SELECT id from approval_kegiatan where status <> 'Approve'");
                                           $dakb = mysqli_num_rows($qakb);
                                        ?>
                                            Kegiatan yang Sedang Diajukan</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $dakb  ?></div></center>
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
                                        Kegiatan yang Sudah Disetujui</div>
                                            <?php 
                                                $total = 0;
                                                $qak = mysqli_query($koneksi,"SELECT 
                                                id_pengajuan from approval_kegiatan where status = 'Approve' ");
                                                while ($dak = mysqli_fetch_array($qak)) {
                                                    $idlpj = $dak[0];
                                                    $qlpj = mysqli_query($koneksi,"SELECT id_pengajuan from pengajuan_lpj where id_pengajuan = '$idlpj' ");
                                                    $cek = mysqli_fetch_row($qlpj);
                                                    if (empty($cek)) {
                                                        $total++;
                                                    }
                                                }
                                                $qak = mysqli_query($koneksi,"SELECT 
                                                id_pernyatan from approval_pernyataan_kegiatan where status = 'Approve' ");
                                                while ($dap = mysqli_fetch_array($qak)) {
                                                    $idbk = $dap[0];
                                                    $qbk = mysqli_query($koneksi,"SELECT id_kegiatan from bukti_kegiatan_mahasiswa where id_kegiatan = '$idbk' ");
                                                    $cek = mysqli_fetch_row($qbk);
                                                    if (empty($cek)) {
                                                        $total++;
                                                    }
                                                }
                                            ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total ?></div></center>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <center> <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php
                                          
                                          $qp = mysqli_query($koneksi,"SELECT id, nama_kegiatan, Tanggal FROM pengajuan_kegiatan_mhs  ORDER BY Tanggal DESC ")
                                          ;
                                          $ngaret = 0;
                                          while ($dp = mysqli_fetch_array($qp)) {
                                              $dnow=date_create(date("Y-m-d"));
                                              $dcek=date_create($dp[2]);
                                              $cek= $dcek < date_sub($dnow,date_interval_create_from_date_string("14 days"));
                                              if ($cek) {
                                                  $ak = mysqli_query($koneksi,"SELECT id_pengajuan  FROM approval_kegiatan WHERE status = 'Approve' AND id_pengajuan = '$dp[0]'  ");
                                                  $dak = mysqli_fetch_row($ak);
                                                  if (isset($dak)) {
                                                      $qpro = mysqli_query($koneksi,"SELECT id FROM pengajuan_lpj WHERE id_pengajuan = '$dak[0]'");
                                                      $dpro = mysqli_fetch_row($qpro);
                                                      if (!isset($dpro)) {
                                                      $ngaret++;
                                                  }
                                                  }
                                                  
                                              }
                                          }
                                          
                                        ?>
                                            Pelaporan yang Belum Terkumpul</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  $ngaret ?></div></center>
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
                                        
                                        $total = 0;
                                        $plpj = mysqli_query($koneksi, "SELECT id from pengajuan_lpj  ");
                                        while ($dplpj = mysqli_fetch_array($plpj)) {
                                            $qalp = mysqli_query($koneksi,"SELECT id, approve  from applpj where approve = 1 and idlpj = '$dplpj[id]' ");
                                            $dalp =  mysqli_fetch_row($qalp);
                                            if (isset($dalp)) {
                                                $total++;
                                            }
                                        }
                                           
                                            
                                        ?>
                                        <center><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                         <a style="text-decoration:none; color:green;" href="lpj_belum.php">Kegiatan yang Sudah Selesai</a> </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ngaret ?></div></center>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   

                    </div>

                  
        </main>
                    </div>

                    <!-- Content Row -->


            
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

    <!-- Summon Modal-->
   <?php include 'Template/modal.php' ?>

    <?php include '../template/footInc.php' ?>

</body>

</html>
<?php include 'Template/EditProfilePass.php' ?>

