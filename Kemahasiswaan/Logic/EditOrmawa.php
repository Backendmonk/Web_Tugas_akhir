<?php if (isset($_POST['TambahKetua'])) {
    $id = $_POST['id'];
    $q = mysqli_query($koneksi,"SELECT * FROM `kemahasiswaan` where `NIDN_KEMAHASISWAAN` = '$nidn' ");
    $rows = mysqli_num_rows($q);
    $NAMA = $_POST['namaOr'];
    $NIDN =$_POST['NIDN'];
     $sql = "INSERT INTO ormawa (NAMA_ORMAWA, NIDN,ID_ORMAWA)
     VALUES ('$NAMA', '$NIDN','$id')";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        $_POST['namaOr']="";
              $_POST['id']="";
                $_POST['NIDN'] = "";
                ?>
                <script>
                  Swal.fire({
                  icon: 'success',
                  title: 'success',
                  text: 'tambah ormawa berhasil',
                  
                  })
              </script>
             
            <?php
    } else {
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'tambah ormawa gagal',
        
        })
      </script>
      <?php
    }
    
} 
?>