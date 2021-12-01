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
                            <h2>Main</h2>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Binaan</h6>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                        data-target="#staticBackdropOrmawa">Tambah Ketua Ormawa</button>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Ormawa</th>
                                                    <th>Nama ketua Ormawa</th>
                                                    <th>Username Ketua Ormawa</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $q = mysqli_query($koneksi,"SELECT * FROM `pengurus_ormawa`");
                                            
                                               
                                                while ($data = mysqli_fetch_array($q)) {
                                                    ?>
                                                <tr>
                                                    <td><?php 
                                                     $IDK = $data['ID_ORMAWA'];
                                                     $id = mysqli_query($koneksi,"SELECT NAMA_ORMAWA FROM `ormawa` WHERE `ID_ORMAWA` = '$IDK' ");
                                                     $DK = mysqli_fetch_array($id);
                                                    echo $DK['NAMA_ORMAWA'];?></td>
                                                    <td>
                                                        <?php 
                                                                            echo $data['NAMA_KETUA'] ;
                                                                        ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                                            echo $data['USERNAME_KETUA'] ;
 
                                                                         ?>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <form action="EditKetuaOrmawa.php" method="post">
                                                                <input type="text" hidden name="id" value="<?= $data['USERNAME_KETUA'] ?>">
                                                                <button type="submit" class="btn btn-warning"
                                                                    name="edit">
                                                                    Edit
                                                                </button>
                                                                </form>
                                                            </div>
                                                            <div class="col-6">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#hapus<?= $data['USERNAME_KETUA'] ?>">
                                                                    Delete
                                                                </button>
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

    
    <!--Tambah Ormawa Modal -->
    <div class="modal fade" id="staticBackdropOrmawa" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Ormawa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <select class="form-select mb-2" name="id" required>
                            <option  hidden>
                                Pilih Ormawa
                            </option>
                            <?php
                            $q = mysqli_query($koneksi,"SELECT ID_ORMAWA,NAMA_ORMAWA FROM `ormawa`");
                            while ($data = mysqli_fetch_array($q)) {
?>
                            <option value="<?php echo $data['ID_ORMAWA']; ?>">
                                <?php echo $data['NAMA_ORMAWA']; ?></option>
                            <?php
                                                                                                                    }
                                                                                                                    ?>
                        </select>
                        <input class="form-control mb-2" name="namaK" type="text" placeholder="Nama Ketua" required>
                        <input class="form-control mb-2" name="userK" type="text" placeholder="Username Ketua" required>
                        <input class="form-control mb-2" name="passKetua" type="password" placeholder="password ketua"
                            required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit3" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>

</body>

</html>
<!-- logic tambah ormawa -->
<?php if (isset($_POST['submit3'])) {
        $id = $_POST['id'];
        $userK =$_POST['userK'];
        $namaK =$_POST['namaK'];
        $passk = password_hash($_POST['passKetua'],PASSWORD_DEFAULT);
        //  query insert pengurus ormawa
         $sql = "INSERT INTO pengurus_ormawa (USERNAME_KETUA, NAMA_KETUA,ID_ORMAWA,PASSWORD_KETUA)
         VALUES ('$userK', '$namaK','$id','$passk')";
        $result = mysqli_multi_query($koneksi, $sql);
        // var_dump(mysqli_insert_id($koneksi));
        if ($result) {
            $_POST['namaOr']="";
                  $_POST['id']="";
                    $_POST['NIDN'] = "";
                    ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'tambah ketua ormawa berhasil',

    })
</script>

<?php
        } else {
            ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'tambah ketua ormawa gagal',

    })
</script>
<?php
        }
    

    
    
    
    
} 
?>

<!-- logic Edit ormawa -->
<?php if (isset($_POST['edit'])) {
    $pembinaLama =$_POST['pembinaLama'];
    $NIDN =$_POST['NIDN'];
    if ($pembinaLama != $NIDN) {
        $query = "SELECT * FROM `ormawa` where `NIDN` = '$NIDN' ";
        $q = mysqli_query($koneksi,$query);
        if (!$q->num_rows > 0) {
            $id = $_POST['id'];
            $NAMA = $_POST['namaOr'];
            $userK =$_POST['userK'];
            $namaK =$_POST['namaK'];
            $passk = password_hash($_POST['passKetua'],PASSWORD_DEFAULT);
            // query update ormawa
             $sql = "UPDATE ormawa SET NAMA_ORMAWA = '$NAMA', NIDN = '$NIDN' WHERE ID_ORMAWA = '$id';";
            //  query update pengurus ormawa
             $sql .= "UPDATE pengurus_ormawa set USERNAME_KETUA ='$userK' , NAMA_KETUA = '$namaK', PASSWORD_KETUA = '$passk' where ID_ORMAWA = '$id'";
            $result = mysqli_multi_query($koneksi, $sql);
            // var_dump(mysqli_insert_id($koneksi));
            if ($result) {
                $_POST['namaOr']="";
                      $_POST['id']="";
                        $_POST['NIDN'] = "";
                        ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'edit ormawa berhasil',

    })
</script>

<?php
            } else {
                ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'edit ormawa gagal',

    })
</script>
<?php
            }
        } else {
            ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Pembina sudah membina ormawa lain',

    })
</script>
<?php
        }
        
        
        
    
    } else {
            $id = $_POST['id'];
            $NAMA = $_POST['namaOr'];
            $userK =$_POST['userK'];
            $namaK =$_POST['namaK'];
            if (!empty($_POST['passKetua'])) {
                $passk = password_hash($_POST['passKetua'],PASSWORD_DEFAULT);
            // query update ormawa
             $sql = "UPDATE ormawa SET NAMA_ORMAWA = '$NAMA', NIDN = '$NIDN' WHERE ID_ORMAWA = '$id';";
            //  query update pengurus ormawa
             $sql .= "UPDATE pengurus_ormawa set USERNAME_KETUA ='$userK' , NAMA_KETUA = '$namaK', PASSWORD_KETUA = '$passk' where ID_ORMAWA = '$id'";
            $result = mysqli_multi_query($koneksi, $sql);
            // var_dump(mysqli_insert_id($koneksi));
            if ($result) {
                $_POST['namaOr']="";
                      $_POST['id']="";
                        $_POST['NIDN'] = "";
                        ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'edit ormawa berhasil',

    })
</script>

<?php
            } else {
                ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'edit ormawa gagal',

    })
</script>
<?php
            }
            } else {
            // query update ormawa
             $sql = "UPDATE ormawa SET NAMA_ORMAWA = '$NAMA', NIDN = '$NIDN' WHERE ID_ORMAWA = '$id';";
            //  query update pengurus ormawa
             $sql .= "UPDATE pengurus_ormawa set USERNAME_KETUA ='$userK' , NAMA_KETUA = '$namaK' where ID_ORMAWA = '$id'";
            $result = mysqli_multi_query($koneksi, $sql);
            // var_dump(mysqli_insert_id($koneksi));
            if ($result) {
                $_POST['namaOr']="";
                      $_POST['id']="";
                        $_POST['NIDN'] = "";
                        ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'edit ormawa berhasil',

    })
</script>

<?php
            } else {
                ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'edit ormawa gagal',

    })
</script>
<?php
            }
            }
            
            
        
        }
        
        
        
    } 
    
    if (isset($_POST['hapus'])) {
        $id = $_POST['id'];
       // query delete ormawa
       $sql = "DELETE FROM ormawa WHERE ID_ORMAWA='$id';";
     
       $result = mysqli_query($koneksi, $sql);
       // var_dump(mysqli_insert_id($koneksi));
       if ($result) {
                   ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'Hapus ormawa berhasil',

    })
</script>

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
<?php
       }
    }
   
?>
<?php include 'Template/EditProfilePass.php' ?>