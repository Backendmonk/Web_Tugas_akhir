<?php
include '../../inc/koneksi.php';

if (isset($_POST['Upload'])) {
  session_start();
  $nidn= $_POST['kema'];
  $proposal= $_POST['proposal'];
  $tgl = date('Y-m-d'); 
  $idp = $_POST['idp'];
  $h = mysqli_query($koneksi,"UPDATE approval_proposal set REVISI ='$proposal', tgl = '$tgl', NIDN_KEMAHASISWAAN='$nidn' where ID_APPROVAL = '$idp'");
   if ($h) {
     $_SESSION['notif'] = true;
   } else {
     $_SESSION['notif'] = false;
   }
 
 header("location:../Administrasi.php");
  }

if (isset($_POST['UpLpj'])) {

  session_start();
  $nidn= $_POST['kema'];
  $proposal= $_POST['proposal'];
  $tgl = date('Y-m-d'); 
  $idp = $_POST['idp'];
   $h = mysqli_query($koneksi,"UPDATE approval_lpj set REVISI_LPJ ='$proposal', tgl = '$tgl', NIDN_KEMAHASISWAAN='$nidn' where ID_APPROVALLPJ = '$idp'");

   if ($h) {
     $_SESSION['notif'] = true;
   } else {
     $_SESSION['notif'] = false;
   }
 header("location:../Administrasi.php");
  }


if (isset($_POST['Ap'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $y = mysqli_query($koneksi,"UPDATE approval_proposal set NIDN_KEMAHASISWAAN ='$nidn', APPROVAL_PROPOSAL_KEMAHASISWAAN = 'Approve' where ID_APPROVAL = '$idp'");
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
    $y = mysqli_query($koneksi,"UPDATE approval_lpj set NIDN_KEMAHASISWAAN ='$nidn', APPROVAL_LPJ_KEMAHASISWAAN = 'Approve' where ID_APPROVALLPJ = '$idp'");
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
    $y = mysqli_query($koneksi,"UPDATE approval_proposal set NIDN_KEMAHASISWAAN ='$nidn', APPROVAL_PROPOSAL_KEMAHASISWAAN = 'Unapproved' where ID_APPROVAL = '$idp'");
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
    $y = mysqli_query($koneksi,"UPDATE approval_lpj set NIDN_KEMAHASISWAAN ='$nidn', APPROVAL_LPJ_KEMAHASISWAAN = 'Unapproved' where ID_APPROVALLPJ = '$idp'");
    session_start();
    if ($y) {
      $_SESSION['notifU'] = true;
    } else {
      $_SESSION['notifU'] = false;
    }
    header("location:../Administrasi.php");
}


?>