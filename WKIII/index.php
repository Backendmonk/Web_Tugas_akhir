<!DOCTYPE html>
<html lang="en">
<?php

        include "SessionWKIII.php";
        include "../inc/koneksi.php";

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WKIII</title>

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
                                    This chart shows how data labels can be added to the data series. This
                                    can increase readability and comprehension for small datasets.
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include '../template/footInc.php' ?>

</body>

</html>

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
    chart: {
        type: 'line'
    },
    
    title: {
        text: 'Kegiatan Mahasiswa tahun <?php echo date('Y');  ?> '
    },
   
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Jumlah Kegiatan'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Kegiatan',
        data: [
            <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 1) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                    echo 0;
              }else{
                echo $nov_num['lpj'];
              }
              
      ?>, 
        <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 2) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
      <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 3) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
        <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 4) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
      <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 5) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
        <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 6) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
       <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 7) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
     <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 8) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
     <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 9) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          };
      ?>, 
     <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 10) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>, 
      <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 11) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>,
     <?php
    
              $nov = mysqli_query($koneksi, "SELECT count(ID_LPJ)as lpj FROM `lpj` WHERE ( MONTH(`TGL_PENGAJUANLPJ`) = 12) GROUP BY month(`TGL_PENGAJUANLPJ`)");
              $nov_num = mysqli_fetch_array($nov);
              if ($nov_num < 1){
                echo 0;
          }else{
            echo $nov_num['lpj'];
          }
      ?>
       ]
    }]
});
    </script>