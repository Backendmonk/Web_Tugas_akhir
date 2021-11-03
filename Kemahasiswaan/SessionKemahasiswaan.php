<?php   

            include "../inc/koneksi.php";
            session_start();
            //cek apakah session user masih berjalan atau tidak 
            if(!isset($_SESSION['userweb'])){
                header("location:login/login-kemahasiswaan.php");
            }



?>