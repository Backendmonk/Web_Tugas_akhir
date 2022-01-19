<!DOCTYPE html>
<html lang="en">
<head>
    <?php

        include "SessionKemahasiswaan.php";
        $id = $_GET['id'];

        $q = mysqli_query($koneksi,"SELECT * FROM `pengajuan_lpj` where `id` = $id ");

        $arr = mysqli_fetch_array($q);


        $cekkemahasiswaan = mysqli_query($koneksi,"SELECT * FROM `kemahasiswaan` WHERE `NIDN_KEMAHASISWAAN` = $array[NIDN_KEMAHASISWAAN]");

        $arr_km = mysqli_fetch_array($cekkemahasiswaan);

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
                            <center><h1>DETAIL LPJ</h1></center>


                           
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
                                    <th>Pendahuluan</th>
                                    <td>:</td>
                                    <td><textarea readonly class="form-control" rows="4" cols="50"> <?php echo $arr['pendahuluan'];?></textarea></td>
                                </tr>

                                
                                <tr>
                                    <th>Pencapaian</th>
                                    <td>:</td>
                                    <td><textarea readonly class="form-control" rows="4" cols="50"> <?php echo $arr['pencapaian'];?></textarea></td>
                                </tr>

                                <tr>
                                    <th>Penutup</th>
                                    <td>:</td>
                                    <td><textarea readonly class="form-control" rows="4" cols="50"> <?php echo $arr['penutup'];?></textarea></td>
                                </tr>

                                <tr>
                                    <th>Pelaksanaan Kegiatan</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['pelaksanaan_kegaitan'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>
                                </tr>

                                <tr>
                                    <th>Kepanitiaan</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['kepanitiaan'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>
                                </tr>

                                <tr>
                                    <th>Peserta</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['peserta'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>
                                </tr>
                                <tr>

                                    <th>RAB Pemasukan</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['rab_masukan'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>
                                </tr>

                                <tr>
                                    <th>RAB Pengeluaran</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['rab_pengeluaran'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                
                                <tr>
                                    <th>Realisasi Anggaran</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['realisasi_anggaran'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                <tr>
                                    <th>Bukti Pembayarant</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['bukti_pembayaran'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>
                                </tr>

                                <tr>
                                    <th>Berita Acara</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['berita_acara'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                
                                <tr>
                                    <th>Absensi</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['absensi'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                <tr>
                                    <th>Notulensi Rapat/Seminar</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['rapat'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>


                                <tr>
                                    <th>Rekap Penilaian Peserta</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['nilai_peserta'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                <tr>
                                    <th>Desain Sertifikat</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['desain_sertifikat'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                <tr>
                                    <th>Dokumentasi Kegiatan</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/f_lpj/".$arr['dokumentasi'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>

                                <tr>
                                    <th>Softcopy LPJ</th>
                                    <td>:</td>
                                    <td><button type="button" class="btn btn-primary"> <a style="text-decoration:none; Color:white;" href="<?php echo "../Ormawa/lpj/".$arr['LPJ'] ?>"> <i class = "fa fa-download"></i> </a> </button></td>

                                </tr>


                             
                        


                           <tr>
                               <td>
                                   <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                                data-target="#ApLpj<?= trim($arr['id']) ?>">Approve</button>
                                                <button type="button" class="btn btn-danger mb-2" data-toggle="modal"
                                                data-target="#UnLpj<?= trim($arr['id']) ?>">Unaprove</button>
                                            </td>
                               
                            </tr>

                        


                            
                  
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

     <!--Upload Approve LPJ Modal -->
     <div class="modal fade" id="ApLpj<?= trim($arr['id']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Approve LPJ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/appLPJ.php" method="post" >
                        <input type="text" name="kema" value="<?= $array["NIDN_KEMAHASISWAAN"] ?>" hidden>
                        <input type="text" name="idp" value="<?= trim($arr['id']) ?>" hidden>
                        Apakah sudah yakin di approve?
                        <p style="font-size:10px;">Catatan Optional</p>
                           <textarea class="form-control" name="komentar" rows="4" cols="50"> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="ApLpj" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!--Unapproved lPJ Modal -->
     <div class="modal fade" id="UnLpj<?= trim($arr['id']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Unprove lpj</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/appLPJ.php" method="post" >
                        <input type="text" name="kema" value="<?= $array["NIDN_KEMAHASISWAAN"] ?>" hidden>
                        <input type="text" name="idp" value="<?= trim($arr['id']) ?>" hidden>
                        Apakah sudah yakin di Unapproved?
                        <p style="font-size:10px;">Catatan Optional</p>
                           <textarea class="form-control" name="komentar" rows="4" cols="50"> </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="UnLpj" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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




            if(isset($_POST['fapprove'])){

                $komentar = $_POST['komentar'];
                $nidn = $arr_km['NIDN_KEMAHASISWAAN'];
                $nama_km = $arr_km['NAMA_KEMAHASISWAAN'];
                $status = "Approve";

                $update = mysqli_query($koneksi,"UPDATE `approval_kegiatan` SET `id_kemahasiswaan`='$nidn',`nama_kemahasiswaan`='$nama_km',`catatan`='$komentar',`status`='$status' WHERE `id_pengajuan` = $id");
                    ?>
                    <script>
									Swal.fire({
									icon: 'success',
									title: 'Berhasil',
									text: 'Pengajuan Berhasil',
									
									})
									</script>
				<?php
              

            }
?>


