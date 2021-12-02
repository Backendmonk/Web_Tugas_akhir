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
                            <h2>Edit Ormawa</h2>
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
                                                <input class="form-control mb-2" name="namaOr" type="text"
                                                    placeholder="Nama Ormawa" readonly value="<?= $datasP['NAMA_ORMAWA']  ?>"
                                                    required>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control mb-2" name="namaK" id="" value="<?= $datas['NAMA_KETUA'] ?>" placeholder="nama">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control mb-2" name="user" id="" value="<?= $datas['USERNAME_KETUA'] ?>" placeholder="Username">
                                            </div>
                                            <div class="col-6">
                                                <input type="password" class="form-control mb-2" name="user" id="" >
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
                                                    <th>Nama Pembina</th>
                                                
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $q = mysqli_query($koneksi,"SELECT * FROM `ormawa`");
                                            

                                                while ($data = mysqli_fetch_array($q)) {
                                                    ?>
                                                <tr>
                                                    <td><?php echo $data['NAMA_ORMAWA'];?></td>
                                                    <td><?php 
                                                                    // manggil nama-nama pembina
                                                                        $NIDN = $data['NIDN'];
                                                                        $id = mysqli_query($koneksi,"SELECT NAMA_PEMBINA, NIDN  FROM `pembina` WHERE `NIDN` = '$NIDN' ");
                                                                        $array = mysqli_fetch_array($id);
                                                                    echo $array['NAMA_PEMBINA'] ;?>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-6">
                                                            <form action="EditKetuaOrmawa.php" method="post">
                                                                <input type="hidden" name="id" value="<?= $data['ID_ORMAWA'] ?>">
                                                                <button type="submit" class="btn btn-warning"
                                                                    name="edit">
                                                                    Edit
                                                                </button>
                                                                </form>
                                                            </div>
                                                            <div class="col-6">
                                                            <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?= $data['ID_ORMAWA'] ?>">
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


  
</body>

</html>

</body>

</html>


<!-- logic Edit ormawa -->
<?php if (isset($_POST['newEdit'])) {
    $pembinaLama =$_POST['pembinaLama'];
    $NIDN =$_POST['NIDN'];
    if ($pembinaLama != $NIDN) {
        $query = "SELECT * FROM `ormawa` where `NIDN` = '$NIDN' ";
        $q = mysqli_query($koneksi,$query);
        if (!$q->num_rows > 0) {
            $id = $_POST['id'];
            $NAMA = $_POST['namaOr'];
            // query update ormawa
             $sql = "UPDATE ormawa SET NAMA_ORMAWA = '$NAMA', NIDN = '$NIDN' WHERE ID_ORMAWA = '$id';";
            $result = mysqli_query($koneksi, $sql);
            var_dump($sql);
            if ($result) {
               
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
            // query update ormawa
             $sql = "UPDATE ormawa SET NAMA_ORMAWA = '$NAMA', NIDN = '$NIDN' WHERE ID_ORMAWA = '$id';";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
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