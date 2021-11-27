
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
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
                            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#staticBackdropOrmawa">Tambah Ormawa</button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Ormawa</th>
                                            <th>Nama Pembina</th>
                                        
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
                                                                        $NIDN = $data['NIDN'];
                                                                        $id = mysqli_query($koneksi,"SELECT NAMA_PEMBINA FROM `pembina` WHERE `NIDN` = '$NIDN' ");
                                                                        $array = mysqli_fetch_array($id);
                                                                    echo $array['NAMA_PEMBINA'] ;?>
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


<!-- summon modal -->
<?php include 'Template/modal.php' ?>

 <!--Tambah Ormawa Modal -->
 <div class="modal fade" id="staticBackdropOrmawa" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <input class="form-control mb-2" name="namaOr" type="text"  placeholder="Nama Ormawa" required>
        <select name="NIDN" >
        <option value="" hidden>--- PILIH PEMBINA ---</option>
            <?php
             $q = mysqli_query($koneksi,"SELECT NIDN,NAMA_PEMBINA FROM `pembina`");
                                            

             while ($data = mysqli_fetch_array($q)) {
                 ?>
                         <option value="<?php echo $data['NIDN']; ?>"><?php echo $data['NAMA_PEMBINA']; ?></option>

             <?php
             }
            ?>
        </select>
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
<?php if (isset($_POST['submit3'])) {
    $NAMA = $_POST['namaOr'];
    $NIDN =$_POST['NIDN'];
     $sql = "INSERT INTO ormawa (NAMA_ORMAWA, NIDN)
     VALUES ('$NAMA', '$NIDN')";
    $result = mysqli_query($koneksi, $sql);
} else {
    # code...
}
?>
<?php include 'Template/EditProfilePass.php' ?>