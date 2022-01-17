<?php
        include "SessionKemahasiswaan.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kegiatan Ormawa</title>

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
                                <table class="table table-bordered">
                        <h3>Approval LPJ</h3>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Ormawa</th>
                                <th scope="col">Approval</th>
                                <th scope="col">Action</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Kemahasiswaan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=0;
                                $qlpj = mysqli_query($koneksi, "SELECT * FROM pengajuan_lpj");
                                while ($dlpj = mysqli_fetch_array($qlpj)) {
                                    $no++;
                                    $idlpj = $dlpj['id'];
                                $qALpj = mysqli_query($koneksi,"SELECT * FROM applpj where idlpj = '$idlpj'");
                                $dALpj = mysqli_fetch_row($qALpj);
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $dlpj['nama_kegiatan'] ?></td>
                                <td><?= $dlpj['nama_ormawa'] ?></td>
                                <?php if (!empty($dALpj)) { 
                                    if ($dALpj[3]==true) {
                                        $sts = 'Approved';
                                    } else {
                                        $sts = 'Unapproved';
                                    }
                                    ?>
                                    <td><?= $sts ?></td>
                             <?php   } else {?>
                                <td> </td>
                              <?php  } ?>
                                <td><button>Lihat Detail</button></td>
                                <?php if (!empty($dALpj)) {
                                    $idkema = $dALpj[2];
                                    $qk = mysqli_query($koneksi, "SELECT NAMA_KEMAHASISWAAN FROM kemahasiswaan where NIDN_KEMAHASISWAAN = '$idkema' ");
                                    $dk = mysqli_fetch_row($qk);
                                    $nmk = $dk[0];
                                    ?>
                                    <td><?= $dALpj[4] ?></td>
                                    <td><?= $nmk ?></td>
                             <?php   } else {?>
                                <td> </td>
                                <td> </td>
                              <?php  } ?>
                              <td><button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                                data-target="#ApLpj<?=trim($idlpj) ?>">Approve</button>
                                                <button type="button" class="btn btn-danger mb-2" data-toggle="modal"
                                                data-target="#UnLpj<?=trim($idlpj) ?>">Unaprove</button></td>
                            </tr> 
                            <?php } ?>         
                        </tbody>
                    </table>
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
    <?php
    $qlpj = mysqli_query($koneksi, "SELECT * FROM pengajuan_lpj");
    while ($dlpj = mysqli_fetch_array($qlpj)) { ?>
      <!--Upload Approve LPJ Modal -->
      <div class="modal fade" id="ApLpj<?= trim($dlpj['id']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                        <input type="text" name="idp" value="<?= $dlpj['id']?>" hidden>
                        Apakah sudah yakin di approve?
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
     <div class="modal fade" id="UnLpj<?= trim($dlpj['id']) ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                        <input type="text" name="idp" value="<?= $dlpj['id'] ?>" hidden>
                        Apakah sudah yakin di Unapproved?
                        <br>
                        <label  for="revisi">Note Revisi</label>
                    <textarea class="form-control mb-2"name="re" id="revisi" cols="10" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="UnLpj" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }?>

    <?php include '../template/footInc.php';
    ?>

</body>

</html>
<?php include 'Template/EditProfilePass.php' ?>
<?php

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