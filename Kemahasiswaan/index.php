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
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                      
                    </div>

           <!-- Content Row -->
           <div class="row">
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                    <a href="kegiatanDiajukan.php">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <center> <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php
                                        error_reporting(0);
                                            $qakb = mysqli_query($koneksi,"SELECT id from approval_kegiatan where status <> 'Approve'");
                                           $dakb = mysqli_num_rows($qakb);
                                            $qapk = mysqli_query($koneksi,"SELECT id from approval_pernyataan_kegiatan where status <> 'Approve'");
                                           $dapk = mysqli_num_rows($qapk);
                                           $total =  $dakb + $dapk;
                                        ?>
                                            Kegiatan yang Sedang Diajukan</div>
                                     <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total  ?></div></center>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                   
                  
                    
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                    <a href="kegiatanDisetujui.php">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <center><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Kegiatan yang Sudah Disetujui</div>
                                            <?php 
                                            error_reporting(0);
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
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                    <a href="PelaporanBelumTerkumpul.php">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <center> <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php
                                        error_reporting(0);
                                          $ngaret = 0;
                                          $qp = mysqli_query($koneksi,"SELECT id, nama_kegiatan, Tanggal FROM pengajuan_kegiatan_mhs  ORDER BY Tanggal DESC ");
                                          while ($dp = mysqli_fetch_array($qp)) {
                                              $dnow=date_create(date("Y-m-d"));
                                              $dcek=date_create($dp[2]);
                                              $cek= $dcek < date_sub($dnow,date_interval_create_from_date_string("0 days"));
                                              if ($cek) {
                                                  $ak = mysqli_query($koneksi,"SELECT id_pengajuan  FROM approval_kegiatan WHERE status = 'Approve' AND id_pengajuan = '$dp[0]'  ");
                                                  $dak = mysqli_fetch_row($ak);
                                                  if (isset($dak)) {
                                                      $qpro = mysqli_query($koneksi,"SELECT id FROM pengajuan_lpj WHERE id_pengajuan = '$dak[0]'");
                                                      $dpro = mysqli_fetch_row($qpro);
                                                      if (empty($dpro) ) {
                                                      $ngaret++;
                                                        }else {
                                                            $idlpj = $dpro[0];
                                                            $qalpj = mysqli_query($koneksi, "SELECT approve FROM applpj WHERE idlpj = '$idlpj'");
                                                            $dalpj = mysqli_fetch_row($qalpj);
                                                            if (empty($dalpj) || $dalpj[0] != true ) {
                                                                $ngaret++;
                                                            }
                                                        }

                                                  }
                                                  
                                              }
                                          }
                                          
                                          $qspk = mysqli_query($koneksi, "SELECT id from surat_pernyataan_kegiatan");
                                          while ($dspk = mysqli_fetch_array($qspk)) {
                                              $idspk = $dspk[0];
                                              $qapk = mysqli_query($koneksi, "SELECT id from approval_pernyataan_kegiatan where status = 'Approve' and id_pernyatan = '$idspk' ");
                                              $dapk = mysqli_fetch_row($qapk);
                                              if (!empty($dapk)) {
                                                $qbk = mysqli_query($koneksi, "SELECT id from bukti_kegiatan_mahasiswa where id_kegiatan = '$idspk' ");
                                                $dbk = mysqli_fetch_row($qbk);
                                                
                                                if (!isset($dbk)) {
                                                    $ngaret++;
                                                }else {
                                                    $qabk = mysqli_query($koneksi, "SELECT id, approve from appbk where idbk = '$dbk[0]' ");
                                                    $dabk = mysqli_fetch_row($qabk);
                                                    if (isset($dabk) && $dabk[1] != true) {
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
                        </a>
                    </div>

                      <!-- Earnings (Monthly) Card Example -->
                      <div class="col-xl-3 col-md-6 mb-4">
                      <a href="kegiatanSelesai.php">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <?php
                                        error_reporting(0);
                                        $total = 0;
                                        $plpj = mysqli_query($koneksi, "SELECT id from pengajuan_lpj  ");
                                        while ($dplpj = mysqli_fetch_array($plpj)) {
                                            $qalp = mysqli_query($koneksi,"SELECT id, approve  from applpj where approve = true and idlpj = '$dplpj[id]' ");
                                            $dalp =  mysqli_fetch_row($qalp);
                                            if (!empty($dalp)) {
                                                $total++;
                                            }
                                        }

                                        $pbk = mysqli_query($koneksi, "SELECT id from bukti_kegiatan_mahasiswa  ");
                                        while ($dpbk = mysqli_fetch_array($pbk)) {
                                            $qalp = mysqli_query($koneksi,"SELECT id, approve  from appbk where approve = true and idbk = '$dpbk[id]' ");
                                            $dalp =  mysqli_fetch_row($qalp);
                                            if (!empty($dalp)) {
                                                $total++;
                                            }
                                        }
                                           
                                            
                                        ?>
                                        <center><div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                         Kegiatan yang Sudah Selesai </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=  $total ?></div></center>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                                    </a>
                    </div>
                    
                   

                    </div>

                  
        </main>
                    </div>

                    <!-- Content Row -->


            
                    </div>

        
                <!-- /.container-fluid -->
                
                <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Tempat Kegiatan</th>
                                            <th>Peyelenggara</th>
                                            <th>Absensi</th>
                                            <th>Berita Kegiatan</th>
                                            <th> LPJ </th>                                      
                                        </tr>
                                        
                                    </thead>
                                    
                                    
                                    <tbody>
                                  
                                        <?php
                                                $q = mysqli_query($koneksi,"SELECT * FROM `applpj` inner join pengajuan_lpj on   applpj.idlpj = pengajuan_lpj.id  inner JOIN pengajuan_kegiatan_mhs  on pengajuan_lpj.id_pengajuan = pengajuan_kegiatan_mhs.id inner join approval_kegiatan on approval_kegiatan.id_pengajuan = pengajuan_kegiatan_mhs.id WHERE applpj.approve = 1 ");
                                         

                                                while ($data = mysqli_fetch_array($q)) {
                                                    ?>
                                                             <tr>
                                                                    <td><?php echo $data['kegiatan'];?></td>

                                                                    <td><?php echo $data['Tanggal'];?></td>

                                                                    <td><?php echo $data['Tempat'];?></td>


                                                                    <td><?php echo $data['nama_ormawa'];?></td>

                                                                    <td><?php $cek = mysqli_num_rows($q);
                                                                            if (!$cek < 1) {
                                                                                Echo "Ada";
                                                                            }
                                                                            else{
                                                                                echo "Tidak";
                                                                            }
                                                                    
                                                                    
                                                                    ?></td>
                                                                    <td><?php $cek = mysqli_num_rows($q);
                                                                            if (!$cek < 1) {
                                                                                Echo "Ada";
                                                                            }
                                                                            else{
                                                                                echo "Tidak";
                                                                            }
                                                                    
                                                                    
                                                                    ?></td>
                                                                    <td><?php 
                                                                        if($data['approve']== 1){
                                                                            $approve = "approve";
                                                                        }elseif($data['approve']==0){
                                                                            $approve = "Tolak";
                                                                        }else{
                                                                            $approve = "Menunggu";
                                                                        }
                                                                    echo $approve;?></td>

                                                                  
                                                                    
                                                                   
                                                                </tr>

                                                <?php
                                                }

                                        ?>
                                       
                                       
                                    </tbody>
                                </table>
                              

                                <p><a href="genratepdf.php" target="_blank">Cetak Laporan</a></p>
                            </div>
                        </div>
                    </div>

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
 
<?php include 'Template/EditProfilePass.php' ?>

