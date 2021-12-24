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

    <title>Administrasi</title>

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
                            <?php 
                            $idOr= $array['ID_ORMAWA'];
                            $qK = mysqli_query($koneksi,"SELECT   NAMA_KEGIATAN, ID_PENGAJUAN, STATUS FROM pengajuan_kegiatan WHERE STATUS = 'Approve' and ID_ORMAWA = '$idOr' ");
                            
                            $jumlah = mysqli_num_rows($qK);
                            
                            if ($jumlah > 0) {
                                ?>
                                <table class="table table-bordered">
                        <h3>Pengajuan Proposal</h3>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Approval Kemahasiswaan</th>
                                <th scope="col">Approval WKIII</th>
                                <th scope="col">Action</th>
                                <th scope="col">Revisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            error_reporting(0);
                                while($ds = mysqli_fetch_assoc($qK)){
                                $idp = $ds['ID_PENGAJUAN'];
                                $qPro = mysqli_query($koneksi, "SELECT * FROM proposal WHERE ID_PENGAJUAN = '$idp'");
                                $jmlPro = mysqli_num_rows($qPro);
                                if ($jmlPro > 0 ) {
                                    $no = 0;
                                    while($dataPro = mysqli_fetch_array($qPro))
                                    {
                                        $idAp =  $dataPro["ID_APPROVAL"];
                                        $dataApPro = mysqli_query($koneksi, "SELECT * FROM approval_proposal WHERE ID_APPROVAL = '$idAp'");
                                        $data =  mysqli_fetch_row($dataApPro);
                                        
                                        ?>
                                        <tr>
                                        <?php if (isset($data) && $data[4] != 'Approve') { 
                                            $no++; ?>
                                            <th scope="row"><?= $no ?></th>
                                            <td><?= $ds["NAMA_KEGIATAN"] ?></td>
                                            <?php if ( $data[3]=='Approve') {
                                                ?>  <td>Approve</td>  <?php
                                            } elseif($data[3]=='Unapproved'){
                                                ?>  <td>Unapproved</td>  <?php
                                            }elseif(!empty($data[0])){
                                                ?>  <td>Menunggu  Diperiksa</td>  <?php
                                            }else{
                                                ?>  <td>Menunggu proposal</td>  <?php
                                            }
                                              ?>
                                            <?php if ( $data[4]=='Approve') {
                                                ?>  <td>Approve</td>  <?php
                                               
                                            } elseif($data[3]=='Approve'){
                                                ?>  <td>Menunggu Diperiksa</td>  <?php
                                            }else{
                                                ?>  <td>Menunggu proposal</td>  <?php
                                            }
                                              ?>
                                            <td> <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                            data-target="#Upload<?=trim($idp ) ?>">Upload Proposal</button></td>
                                            <?php if($data[3]=='Unapprove' || $data[4]=='Unapprove' ){ ?>
                                            <td> <button type="button" class="btn btn-danger mb-2" ><a style="text-decoration:none; Color:white;" href="<?php echo "f_revisi/".$data[6] ?>"> <i class = "fa fa-download"></i> </a></button></td>
                                            <?php } else{  ?>
                                                <td> <button type="button" class="btn btn-secondary mb-2" ><a style="text-decoration:none; Color:white;" > <i class = "fa fa-download"></i> </a></button></td>
                                            <?php } ?>
                                       <?php } ?>
                                        </tr>
                                        <?php
                                    }
                                  
                                } else {
                                   
                                    ?>
                                    <tr>
                                   
                                        <th scope="row">2</th>
                                        <td><?= $ds["NAMA_KEGIATAN"] ?></td>
                                        <td>Menunggu Proposal</td>
                                        <td>Menunggu Proposal</td>
                                        <td> <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                        data-target="#Upload<?=trim($idp ) ?>">Upload Proposal</button>
                                        </td>
                                        <td><button type="button" class="btn btn-danger mb-2" >Download Revisi</button></td>
                                    </tr>
                                    <?php
                                
                            }
                                ?>
                            <?php }?>
                        </tbody>
                    </table>
                        <table class="table table-bordered">
                        <h3>Pengajuan Bukti Kegiatan dan LPJ</h3>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Approval Kemahasiswaan</th>
                                <th scope="col">Approval WKIII</th>
                                <th scope="col">Action</th>
                                <th scope="col">Revisi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                $idOr= $array['ID_ORMAWA'];
                                $qK = mysqli_query($koneksi,"SELECT   NAMA_KEGIATAN, ID_PENGAJUAN, STATUS FROM pengajuan_kegiatan WHERE STATUS = 'Approve' and ID_ORMAWA = '$idOr' ");
                                
                                $jumlah = mysqli_num_rows($qK);
                                if ($jumlah > 0 ){
                                $n=1;
                                while($Ak =  mysqli_fetch_array($qK)){
                                        $idAk= $Ak['ID_PENGAJUAN'];
                                        $nmAk= $Ak['NAMA_KEGIATAN'];
                                        $pro = mysqli_query($koneksi,"SELECT ID_APPROVAL, ID_LPJ FROM proposal where ID_PENGAJUAN = '$idAk'");
                                        $pror = mysqli_fetch_row($pro);
                                        
                                        $ApPro = mysqli_query($koneksi,"SELECT APPROVAL_PROPOSAL_KEMAHASISWAAN , APPROVAL_PROPOSAL_WKIII FROM approval_proposal where ID_APPROVAL = '$pror[0]'");
                                        $cek= mysqli_fetch_row($ApPro);
                                        if ($cek[0]=='Approve' && $cek[1]=='Approve') {
                                        $qlpj = mysqli_query($koneksi,"SELECT * from approval_lpj  where ID_APPROVALLPJ='$pror[1]'"); 
                                        $dlpj= mysqli_fetch_row($qlpj);
                                    ?>
                                    <tr>
                                        <?php if ($dlpj[4] != 'Approve') { ?>
                                       
                                        <td><?=$n++?></td>
                                        <td><?=$nmAk?></td>
                                        <?php if ($dlpj) {?>
                                            <?php if ($dlpj[4]=='Approve') {?>
                                                <td>Approve</td>
                                                <td>Approve</td>
                                            <?php } elseif($dlpj[3]=='Approve') {?>
                                                <td>Approve</td>
                                                <td>menunggu diperiksa</td>
                                            <?php  }elseif($dlpj[3]=='Unapproved'){ ?>
                                                <td>Unapprove</td>
                                                <td>menunggu LPJ</td>
                                            <?php  } ?>
                                        <?php  }else{?>
                                        <td>menunngu LPJ</td>
                                        <td>menunggu LPJ</td>
                                        <?php } ?>
                                        <td>
                                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#UpLPJ<?=trim($idAk ) ?>">Upload LPJ
                                            </button>
                                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#UpBukti<?=trim($idAk ) ?>">Upload Bukti Kegiatan
                                            </button>
                                        </td>
                                        <?php if( isset($dlpj[6]) && $dlpj[3]=='Unapproved' || isset($dlpj[6]) && $dlpj[4]=='Unapproved' ){ ?>
                                            <td> <button type="button" class="btn btn-danger mb-2" ><a style="text-decoration:none; Color:white;" href="<?php echo "f_revisi_lpj/".$dlpj[6] ?>"> <i class = "fa fa-download"></i> </a></button></td>
                                            <?php } else{  ?>
                                                <td> <button type="button" class="btn btn-secondary mb-2" ><a style="text-decoration:none; Color:white;" > <i class = "fa fa-download"></i> </a></button></td>
                                            <?php } ?>
                                    <?php } ?>
                                    </tr>
                                <?php  
                                        }  
                                    }
                                }?>
                        </tbody>
                    </table>

                                <?php
                            } else {
                            
                            }
                            
                            ?>

                        
                   

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

    <?php include '../template/footInc.php';
     $idOr= $array['ID_ORMAWA'];
     $qK = mysqli_query($koneksi,"SELECT   NAMA_KEGIATAN, ID_PENGAJUAN, STATUS FROM pengajuan_kegiatan WHERE STATUS = 'Approve' and ID_ORMAWA = '$idOr' ");
     while($data = mysqli_fetch_array($qK)){
    ?>

      <!--Upload proposal Modal -->
      <div class="modal fade" id="Upload<?= trim($data['ID_PENGAJUAN']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Proposal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/Administrasi.php" method="post"  enctype="multipart/form-data">
                        <input class="form-control mb-2" name="id" value="<?= $data['ID_PENGAJUAN']?>" hidden type="text"  >
                        <input class="form-control mb-2" name="proposal" type="file"  required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="Upload" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


      <!--Upload LPJ Modal -->
      <div class="modal fade" id="UpLPJ<?= trim($data['ID_PENGAJUAN']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload LPJ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/Administrasi.php" method="post"  enctype="multipart/form-data">
                        <input class="form-control mb-2" name="id" value="<?= $data['ID_PENGAJUAN']?>" hidden type="text"  >
                        <label for="lpj">LPJ</label>
                        <input class="form-control mb-2" name="proposal" id="lpj" type="file"  required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="UpLPJ" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <!--Upload Bukti Modal -->
      <div class="modal fade" id="UpBukti<?= trim($data['ID_PENGAJUAN']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Bukti Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/Administrasi.php" method="post"  enctype="multipart/form-data">
                        <input class="form-control mb-2" name="id" value="<?= $data['ID_PENGAJUAN']?>" hidden type="text"  >
                        <label for="absen">Absensi Bukti Kegiatan</label>
                        <input class="form-control mb-2" name="absen" id="absen" type="file"  required>
                        <label for="dok">Dokumentasi</label>
                        <input class="form-control mb-2" name="dok" id="dok" type="file"  required>
                        <label for="sertif">Sertifikat</label>
                        <input class="form-control mb-2" name="sertif" id="sertif" type="file"  required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="UpBukti" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
   
</body>

</html>
<?php include 'Template/EditProfilePass.php' ?>
<?php

if (!isset($_SESSION['notif'])) {
    ?>
                 
          <?php
          unset($_SESSION['notif']);
  }  else if($_SESSION['notif']==true) {
    ?>
     <script>
                              Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: 'upload Berhasil',
                              
                              })
                              </script>
<?php
unset($_SESSION['notif']);
  }else{
?>
<script>
          Swal.fire({
          icon: 'error',
          title: 'gagal',
          text: 'gagal Berhasil',
          
          })
          </script>
          
<?php } 
unset($_SESSION['notif']);
?>