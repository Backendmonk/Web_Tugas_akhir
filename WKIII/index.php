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
                                                $qak = mysqli_query($koneksi,"SELECT id from approval_kegiatan where status = 'Approve'  ");
                                                $dak = mysqli_num_rows($qak);
                                                
                                            ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dak ?></div></center>
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

