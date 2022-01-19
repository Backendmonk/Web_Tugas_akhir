<?php 
include '../../inc/koneksi.php';
      if(isset($_POST['ajukan'])){
        $idk = $_POST['idk'];
        $qdk = mysqli_query($koneksi,"SELECT nama_kegiatan from approval_pernyataan_kegiatan where id_pernyatan = '$idk'");
        $ddk = mysqli_fetch_row($qdk); 
        $nk = $ddk[0];
         // Bukti Kegiatan
         $filename_bk = $_FILES['bk']['name'];
         $ext_bk = pathinfo($filename_bk, PATHINFO_EXTENSION);
         $ekstensi_bk = array('pdf');
         session_start();
             if (!in_array($ext_bk,$ekstensi_bk)) {
             $_SESSION['bk'] = true;
             header("location:../BuktiKegiatan.php");
             } else {
             $_SESSION['bk'] = false;
             }
         // ttpp file
         move_uploaded_file($_FILES['bk']['tmp_name'], '../f_bukti/'.time().'_'.$filename_bk);
         $bk = time().'_'.$filename_bk;
          $qbkm = mysqli_query($koneksi, "SELECT id from bukti_kegiatan_mahasiswa where 
          id_kegiatan = '$idk' ");
          $cek = mysqli_num_rows($qbkm);
          if ($cek) {
            $sql = "UPDATE bukti_kegiatan_mahasiswa set bukti = '$bk' where id_kegiatan = '$idk'";
          }else {
            $sql = "INSERT INTO `bukti_kegiatan_mahasiswa`(  `id_kegiatan`, `nama_kegiatan`, `bukti`) VALUES ('$idk','$nk','$bk')";
          }
          //insert query
          $ins = mysqli_query($koneksi,$sql);
            
          if ($ins) {
            $_SESSION['ulpj'] = true;
          }else {
            $_SESSION['ulpj'] = false;
          }
          header("location:../BuktiKegiatan.php");
                }
        
      if(isset($_POST['edit'])){
        $id = $_POST['id'];

         // Bukti Kegiatan
         $filename_bk = $_FILES['bk']['name'];
         $ext_bk = pathinfo($filename_bk, PATHINFO_EXTENSION);
         $ekstensi_bk = array('pdf');
         session_start();
             if (!in_array($ext_bk,$ekstensi_bk)) {
             $_SESSION['bk'] = true;
             header("location:../BuktiKegiatan.php");
             } else {
             $_SESSION['bk'] = false;
             }
         // ttpp file
         move_uploaded_file($_FILES['bk']['tmp_name'], '../f_bukti/'.time().'_'.$filename_bk);
         $bk = time().'_'.$filename_bk;
         $sqlLPJ = "UPDATE bukti_kegiatan_mahasiswa set bukti = '$bk' where id = '$id'";
         var_dump($sqlLPJ);
         mysqli_query($koneksi,"UPDATE appbk SET 
         approve = NULL WHERE idbk = '$id'");
         // insert query
          $ins = mysqli_query($koneksi,$sqlLPJ);

          if ($ins) {
            $_SESSION['ulpj'] = true;
          }else {
            $_SESSION['ulpj'] = false;
          }
          header("location:../BuktiKegiatan.php");
                }
        
      

?>