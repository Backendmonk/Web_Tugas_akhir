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
                            <?php

            $dataormawa = mysqli_query($koneksi,"SELECT ormawa.NAMA_ORMAWA as ormawa FROM `pengurus_ormawa` INNER JOIN `ormawa` ON pengurus_ormawa.ID_ORMAWA = ormawa.ID_ORMAWA WHERE pengurus_ormawa.USERNAME_KETUA = '$array[USERNAME_KETUA]' ");
            $arr = mysqli_fetch_array($dataormawa);

            ?>
                    <!-- Page Heading -->
                    <div class=" text-center  mb-4">
                        <h3 <span class="text-danger">STRUKTUR ORGANISASI</span> <span class=" text-gray-500"> ORMAWA <?php echo $arr['ormawa']; ?></span> </h3>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <main class="col overflow-auto h-100">
                            <div class="row text-center mb-5">
                                <div class="col">
                                    <img class="border border-3 rounded-circle" src="../img/LogoStiki.png" alt="" width="150px">
                                    <br>
                                    <SPAn><?php echo $array['NAMA_KETUA']; ?></SPAn>
                                </div>
                            </div>
                            <div class="row text-center mb-5 mx-5">
                                <div class="col">
                                    <img class="border border-3 rounded-circle" src="../img/LogoStiki.png" alt=""  width="150px">
                                    <br>
                                    <SPAn><?php echo $array['NAMA_WAKIL']; ?></SPAn>
                                </div>
                                <div class="col">
                                    <img class="border border-3 rounded-circle" src="../img/LogoStiki.png" alt=""  width="150px">
                                    <br>
                                    <SPAn><?php echo $array['NAMA_WAKIL2']; ?></SPAn>
                                </div>
                            </div>
                            <div class="row text-center mb-5 px-5">
                            <div class="col">
                                    <img class="border border-3 rounded-circle" src="../img/LogoStiki.png" alt=""  width="150px">
                                    <br>
                                    <SPAn><?php echo $array['SEKRETARIS1']; ?></SPAn>
                                </div>
                                <div class="col">
                                    <img class="border border-3 rounded-circle" src="../img/LogoStiki.png" alt=""  width="150px">
                                    <br>
                                    <SPAn><?php echo $array['SEKRETARIS2']; ?></SPAn>
                                </div>
                                <div class="col">
                                    <img class="border border-3 rounded-circle" src="../img/LogoStiki.png" alt=""  width="150px">
                                    <br>
                                    <SPAn><?php echo $array['BENDAHARA1']; ?></SPAn>
                                </div> <div class="col">
                                    <img class="border border-3 rounded-circle" src="../img/LogoStiki.png" alt=""  width="150px">
                                    <br>
                                    <SPAn><?php echo $array['BENDAHARA2']; ?></SPAn>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10"></div>
                                <a class="btn btn-primary col-2" href="TambahStrukturOrmawa.php" role="button">Edit</a>
                                
                                
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