<?php
include '../../inc/koneksi.php';



if (isset($_POST['Ap'])) {
    $nidn= $_POST['kema'];
    $idp = $_POST['idp'];
    $y = mysqli_query($koneksi,"UPDATE approval_proposal set NIDN_KEMAHASISWAAN ='$nidn', APPROVAL_PROPOSAL_KEMAHASISWAAN = 'Approve' where ID_APPROVAL = '$idp'");
    session_start();
    if ($y) {
      $_SESSION['notif'] = true;
    } else {
      $_SESSION['notif'] = false;
    }
    header("location:../Administrasi.php");
}


?>