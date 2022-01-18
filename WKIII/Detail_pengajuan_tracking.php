<!DOCTYPE html>
<html lang="en">
<head>
    <?php

        include "SessionWKIII.php";
        $id = $_GET['id'];

        error_reporting(0);
        $q = mysqli_query($koneksi,"SELECT * FROM `pengajuan_kegiatan_mhs` where `id` = $id ");

        $arr = mysqli_fetch_array($q);


        
?>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

<?php include '../template/head.php' ?>
 <!-- Custom styles for this template -->
 <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
               
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <main class="col overflow-auto h-100">
          
                
            </div>
        </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <center><h1>DETAIL KEGIATAN</h1></center>


                           
                            <form method="post" class="row g-3" >
                           <table class="table">

                                <tr>
                                    <th>Nama Kegiatan</th>
                                    <td>:</td>
                                    <td><?php echo $arr['nama_kegiatan'];?></td>
                                </tr>
                                <tr>
                                    <th>Nama Ormawa</th>
                                    <td>:</td>
                                    <td><?php echo $arr['nama_ormawa'];?></td>
                                </tr>
                                <tr>
                                    <th>Tema Kegiatan</th>
                                    <td>:</td>
                                    <td><?php echo $arr['tema_kegiatan'];?></td>
                                </tr>

                                <tr>
                                    <th>Konsep Kegiatan</th>
                                    <td>:</td>
                                    <td><textarea class="form-control" rows="4" cols="50"> <?php echo $arr['konsep_kegiatan'];?></textarea></td>
                                </tr>

                                
                                <tr>
                                    <th>SUB Kegiatan</th>
                                    <td>:</td>
                                    <td><textarea class="form-control" rows="4" cols="50"> <?php echo $arr['sub_kegiatan'];?></textarea></td>
                                </tr>

                                <tr>
                                    <th>PJ Kegiatan</th>
                                    <td>:</td>
                                    <td><textarea class="form-control" rows="4" cols="50"> <?php echo $arr['pj_kegiatan'];?></textarea></td>
                                </tr>

                                <tr>
                                    <th>latar Belakang</th>
                                    <td>:</td>
                                    <td><textarea class="form-control" rows="4" cols="50"> <?php echo $arr['latar_belakang'];?></textarea></td>
                                </tr>

                                <tr>
                                    <th>Tujuan Kegiatan</th>
                                    <td>:</td>
                                    <td><textarea class="form-control" rows="4" cols="50"> <?php echo $arr['tujuan_kegiatan'];?></textarea></td>
                                </tr>

                                <tr>
                                    <th>Hasil Dan Harapan</th>
                                    <td>:</td>
                                    <td><textarea class="form-control" rows="4" cols="50"> <?php echo $arr['hasil_harapan'];?></textarea></td>
                                </tr>
                                <tr>

                                    <th>Target Pemasaran</th>
                                    <td>:</td>
                                    <td><textarea class="form-control" rows="4" cols="50"> <?php echo $arr['targer_pemasaran'];?></textarea></td>
                                </tr>

                                <tr>
                                    <th>Tanggal</th>
                                    <td>:</td>
                                    <td><?php echo $arr['Tanggal']; ?></td>

                                </tr>

                                
                                <tr>
                                    <th>Waktu</th>
                                    <td>:</td>
                                    <td><?php echo $arr['Waktu']; ?></td>

                                </tr>

                                <tr>
                                    <th>Tempat</th>
                                    <td>:</td>
                                    <td><?php echo $arr['Tempat']; ?></td>

                                </tr>

                                <tr>
                                    <th>Sk Kepanitiaan</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/k_SK_kegiatan/".$arr['sk_kepanitiaan'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                
                                <tr>
                                    <th>Jadwal</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/k_jadwal/".$arr['jadwal_kegiatan'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                <tr>
                                    <th>RAB</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/k_jadwal/".$arr['jadwal_kegiatan'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>


                                <tr>
                                    <th>Profile Pengisi Acara</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/k_profile/".$arr['profile_pengisi_acara'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                <tr>
                                    <th>Desain Poster</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/k_poster/".$arr['desain_poster_sertifikat'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>


                                
                                <tr>
                                    <th>Ketua Panitia</th>
                                    <td>:</td>
                                    <td><?php echo $arr['ketua_panitia']; ?></td>

                                </tr>

                                <tr>
                                    <th>Contac</th>
                                    <td>:</td>
                                    <td><?php echo $arr['contac_person']; ?></td>

                                </tr>

                                
                                <tr>
                                    <th>Proposal</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/k_proposal/".$arr['softcopy_proposal'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>
                                <?php 
                                    $idlpj = $arr['id'];
                                    $sql = "SELECT * from approval_kegiatan where 
                                    id_pengajuan = '$idlpj'";
                                    $qcek = mysqli_query($koneksi, $sql);
                                    $cek = mysqli_fetch_row($qcek);
                                    if ($cek[7]=='Tolak') {?>
                           <tr>
                               <td>
                               <button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href= "editPengajuan.php?id= <?php echo  $idlpj?>">Revisi</a></button>
                                            </td>
                            </tr>
                            <?php }?>








                         

                        


                            
                  
                           </table>
                           
                           </form>


                        </div>
                        
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
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

    <!-- summon Modal-->
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

</body>





</html>


<?php
require 'Template/EditProfilePass.php';

?>


