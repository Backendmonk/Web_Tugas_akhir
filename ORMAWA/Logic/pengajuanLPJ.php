<?php 
include '../../inc/koneksi.php';
      if(isset($_POST['ajukan'])){
        $idk = $_POST['nk'];
        $namaOr = $_POST['no'];
        $InamaOr = $_POST['ino'];
        $pdln = $_POST['pdln'];
        $penca = $_POST['penca'];
        $ttp = $_POST['ttp'];

        $qdk = mysqli_query($koneksi,"SELECT nama_kegiatan from pengajuan_kegiatan_mhs where id = '$idk'");
        $ddk = mysqli_fetch_row($qdk); 

        $nk = $ddk[0];
       // konsep kegiatan
        $ran_Num_pk = rand();
        $filename_pk = $_FILES['pk']['name'];
        $ext_pk = pathinfo($filename_pk, PATHINFO_EXTENSION);
        $ekstensi_pk = array('doc','docx','pdf');
        session_start();
            if (!in_array($ext_pk,$ekstensi_pk)) {
            $_SESSION['pk'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['pk'] = false;
            }
        // ttpp file
        move_uploaded_file($_FILES['pk']['tmp_name'], '../f_lpj/'.$ran_Num_pk.'_'.$filename_pk);
        $pk = $ran_Num_pk.'_'.$filename_pk;

        // sub kegiatan
        $ran_Num_kepan = rand();
        $filename_kepan = $_FILES['kepan']['name'];
        $ext_kepan = pathinfo($filename_kepan, PATHINFO_EXTENSION);
        $ekstensi_kepan = array('doc','docx','pdf');
        if (!in_array($ext_kepan,$ekstensi_kepan)) {
            $_SESSION['kepan'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['kepan'] = false;
            }
        
            move_uploaded_file($_FILES['kepan']['tmp_name'], '../f_lpj/'.$ran_Num_kepan.'_'.$filename_kepan);
            $kepan = $ran_Num_kepan.'_'.$filename_kepan;

            
        // latar belakang
        $ran_Num_peser = rand();
        $filename_peser= $_FILES['peser']['name'];
        $ext_peser = pathinfo($filename_peser, PATHINFO_EXTENSION);
        $ekstensi_peser = array('doc','docx','pdf');
        if (!in_array($ext_peser,$ekstensi_peser)) {
            $_SESSION['peser'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['peser'] = false;
            }
            move_uploaded_file($_FILES['peser']['tmp_name'], '../f_lpj/'.$ran_Num_peser.'_'.$filename_peser);
            $peser = $ran_Num_peser.'_'.$filename_peser;

            

        //tujuan
        $ran_Num_rabin = rand();
        $filename_rabin = $_FILES['rabin']['name'];
        $ext_rabin = pathinfo($filename_rabin, PATHINFO_EXTENSION);
        $ekstensi_rabin = array('doc','docx','pdf');
        if (!in_array($ext_rabin,$ekstensi_rabin)) {
            $_SESSION['rabin'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['rabin'] = false;
            }
            move_uploaded_file($_FILES['rabin']['tmp_name'], '../f_lpj/'.$ran_Num_rabin .'_'.$filename_rabin );
         $rabin = $ran_Num_rabin .'_'.$filename_rabin ;


        //tujuan
        $ran_Num_rabout = rand();
        $filename_rabout = $_FILES['rabout']['name'];
        $ext_rabout = pathinfo($filename_rabout, PATHINFO_EXTENSION);
        $ekstensi_rabout = array('doc','docx','pdf');
        if (!in_array($ext_rabout,$ekstensi_rabout)) {
            $_SESSION['rabout'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['rabout'] = false;
            }
        move_uploaded_file($_FILES['rabout']['tmp_name'], '../f_lpj/'.$ran_Num_rabout .'_'.$filename_rabout );
         $rabout = $ran_Num_rabout .'_'.$filename_rabout ;
            
        //rp
        $ran_Num_rp  = rand();
        $filename_rp = $_FILES['rp']['name'];
        $ext_rp  = pathinfo($filename_rp, PATHINFO_EXTENSION);
        $ekstensi_rp  = array('doc','docx','pdf');
        if (!in_array($ext_rp,$ekstensi_rp)) {
            $_SESSION['rp'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['rp'] = false;
            }
            move_uploaded_file($_FILES['rp']['tmp_name'], '../f_lpj/'.$ran_Num_rp .'_'.$filename_rp );
            $rp = $ran_Num_rp .'_'.$filename_rp ;
        //timeline
       
      
        //rab
        $ran_Num_bp = rand();
        $filename_bp = $_FILES['bp']['name'];
        $ext_bp = pathinfo($filename_bp, PATHINFO_EXTENSION);
        $ekstensi_bp = array('doc','docx','pdf');
        if (!in_array($ext_bp,$ekstensi_bp)) {
            $_SESSION['bp'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['bp'] = false;
            }
            move_uploaded_file($_FILES['bp']['tmp_name'], '../f_lpj/'.$ran_Num_bp .'_'.$filename_bp );
         $bp = $ran_Num_bp .'_'.$filename_bp ;
        //rab
        $ran_Num_ba = rand();
        $filename_ba = $_FILES['ba']['name'];
        $ext_ba = pathinfo($filename_ba, PATHINFO_EXTENSION);
        $ekstensi_ba = array('doc','docx','pdf');
        if (!in_array($ext_ba,$ekstensi_ba)) {
            $_SESSION['ba'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['ba'] = false;
            }
            move_uploaded_file($_FILES['ba']['tmp_name'], '../f_lpj/'.$ran_Num_ba .'_'.$filename_ba );
            $ba = $ran_Num_ba .'_'.$filename_ba ;
        //rab
        $ran_Num_absen = rand();
        $filename_absen = $_FILES['absen']['name'];
        $ext_absen = pathinfo($filename_absen, PATHINFO_EXTENSION);
        $ekstensi_absen = array('doc','docx','pdf');
        if (!in_array($ext_absen,$ekstensi_absen)) {
            $_SESSION['absen'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['absen'] = false;
            }
            move_uploaded_file($_FILES['absen']['tmp_name'], '../f_lpj/'.$ran_Num_absen .'_'.$filename_absen );
            $absen = $ran_Num_absen .'_'.$filename_absen ;

        //rab
        $ran_Num_nr = rand();
        $filename_nr = $_FILES['nr']['name'];
        $ext_nr = pathinfo($filename_nr, PATHINFO_EXTENSION);
        $ekstensi_nr = array('doc','docx','pdf');
        if (!in_array($ext_nr,$ekstensi_nr)) {
            $_SESSION['nr'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['nr'] = false;
            }
            move_uploaded_file($_FILES['nr']['tmp_name'], '../f_lpj/'.$ran_Num_nr .'_'.$filename_nr );
            $nr = $ran_Num_nr .'_'.$filename_nr ;

        //rab
        $ran_Num_rpp = rand();
        $filename_rpp = $_FILES['rpp']['name'];
        $ext_rpp = pathinfo($filename_rpp, PATHINFO_EXTENSION);
        $ekstensi_rpp = array('doc','docx','pdf');
        if (!in_array($ext_rpp,$ekstensi_rpp)) {
            $_SESSION['rpp'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['rpp'] = false;
            }
            move_uploaded_file($_FILES['rpp']['tmp_name'], '../f_lpj/'.$ran_Num_rpp .'_'.$filename_rpp );
            $rpp = $ran_Num_rpp .'_'.$filename_rpp ;
        //rab
        $ran_Num_ds = rand();
        $filename_ds = $_FILES['ds']['name'];
        $ext_ds = pathinfo($filename_ds, PATHINFO_EXTENSION);
        $ekstensi_ds = array('doc','docx','pdf');
        if (!in_array($ext_ds,$ekstensi_ds)) {
            $_SESSION['ds'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['ds'] = false;
            }
            move_uploaded_file($_FILES['ds']['tmp_name'], '../f_lpj/'.$ran_Num_ds .'_'.$filename_ds );
         $ds = $ran_Num_ds .'_'.$filename_ds ;
        //rab
        $ran_Num_dk = rand();
        $filename_dk = $_FILES['dk']['name'];
        $ext_dk = pathinfo($filename_dk, PATHINFO_EXTENSION);
        $ekstensi_dk = array('doc','docx','pdf');
        if (!in_array($ext_dk,$ekstensi_dk)) {
            $_SESSION['dk'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['dk'] = false;
            }
            move_uploaded_file($_FILES['dk']['tmp_name'], '../f_lpj/'.$ran_Num_dk .'_'.$filename_dk );
         $dk = $ran_Num_dk .'_'.$filename_dk ;

        //rab
        $ran_Num_slpj = rand();
        $filename_slpj = $_FILES['slpj']['name'];
        $ext_slpj = pathinfo($filename_slpj, PATHINFO_EXTENSION);
        $ekstensi_slpj = array('doc','docx','pdf');
        if (!in_array($ext_slpj,$ekstensi_slpj)) {
            $_SESSION['slpj'] = true;
            header("location:../pengajuanLPJ.php");
            } else {
            $_SESSION['slpj'] = false;
            }
            move_uploaded_file($_FILES['slpj']['tmp_name'], '../f_lpj/'.$ran_Num_slpj .'_'.$filename_slpj );
         $slpj = $ran_Num_slpj .'_'.$filename_slpj ;

          //insert query
          $ins = mysqli_query($koneksi,"INSERT INTO `pengajuan_lpj`( `id_ormawa`, `nama_ormawa`, `id_pengajuan`, `nama_kegiatan`, `pendahuluan`, `pelaksanaan_kegaitan`, `kepanitiaan`, `peserta`, `pencapaian`, `rab_masukan`, `rab_pengeluaran`, `realisasi_anggaran`, `penutup`, `bukti_pembayaran`, `berita_acara`, `absensi`, `rapat`,`nilai_peserta`,`desain_sertifikat`,`dokumentasi`,`LPJ`) VALUES ('$InamaOr','$namaOr','$idk','$nk','$pdln','$pk','$kepan','$peser','$penca','$rabin','$rabout','$rp','$ttp','$bp','$ba','$absen','$nr','$rpp', '$ds', '$dk', '$slpj')");

          if ($ins) {
            $_SESSION['ulpj'] = true;
          }else {
            $_SESSION['ulpj'] = false;
          }
          header("location:../pengajuanLPJ.php");
                }
        
      
      

?>