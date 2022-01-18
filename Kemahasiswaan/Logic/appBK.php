<?php
include '../../inc/koneksi.php';

if (isset($_POST['ApLpj'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $komen = $_POST['komentar'];
    $app = true;
    $qcek = mysqli_query($koneksi, "SELECT id from appbk where idbk = '$idp'");
    $cek = mysqli_num_rows($qcek);

    if ($cek) {
        $sql = "UPDATE appbk set nidn ='$nidn', approve = '$app', catatan = '$komen' where idbk = '$idp'";
    } else {
        $sql = "INSERT INTO `appbk` ( `idbk`, `nidn`, `approve`, catatan) VALUES ('$idp','$nidn', '$app', '$komen' )";
    }
    $y = mysqli_query($koneksi,$sql);
    session_start();
    if ($y) {
      $_SESSION['notifA'] = true;
    } else {
      $_SESSION['notifA'] = false;
    }
    header("location:../appBK.php");
}

if (isset($_POST['UnLpj'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $app = false;
    $komen = $_POST['komentar'];
    $qcek = mysqli_query($koneksi, "SELECT id from appbk where idbk = '$idp'");
    $cek = mysqli_num_rows($qcek);

    if ($cek) {
        $sql = "UPDATE appbk set nidn ='$nidn', approve = '$app', catatan = '$komen' where idbk = '$idp'";
    } else {
        $sql = "INSERT INTO `appbk` ( `idbk`, `nidn`, `approve`, catatan) VALUES ('$idp','$nidn', '$app', '$komen' )";
    }
    $y = mysqli_query($koneksi,$sql);
    session_start();
    if ($y) {
      $_SESSION['notifU'] = true;
    } else {
      $_SESSION['notifU'] = false;
    }
    header("location:../appBK.php");
}