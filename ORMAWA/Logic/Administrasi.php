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

 //logic LPJ
 if (isset($_POST['UpBukti'])) {
    $filename_kg = $_FILES['absen']['name'];
    $ext_kg = pathinfo($filename_kg, PATHINFO_EXTENSION);
    $ekstensi_kg = array('doc','docx','pdf');

    $filename_dok = $_FILES['dok']['name'];
    $ext_dok = pathinfo($filename_dok, PATHINFO_EXTENSION);
    $ekstensi_dok = array('doc','docx','pdf');

    $filename_ser = $_FILES['sertif']['name'];
    $ext_ser = pathinfo($filename_ser, PATHINFO_EXTENSION);
    $ekstensi_ser = array('doc','docx','pdf');

   // cek LPJ format
   if(!in_array($ext_kg,$ekstensi_kg) && !in_array($ext_dok,$ekstensi_dok) && !in_array($ext_ser,$ekstensi_ser) ){
    $_SESSION['eks'] = true;
 }else{
   $id = rand();
   $idp = $_POST["id"];
    // tmp file
    move_uploaded_file($_FILES['absen']['tmp_name'], '../f_bukti/'.time()."_".$filename_kg);
    $absen = time()."_".$filename_kg;
    // tmp file
    move_uploaded_file($_FILES['dok']['tmp_name'], '../f_bukti/'.time()."_".$filename_dok);
    $dok = time()."_".$filename_dok;
    // tmp file
    move_uploaded_file($_FILES['sertif']['tmp_name'], '../f_bukti/'.time()."_".$filename_ser);
    $ser = time()."_".$filename_ser;

    $h = mysqli_query($koneksi,"SELECT * FROM proposal WHERE ID_PENGAJUAN = $idp");
    $cek = mysqli_fetch_row($h);
    $idlpj = $cek[5];
    $hs = mysqli_query($koneksi,"SELECT * FROM approval_lpj WHERE ID_APPROVALLPJ = $idlpj");
    $cek1 = mysqli_fetch_row($hs);
    if (!empty($cek1[7])) {
       $idaporve =$cek1[7];
      $qApPro = mysqli_query($koneksi, "UPDATE bukti_kegiatan set ABSENSI_BK= '$absen', DOKUMENTASI = '$dok', SERTIFIKAT = '$ser' where ID_BUKTIKEGIATAN = '$idaporve'");
      $qPro =true;
    } else {
      $idpropo = rand();
      $qApPro = mysqli_query($koneksi, "INSERT INTO bukti_kegiatan (SERTIFIKAT,DOKUMENTASI,ABSENSI_BK,ID_BUKTIKEGIATAN)
      VALUES ('$ser','$dok','$absen','$id')");
      $qPro = mysqli_query($koneksi, "UPDATE approval_lpj set ID_BK = '$id' where ID_APPROVALLPJ = $idlpj ");
    }
    
    session_start();
    if ($qApPro AND $qPro) {
      $_SESSION['notif'] = true;
    } else {
      $_SESSION['notif'] = false;
    }
  }
    header("location:../Administrasi.php");
 
 }

?>