<?php
 
 include "../../inc/koneksi.php";

 if (isset($_POST['Upload'])) {
    $filename_kg = $_FILES['proposal']['name'];
    $ext_kg = pathinfo($filename_kg, PATHINFO_EXTENSION);
    $ekstensi_kg = array('doc','docx','pdf');
   
   // cek proposal format
    if(!in_array($ext_kg,$ekstensi_kg)){
       ?>
       <script>
             Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Ekstensi Salah',
             
             })
             </script>
   <?php
   }
   $id = rand();
   $idp = $_POST["id"];
    // tmp file
    move_uploaded_file($_FILES['proposal']['tmp_name'], '../f_proposal/'.time()."_".$filename_kg);
    $proposal = time()."_".$filename_kg;
    $h = mysqli_query($koneksi,"SELECT ID_APPROVAL FROM proposal WHERE ID_PENGAJUAN = $idp");
    $cek = mysqli_num_rows($h);
    $tgl = date('Y-m-d'); 
    if ($cek) {
       $data = mysqli_fetch_array($h);
       $idaporve = $data["ID_APPROVAL"];
       
      $qApPro = mysqli_query($koneksi, "UPDATE approval_proposal set LAPORAN_PROPOSAL = '$proposal' where ID_APPROVAL = '$idaporve'");
      $qPro = mysqli_query($koneksi, "UPDATE proposal set TANNGGAL_PENGAJUANPROPOSAL = '$tgl' where ID_APPROVAL = '$idaporve'");
  
    } else {
      $idpropo = rand();
      $qApPro = mysqli_query($koneksi, "INSERT INTO approval_proposal (LAPORAN_PROPOSAL,ID_APPROVAL)
      VALUES ('$proposal','$id')");
      $qPro = mysqli_query($koneksi, "INSERT INTO proposal (ID_PROPOSAL,ID_APPROVAL, TANNGGAL_PENGAJUANPROPOSAL,ID_PENGAJUAN) VALUES ('$idpropo','$id','$tgl','$idp')");

    }
    
    session_start();
    if ($qApPro AND $qPro) {
      $_SESSION['notif'] = true;
    } else {
      $_SESSION['notif'] = false;
    }
    header("location:../Administrasi.php");
 
 }


 //logic LPJ
 if (isset($_POST['UpLPJ'])) {
    $filename_kg = $_FILES['proposal']['name'];
    $ext_kg = pathinfo($filename_kg, PATHINFO_EXTENSION);
    $ekstensi_kg = array('doc','docx','pdf');
   
   // cek LPJ format
    if(!in_array($ext_kg,$ekstensi_kg)){
       ?>
       <script>
             Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Ekstensi Salah',
             
             })
             </script>
   <?php
   }
   $id = rand();
   $idp = $_POST["id"];
    // tmp file
    move_uploaded_file($_FILES['proposal']['tmp_name'], '../f_lpj/'.time()."_".$filename_kg);
    $proposal = time()."_".$filename_kg;
    $h = mysqli_query($koneksi,"SELECT * FROM proposal WHERE ID_PENGAJUAN = $idp");
    $cek = mysqli_fetch_row($h);
    if (!empty($cek[5])) {
       $idaporve =$cek[5];
      $qApPro = mysqli_query($koneksi, "UPDATE approval_lpj set LAPORAN_LPJ = '$proposal' where ID_APPROVALLPJ = '$idaporve'");
      $qPro =true;
      echo 'asd';
    } else {
      $idpropo = rand();
      var_dump($proposal);
      var_dump($id);
      $qApPro = mysqli_query($koneksi, "INSERT INTO approval_lpj (LAPORAN_LPJ,ID_APPROVALLPJ)
      VALUES ('$proposal','$id')");
      $qPro = mysqli_query($koneksi, "UPDATE proposal set ID_LPJ = '$id' where ID_PENGAJUAN = $idp");
      echo 'asdwew';
    }
    
    session_start();
    if ($qApPro AND $qPro) {
      $_SESSION['notif'] = true;
    } else {
      $_SESSION['notif'] = false;
    }
    header("location:../Administrasi.php");
 
 }

?>