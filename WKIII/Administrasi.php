<?php
        include "SessionWKIII.php";

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
                            
                            $qK = mysqli_query($koneksi,"SELECT  NAMA_KEGIATAN, ID_PENGAJUAN, STATUS FROM pengajuan_kegiatan WHERE STATUS = 'Approve' ");
                            
                            $jumlah = mysqli_num_rows($qK);
                            
                            if ($jumlah > 0) {
                                ?>
                                <table class="table table-bordered">
                        <h3>Pengajuan Proposal</h3>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Approval Kemahasiswaan</th>
                                <th scope="col">Approval WKIII</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($ds = mysqli_fetch_assoc($qK)){
                                $idp = $ds['ID_PENGAJUAN'];
                                $qPro = mysqli_query($koneksi, "SELECT * FROM proposal WHERE ID_PENGAJUAN = '$idp'");
                              
                                    while($dataPro = mysqli_fetch_array($qPro))
                                    {
                                        $idAp =  $dataPro["ID_APPROVAL"];
                                        $dataApPro = mysqli_query($koneksi, "SELECT * FROM approval_proposal WHERE ID_APPROVAL = '$idAp'");
                                        $data =  mysqli_fetch_row($dataApPro)
                                        ?>
                                        <tr>
                                       
                                            <th scope="row">1</th>
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
                                             <?php if ($data[3]=='Approve') { ?>
                                            <td> 
                                                <button type="button" class="btn btn-primary mb-2" ><a style="text-decoration:none; Color:white;" href="<?php echo "../ORMAWA/f_proposal/".$data[5] ?>"> <i class = "fa fa-download"></i> </a></button>
                                                <button type="button" class="btn btn-danger mb-2" data-toggle="modal"
                                                data-target="#Upload<?=trim($idp ) ?>">upload Revisi</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                                data-target="#Ap<?=trim($idp ) ?>">Approve</button>
                                                <button type="button" class="btn btn-danger mb-2" data-toggle="modal"
                                                data-target="#Un<?=trim($idp ) ?>">Unaprove</button>
                                            </td>
                                            <?php }else{ ?>
                                                <td> 
                                                <button type="button" class="btn btn-secondary mb-2" ><a style="text-decoration:none; Color:white;" > <i class = "fa fa-download"></i> </a></button>
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                data-target="#Upload<?=trim($idp ) ?>">upload Revisi</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                data-target="#Ap<?=trim($idp ) ?>">Approve</button>
                                                <button type="button" class="btn btn-secondary mb-2" data-toggle="modal"
                                                data-target="#Un<?=trim($idp ) ?>">Unaprove</button>
                                            </td>
                                            <?php } ?>
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
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            
                        </tbody>
                    </table>

                                <?php
                            } else {
                                # code...
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
    
     $qK = mysqli_query($koneksi,"SELECT   *  FROM proposal ");
     while($data = mysqli_fetch_array($qK)){
    ?>

      <!--Upload Revisi Modal -->
      <div class="modal fade" id="Upload<?= trim($data['ID_PENGAJUAN']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Revisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/Administrasi.php" method="post"  enctype="multipart/form-data">
                    <input type="text" name="idp" value="<?=$data['ID_APPROVAL'] ?>" hidden>
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

      <!--Upload Approve Proposal Modal -->
      <div class="modal fade" id="Ap<?= trim($data['ID_PENGAJUAN']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Revisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/Administrasi.php" method="post" >
                        <input type="text" name="kema" value="<?= $array["NIDN_WKIII"] ?>" hidden>
                        <input type="text" name="idp" value="<?=$data['ID_APPROVAL'] ?>" hidden>
                        Apakah sudah yakin di approve?, nanti tidak bisa diubah lagi loh!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="Ap" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <!--Unapproved proposal Modal -->
      <div class="modal fade" id="Un<?= trim($data['ID_PENGAJUAN']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Revisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Logic/Administrasi.php" method="post"  enctype="multipart/form-data">
                        <input type="text" name="kema" value="<?= $array["NIDN_WKIII"] ?>" hidden>
                        <input type="text" name="idp" value="<?=$data['ID_APPROVAL'] ?>" hidden>
                        Apakah sudah yakin di Unapproved?, nanti tidak bisa diubah lagi loh!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="Un" class="btn btn-primary">Simpan</button>
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
if ($_SESSION['eks']==true) {
   

    ?>
    <script>
          Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Ekstensi Salah',
          
          })
          </script>
<?php
unset($_SESSION['eks']);
}
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


if (!isset($_SESSION['notifA'])) {
    ?>
                 
          <?php
          unset($_SESSION['notifA']);
  }  else if($_SESSION['notifA']==true) {
    ?>
     <script>
                              Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: 'Approve Berhasil',
                              
                              })
                              </script>
<?php
unset($_SESSION['notifA']);
  }else{
?>
<script>
          Swal.fire({
          icon: 'error',
          title: 'gagal',
          text: 'Approve gagal',
          
          })
          </script>
          
<?php } 
unset($_SESSION['notifA']);

if (!isset($_SESSION['notifU'])) {
    ?>
                 
          <?php
          unset($_SESSION['notifU']);
  }  else if($_SESSION['notifU']==true) {
    ?>
     <script>
                              Swal.fire({
                              icon: 'success',
                              title: 'Berhasil',
                              text: 'Unapproved Berhasil',
                              
                              })
                              </script>
<?php
unset($_SESSION['notifU']);
  }else{
?>
<script>
          Swal.fire({
          icon: 'error',
          title: 'gagal',
          text: 'UnApproved gagal',
          
          })
          </script>
          
<?php } 
unset($_SESSION['notifU']);
?>