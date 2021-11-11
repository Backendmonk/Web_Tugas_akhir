<?php   

            include "../inc/koneksi.php";
            session_start();
            //cek apakah session user masih berjalan atau tidak 
            if(!isset($_SESSION['userweb_wkiii'])){
                header("location:login/login.php");
            }
            
            $id = mysqli_query($koneksi,"SELECT * FROM `wkiii` WHERE `NIDN_WKIII` = '$_SESSION[userweb_wkiii]' ");
            $array = mysqli_fetch_array($id);



?>