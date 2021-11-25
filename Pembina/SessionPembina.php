<?php   

            include "../inc/koneksi.php";
            session_start();
            //cek apakah session user masih berjalan atau tidak 
            if(!isset($_SESSION['userweb_Pemb'])){
                header("location:login");
            }
            
            $id = mysqli_query($koneksi,"SELECT * FROM `pembina` WHERE `NIDN` = '$_SESSION[userweb_Pemb]' ");
            $array = mysqli_fetch_array($id);



?>