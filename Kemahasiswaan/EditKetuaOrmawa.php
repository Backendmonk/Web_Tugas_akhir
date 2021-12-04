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
                            <h2>Edit Ketua Ormawa</h2>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                </div>
                                <div class="card-body">
                                <div class="col-6">
                                            
                                            <a href="KetuaOrmawa.php"  class="btn btn-primary mb-3">Tambah data baru</a>                                                                                                 
                                    </div>  
                                    <?php 
                                    $id=$_POST['id'] ;
                                    $sql = "SELECT * FROM pengurus_ormawa WHERE USERNAME_KETUA = '$id' ";
                                    $q = mysqli_query($koneksi,$sql);
                                    $datas = mysqli_fetch_assoc($q);
                                    $nidn=$datas['ID_ORMAWA'];
                                    $sql = "SELECT NAMA_ORMAWA FROM ormawa WHERE ID_ORMAWA = '$nidn' ";
                                    $q = mysqli_query($koneksi,$sql);
                                    $datasP = mysqli_fetch_assoc($q);
                                    
                                    ?>
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-6">
                                            <label for="namaOr" class="form-label">Nama Ormawa</label>
                                                <input class="form-control mb-2" name="namaOr" type="text"
                                                    placeholder="Nama Ormawa" readonly value="<?= $datasP['NAMA_ORMAWA']  ?>"
                                                    required>
                                            </div>
                                            <div class="col-6">
                                            <label for="namaK" class="form-label">Nama Ketua Ormawa</label>
                                                <input type="text" class="form-control mb-2" name="namaK" id="namaK" value="<?= $datas['NAMA_KETUA'] ?>" placeholder="nama">
                                            </div>
                                            <div class="col-6">
                                            <label for="userr" class="form-label">Username Ketua</label>
                                                <input type="text" class="form-control mb-2" name="user" id="user" value="<?= $datas['USERNAME_KETUA'] ?>" placeholder="Username">
                                            </div>
                                            <div class="col-6">
                                            <label for="passKetua" class="form-label">Password</label>
                                                <input type="password" class="form-control mb-2" name="user" id="pass" >
                                            </div>
                                            <div class="col-6">
                                           
                                           <button type="submit" name="newEdit" class="btn btn-primary mb-3">Simpan</button>                                                                                                 
                                           </div>                                                                                                
                                                                                                                                        
                                      
                                       </form>
                                        </div>
                                       
                                       
                                  
                                    
                                   
                                                                                                                                        
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


  
</body>

</html>

</body>

</html>


<!-- logic Edit ormawa -->
<?php if (isset($_POST['newEdit'])) {
        $user = $_POST['user'];
        $query = "SELECT * FROM `pengurus_ormawa` where `USERNAME_KETUA` = '$user'";
        $q = mysqli_query($koneksi,$query);
        if (!$q->num_rows > 0) {
            $NAMA = $_POST['namak'];
            $passk = password_hash($_POST['passKetua'],PASSWORD_DEFAULT);
            // query update ormawa
             $sql = "UPDATE pengurus_ormawa SET NAMA_KETUA = '$NAMA', USERNAME_KETUA = '$user', PASSWORD_KETUA='$passk' WHERE USERNAME_KETUA = '$user';";
            $result = mysqli_query($koneksi, $sql);
            var_dump($sql);
            if ($result) {
               
                        ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'success',
        text: 'edit ketua ormawa berhasil',

    })
</script>

<?php
            } else {
                ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'edit ketua ormawa gagal',

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
        text: 'ketua ormawa tidak ditemukan',

    })
</script>
<?php
        }
        
        
        
    
    
            
            
        
        
        
        
        
    } 
    
    if (isset($_POST['hapus'])) {
        $id = $_POST['id'];
        $sql2 = "SELECT * FROM ormawa WHERE ID_ORMAWA='$id'";
        $result = mysqli_query($koneksi, $sql2);

        if ($result) {
            $sql1 = "DELETE FROM ormawa WHERE ID_ORMAWA='$id'";
            $result = mysqli_query($koneksi, $sql1);
        }
       // query delete ormawa
       $sql = "DELETE FROM ormawa WHERE ID_ORMAWA='$id';";
        var_dump($sql);
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