<?php
include '../../inc/koneksi.php';

if (isset($_POST['ApLpj'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $app = true;
    $sql = "INSERT INTO `applpj` ( `idlpj`, `nidn`, `approve`) VALUES ('$idp','$nidn', '$app' )";
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
    $revisi = $_POST['re'];
    $y = mysqli_query($koneksi,"INSERT INTO `applpj( `idlpj`, `nidn`, `approve`, revisi) VALUES ('$idp','$nidn', 0, '$revisi' )");
    session_start();
    if ($y) {
      $_SESSION['notifU'] = true;
    } else {
      $_SESSION['notifU'] = false;
    }
    header("location:../appLPJ.php");
}