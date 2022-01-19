<?php
include '../../inc/koneksi.php';

if (isset($_POST['ApLpj'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $komen = $_POST['komentar'];
    $app = true;
    $date = date("Y-m-d");
    $qcek = mysqli_query($koneksi, "SELECT id from applpj where idlpj = '$idp'");
    $cek = mysqli_num_rows($qcek);

    if ($cek) {
        $sql = "UPDATE applpj set nidn ='$nidn', approve = '$app', catatan = '$komen', TGL_PENGAJUANLPJ= '$date' where idlpj = '$idp'";
    } else {
        $sql = "INSERT INTO `applpj` ( `idlpj`, `nidn`, `approve`, catatan,TGL_PENGAJUANLPJ) VALUES ('$idp','$nidn', '$app', '$komen' ,'$date')";
    }
    $y = mysqli_query($koneksi,$sql);
    session_start();
    if ($y) {
      $_SESSION['notifA'] = true;
    } else {
      $_SESSION['notifA'] = false;
    }
    header("location:../appLPJ.php");
}

if (isset($_POST['UnLpj'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $app = false;
    $date = date("Y-m-d");
    $komen = $_POST['komentar'];
    $qcek = mysqli_query($koneksi, "SELECT id from applpj where idlpj = '$idp'");
    $cek = mysqli_num_rows($qcek);

    if ($cek) {
        $sql = "UPDATE applpj set nidn ='$nidn', approve = '$app', catatan = '$komen', TGL_PENGAJUANLPJ= '$date' where idlpj = '$idp'";
    } else {
        $sql = "INSERT INTO `applpj` ( `idlpj`, `nidn`, `approve`, catatan, TGL_PENGAJUANLPJ) VALUES ('$idp','$nidn', '$app', '$komen','$date' )";
    }
    $y = mysqli_query($koneksi,$sql);
    session_start();
    if ($y) {
      $_SESSION['notifU'] = true;
    } else {
      $_SESSION['notifU'] = false;
    }
    header("location:../appLPJ.php");
}