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
    $cek = mysqli_query($koneksi,"SELECT ID_APPROVAL FROM proposal WHERE ID_PENGAJUAN = $idp");
    if ($cek) {
       $data = mysqli_fetch_array($cek);
       $idaporve = $data["ID_APPROVAl"];
      $qApPro = mysqli_query($koneksi, "UPDATE approval_proposal set LAPORAN_PROPOSAL = '$proposal' where ID_APPROVAL = '$idaporve')");
      $qPro = true;
    } else {
      $qApPro = mysqli_query($koneksi, "INSERT INTO approval_proposal (LAPORAN_PROPOSAL,ID_APPROVAL)
      VALUES ('$proposal','$id')");
      $qPro = mysqli_query($koneksi, "INSERT INTO proposal (ID_APPROVAL) VALUES ('$id')");
    }
    
   
    if ($qApPro AND $qPro) {
      
    } else {
      echo "no";
    }
    
 
 }

?>