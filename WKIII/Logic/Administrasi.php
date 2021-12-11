<?php
include '../../inc/koneksi.php';

if (isset($_POST['Upload'])) {
  session_start();
  $filename_kg = $_FILES['proposal']['name'];
  $ext_kg = pathinfo($filename_kg, PATHINFO_EXTENSION);
  $ekstensi_kg = array('doc','docx','pdf');
 
 // cek proposal format
  if(!in_array($ext_kg,$ekstensi_kg)){
    $_SESSION['eks'] = true;
 }else{
  $idp = $_POST['idp'];
   // tmp file
   move_uploaded_file($_FILES['proposal']['tmp_name'], '../../ORMAWA/f_revisi/'.time()."_".$filename_kg);
   $proposal = time()."_".$filename_kg;
   $h = mysqli_query($koneksi,"UPDATE approval_proposal set REVISI ='$proposal' where ID_APPROVAL = '$idp'");

   if ($h) {
     $_SESSION['notif'] = true;
   } else {
     $_SESSION['notif'] = false;
   }
 }
 header("location:../Administrasi.php");
  }

  if (isset($_POST['UpLpj'])) {

    session_start();
    $filename_kg = $_FILES['proposal']['name'];
    $ext_kg = pathinfo($filename_kg, PATHINFO_EXTENSION);
    $ekstensi_kg = array('doc','docx','pdf');
   
   // cek proposal format
    if(!in_array($ext_kg,$ekstensi_kg)){
      $_SESSION['eks'] = true;
   }else{
    $idp = $_POST['idp'];
     // tmp file
     move_uploaded_file($_FILES['proposal']['tmp_name'], '../../ORMAWA/f_revisi_lpj/'.time()."_".$filename_kg);
     $proposal = time()."_".$filename_kg;
     $h = mysqli_query($koneksi,"UPDATE approval_lpj set REVISI_LPJ ='$proposal' where ID_APPROVALLPJ = '$idp'");
  
     if ($h) {
       $_SESSION['notif'] = true;
     } else {
       $_SESSION['notif'] = false;
     }
   }
   header("location:../Administrasi.php");
    }

if (isset($_POST['Ap'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $y = mysqli_query($koneksi,"UPDATE approval_proposal set NIDN_WKIII='$nidn', APPROVAL_PROPOSAL_WKIII = 'Approve' where ID_APPROVAL = '$idp'");
    session_start();
    if ($y) {
      $_SESSION['notifA'] = true;
    } else {
      $_SESSION['notifA'] = false;
    }
    header("location:../Administrasi.php");
}

if (isset($_POST['ApLpj'])) {
  $nidn= $_POST['kema'];
  $idp = $_POST['idp'];
  $y = mysqli_query($koneksi,"UPDATE approval_lpj set NIDN_WKIII ='$nidn', APPROVAL_LPJ_WKIII = 'Approve' where ID_APPROVALLPJ = '$idp'");
  session_start();
  if ($y) {
    $_SESSION['notifA'] = true;
  } else {
    $_SESSION['notifA'] = false;
  }
  header("location:../Administrasi.php");
}


if (isset($_POST['Un'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $y = mysqli_query($koneksi,"UPDATE approval_proposal set NIDN_WKIII='$nidn', APPROVAL_PROPOSAL_WKIII = 'Unapproved' where ID_APPROVAL = '$idp'");
    session_start();
    if ($y) {
      $_SESSION['notifU'] = true;
    } else {
      $_SESSION['notifU'] = false;
    }
    header("location:../Administrasi.php");
}
if (isset($_POST['UnLpj'])) {
  $nidn= $_POST['kema'];
  $idp = $_POST['idp'];
  $y = mysqli_query($koneksi,"UPDATE approval_lpj set NIDN_WKIII ='$nidn', APPROVAL_LPJ_WKIII = 'Unapproved' where ID_APPROVALLPJ = '$idp'");
  session_start();
  if ($y) {
    $_SESSION['notifU'] = true;
  } else {
    $_SESSION['notifU'] = false;
  }
  header("location:../Administrasi.php");
}


?>