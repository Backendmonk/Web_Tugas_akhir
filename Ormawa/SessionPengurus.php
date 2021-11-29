<?php   

            include "../inc/koneksi.php";
            session_start();
            //cek apakah session user masih berjalan atau tidak 
            if(!isset($_SESSION['userweb_orm'])){
                header("location:login/index.php");
            }
            
            $id = mysqli_query($koneksi,"SELECT * FROM `pengurus_ormawa` WHERE `USERNAME_KETUA` = '$_SESSION[userweb_orm]' ");
            $array = mysqli_fetch_array($id);



?>