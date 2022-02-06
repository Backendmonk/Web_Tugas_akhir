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
                                            $qor = mysqli_query($koneksi,"SELECT * FROM ormawa where ID_ORMAWA = '$array[ID_ORMAWA]' ");
                                            $dor = mysqli_fetch_row($qor);
                                            $qakb = mysqli_query($koneksi,"SELECT id from approval_kegiatan where nama_ormawa = '$dor[2]' and status <> 'Approve' ");
                                            $dakb = mysqli_num_rows($qakb);
                                            $qapk = mysqli_query($koneksi,"SELECT id from approval_pernyataan_kegiatan where  nama_ormawa = '$dor[2]' and status <> 'Approve'");
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
                                                id_pengajuan from approval_kegiatan where status = 'Approve' and  nama_ormawa = '$dor[2]' ");
                                                while ($dak = mysqli_fetch_array($qak)) {
                                                    $idlpj = $dak[0];
                                                    $qlpj = mysqli_query($koneksi,"SELECT id_pengajuan from pengajuan_lpj where id_pengajuan = '$idlpj' ");
                                                    $cek = mysqli_fetch_row($qlpj);
                                                    if (empty($cek)) {
                                                        $total++;
                                                    }
                                                }
                                                $qak = mysqli_query($koneksi,"SELECT 
                                                id_pernyatan from approval_pernyataan_kegiatan where status = 'Approve' and  nama_ormawa = '$dor[2]'");
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
                                          $qp = mysqli_query($koneksi,"SELECT id, nama_kegiatan, Tanggal FROM pengajuan_kegiatan_mhs where id_ormawa = '$dor[0]'  ORDER BY Tanggal DESC ");
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
                                          
                                          $qspk = mysqli_query($koneksi, "SELECT id from surat_pernyataan_kegiatan where id_ormawa = '$dor[0]' ");
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
                                        $plpj = mysqli_query($koneksi, "SELECT id from pengajuan_lpj where id_ormawa = '$dor[0]'  ");
                                        while ($dplpj = mysqli_fetch_array($plpj)) {
                                            $qalp = mysqli_query($koneksi,"SELECT id, approve  from applpj where approve = true and idlpj = '$dplpj[id]' ");
                                            $dalp =  mysqli_fetch_row($qalp);
                                            if (!empty($dalp)) {
                                                $total++;
                                            }
                                        }
                                        $qapk = mysqli_query($koneksi, "SELECT id_pernyatan from approval_pernyataan_kegiatan where nama_ormawa = '$dor[2]' and status = 'Approve'");
                                        while ($dapk = mysqli_fetch_array($qapk)) {
                                        $idk = $dapk['id_pernyatan'];
                                        $pbk = mysqli_query($koneksi, "SELECT id from bukti_kegiatan_mahasiswa where id_kegiatan = '$idk' ");
                                        $dpbk = mysqli_fetch_array($pbk);
                                        if (isset($dpbk)) {
                                            $qalp = mysqli_query($koneksi,"SELECT id, approve  from appbk where approve = true and idbk = '$dpbk[id]' ");
                                            $dalp =  mysqli_fetch_row($qalp);
                                            if (!empty($dalp)) {
                                                $total++;
                                            }
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
                    
                    <h5>Kontak Kemahasiswaan Yang Bisa dihubungi</h5>
                    <span>Bu Asti: +62 831-1451-7429</span>
                    <span>Pak Andika: +62 896-8541-0790 </span>
                    <span>Email kemahasiswaan: kemahasiswaan@stiki-indonesia.ac.id</span>
                    <div class="row">
                   

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

     '<?php  echo "<table class=table> <tr><td> Pengumuman </td>   </tr> </table>"; while($data = mysqli_fetch_array($qpengumuman)){echo "<table class=table> <tr><td><textarea readonly class=form-control row = 3> $data[pengumuman]</textarea></td></tr>  </table> ";} ?>',
  'info'
)
    </script>
