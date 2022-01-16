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

    <title>SB Admin 2 - Dashboard</title>

    <?php include '../template/head.php' ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../LogCSS/style.css">

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
                    <main class="col overflow-auto h-100">
                        <div class="bg-light border rounded-3 p-3">
                     
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah data</h6>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                        data-target="#staticBackdropOrmawa">Tambah Pengumuman</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Pengumuman</th>
                                                    <th>Dibuat Oleh</th>
                                                    <th>Tanggal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $q = mysqli_query($koneksi,"SELECT * FROM pengumuman");
                                            

                                                while ($data = mysqli_fetch_array($q)) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $data['pengumuman'];?></td>
                                                    <td><?php 
                                                                        $NIDN = $data['nidn'];
                                                                        $id = mysqli_query($koneksi,"SELECT NAMA_KEMAHASISWAAN, NIDN_KEMAHASISWAAN  FROM kemahasiswaan WHERE NIDN_KEMAHASISWAAN  = '$NIDN' ");
                                                                        $kema = mysqli_fetch_row($id);
                                                                    echo $kema[0] ;?>
                                                    </td>
                                                    <td><?php echo $data['tgl'];?></td>
                                                    <td>
                                                    <div class="row">
                                                            <div class="col-6">
                                                                <button type="submit" class="btn btn-warning"
                                                                    name="edit" data-toggle="modal"
                                                                    data-target="#edit<?= $data['id']?>">
                                                                    Edit
                                                                </button>
                                                            </div>
                                                            <div class="col-6">
                                                            <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                                <button type="submit" class="btn btn-danger"
                                                                   name="hapus">
                                                                    Delete
                                                                </button>
                                                                </form>
                                                            </div>
                                                        </div>




                                                    </td>
                                                </tr>


                                                <?php
                                                }

                                        ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
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


    <!-- summon modal untuk semua halaman-->
    <?php include 'Template/modal.php' ?>

    
    <!--Tambah pengumuman Modal -->
    <div class="modal fade" id="staticBackdropOrmawa" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="text" name="NIDN" class="form-control mb-2" value="<?= $array["NIDN_KEMAHASISWAAN"] ?>"  required hidden>
                        <input class="form-control mb-2" name="pgm" type="text" placeholder="Pengumuman" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit3" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php 
$qap = mysqli_query($koneksi,"SELECT * FROM pengumuman");
while($edit = mysqli_fetch_array($qap)){
?>
    <!--Edit pengumuman Modal -->
    <div class="modal fade" id="edit<?= $edit['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="text" name="id" class="form-control mb-2" value="<?= $edit["id"] ?>"  required hidden>
                        <input type="text" name="NIDN" class="form-control mb-2" value="<?= $array["NIDN_KEMAHASISWAAN"] ?>"  required hidden>
                        <input class="form-control mb-2" value="<?= $edit['pengumuman'] ?>" name="pgm" type="text" placeholder="Pengumuman" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   <?php }?>
</body>

</html>

</body>

</html>
<!-- logic tambah pengumuman -->
<?php if (isset($_POST['submit3'])) {
    $NIDN =$_POST['NIDN'];
    $pgm =$_POST['pgm'];
    $tgl = date('Y-m-d'); 
    $sql = "INSERT INTO pengumuman (pengumuman, nidn,tgl)
    VALUES ('$pgm', '$NIDN','$tgl');";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
                    ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'tambah Pengumuman berhasil',
    })
    
</script>
<script>window.location.href=''</script>
<?php
        } else {
            ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'tambah Pengumuman gagal',

    })
</script>
<?php
        }
  
} 
?>

<!-- logic edit pengumuman -->
<?php if (isset($_POST['edit'])) {
    $NIDN =$_POST['NIDN'];
    $id =$_POST['id'];
    $pgm =$_POST['pgm'];
    $tgl = date('Y-m-d'); 
    $sql = "UPDATE pengumuman SET pengumuman = '$pgm', NIDN = '$NIDN', tgl = '$tgl' WHERE id = '$id';";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
                    ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'edit Pengumuman berhasil',
    })
    
</script>
<script>window.location.href=''</script>
<?php
        } else {
            ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'edit Pengumuman gagal',

    })
</script>
<?php
        }
  
} 
?>

<?php 
    
    if (isset($_POST['hapus'])) {
        $id = $_POST['id'];
       // query delete ormawa
       $sql = "DELETE FROM pengumuman WHERE id ='$id';";
     
       $result = mysqli_query($koneksi, $sql);
       if ($result) {
                   ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'Hapus ormawa berhasil',

    })
</script>
<script>window.location.href=''</script>
<?php
       } else {
           ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Hapus ormawa gagal',

    })
</script>
<script>window.location.href=''</script>
<?php
       }
    }
   
?>
<?php include 'Template/EditProfilePass.php' ?>