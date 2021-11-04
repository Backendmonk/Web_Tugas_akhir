<?php   

            include "../inc/koneksi.php";
            session_start();
            //cek apakah session user masih berjalan atau tidak 
            if(!isset($_SESSION['userweb'])){
                header("location:login/login-kemahasiswaan.php");
            }
            
            $id = mysqli_query($koneksi,"SELECT * FROM `kemahasiswaan` WHERE `NIDN_KEMAHASISWAAN` = '$_SESSION[userweb]' ");
            $array = mysqli_fetch_array($id);



?>