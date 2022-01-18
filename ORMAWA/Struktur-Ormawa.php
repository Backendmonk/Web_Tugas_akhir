<?php

        include "SessionPengurus.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Struktur Ormawa</title>

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
                    <!-- Content Row -->
                    <div class="row">
                        <main class="col overflow-auto h-100">
                            
                            <div class="row">

                            <?php 
                                $ido = $array['ID_ORMAWA'];
                                $qo = mysqli_query($koneksi,"SELECT NAMA_ORMAWA FROM ormawa where ID_ORMAWA = '$ido'");
                                $do = mysqli_fetch_row($qo);
                            ?>
                                
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                             <!-- Page Heading -->
                    <div class=" text-center  mb-4">
                        <h3 <span class="text-danger">STRUKTUR ORGANISASI</span> <span class=" text-gray-500"> ORMAWA <?php echo $do[0] ?></span> </h3>
                       <?php 
                            $idOR = $array['ID_ORMAWA'];
                            $idkema = mysqli_query($koneksi,"SELECT NIDN from ormawa where ID_ORMAWA = $idOR");
                            $didk = mysqli_fetch_row($idkema);
                            $idk = $didk[0];
                            $qnabim = mysqli_query($koneksi, "SELECT NAMA_PEMBINA FROM pembina where NIDN = '$idk'");
                            $dnambem = mysqli_fetch_row($qnabim);
                       ?>
                    </div>
                    <a class="btn btn-primary col-2" href="TambahStrukturOrmawa.php" role="button">Edit</a>
                    <a class="btn btn-primary col-2" href="f_renja/<?= $array['RENJA'] ?>" role="button">Renja</a>
                    <a class="btn btn-primary col-2" href="f_ad_art/<?= $array['AD_ART'] ?>" role="button">AD ART</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jabatan</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td>Dosen Pembina</td>
                                            <td><?=  $dnambem[0] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA KETUA</td>
                                            <td><?=  $array['NAMA_KETUA'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA WAKIL</td>
                                            <td><?=  $array['NAMA_WAKIL'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA WAKIL 2</td>
                                            <td><?=  $array['NAMA_WAKIL2'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>SEKRETARIS 1</td>
                                            <td><?=  $array['SEKRETARIS1'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>SEKRETARIS 2</td>
                                            <td><?=  $array['SEKRETARIS2'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>BENDAHARA 1</td>
                                            <td><?=  $array['BENDAHARA1'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>BENDAHARA 2</td>
                                            <td><?=  $array['BENDAHARA2'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
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