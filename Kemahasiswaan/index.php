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

</head>

<body id="page-top">
<?php include 'Template/navbar.php' ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include 'Template/sidebar.php' ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column pt-4">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        
                    <main class="col overflow-auto h-100">
            <div class="bg-light border rounded-3 p-3">
                <h2>Main</h2>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/export-data.js"></script>
                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                            <figure class="highcharts-figure">
                                <div id="container"></div>
                                <p class="highcharts-description">
                                    This chart shows the use of a logarithmic y-axis. Logarithmic axes can
                                    be useful when dealing with data with spikes or large value gaps,
                                    as they allow variance in the smaller values to remain visible.
                                </p>
                            </figure>
                            </div>
                            
                            <div class="carousel-item">
                            <?php
                                include "Struktur-WKIII.php";
                            ?>
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
<!-- tempat sumon kodingan modal -->
<?php include 'Template/modal.php' ?>

</body>

</html>

<?php 
    if (isset($_POST['submit'])) {
        if ($_POST['pass1'] == $_POST['pass2']) {
            $pass = $_POST['pass1'];
            $password = password_hash($pass,PASSWORD_DEFAULT);
        }
        $NIDN = $_POST['NIDN'];
        $NAMA = $_POST['NAMA'];
        $Jabatan = $_POST['Jabatan'];
              $sql = "UPDATE kemahasiswaan set NAMA_KEMAHASISWAAN = '$NAMA', PASSWORD_KEMAHASISWAAN = '$password' , JABATAN_kEMAHASISWAAN = '$Jabatan' where NIDN_KEMAHASISWAAN = '$NIDN'";
              $result = mysqli_query($koneksi, $sql);
              if ($result) {
            
                $_POST['NAMA']="";
                $_POST['Jabatan']="";
                  $_POST['password'] = "";
                  ?>
                  <script>
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: 'register pembina berhasil',
                    
                    })
                </script>
              <?php
                
              } else {
                ?>
                <script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'register gagal',
                
                })
              </script>
              <?php
              }
         
            ?>
          
          <?php
          
      
      }
?>

<style>

.highcharts-figure,
.highcharts-data-table table {
    min-width: 360px;
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>


<script>

Highcharts.chart('container', {

title: {
    text: 'Logarithmic axis demo'
},

xAxis: {
    tickInterval: 1,
    type: 'logarithmic',
    accessibility: {
        rangeDescription: 'Range: 1 to 10'
    }
},

yAxis: {
    type: 'logarithmic',
    minorTickInterval: 0.1,
    accessibility: {
        rangeDescription: 'Range: 0.1 to 1000'
    }
},

tooltip: {
    headerFormat: '<b>{series.name}</b><br />',
    pointFormat: 'x = {point.x}, y = {point.y}'
},

series: [{
    data: [1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
    pointStart: 1
}]
});

    </script>