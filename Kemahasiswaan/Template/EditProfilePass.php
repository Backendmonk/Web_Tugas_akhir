<?php 
    if (isset($_POST['submit1'])) {
        $NIDN = $_POST['NIDN'];
        $NAMA = $_POST['NAMA'];
        $Jabatan = $_POST['Jabatan'];
              $sql = "UPDATE kemahasiswaan set NAMA_KEMAHASISWAAN = '$NAMA',  JABATAN_kEMAHASISWAAN = '$Jabatan' where NIDN_KEMAHASISWAAN = '$NIDN'";
              $result = mysqli_query($koneksi, $sql);
              if ($result) {
                $_POST['NAMA']="";
                $_POST['Jabatan']="";
                  $_POST['password'] = "";
                  ?>
                  <script>
                    Swal.fire({
                    icon: 'success',
                    title: 'success',
                    text: 'Ubah Profile berhasil',
                    
                    })
                </script>
               
              <?php
              } else {
                ?>
                <script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'ubah profile gagal',
                
                })
              </script>
              <?php
              }
         
            ?>
          
          <?php
          
      
      }
      
if (isset($_POST['submit2'])) {
    if (password_verify($_POST['pass1'],$_POST['pass']) ) {
        if ($_POST['passB'] == $_POST['passBK']) {
            $NIDN = $_POST['NIDN'];
            $password = password_hash($_POST['passB'],PASSWORD_DEFAULT);
            $sql = "UPDATE kemahasiswaan set  PASSWORD_kEMAHASISWAAN = '$password' where NIDN_KEMAHASISWAAN = '$NIDN'";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
              $_POST['NAMA']="";
              $_POST['Jabatan']="";
                $_POST['password'] = "";
                ?>
                <script>
                  Swal.fire({
                  icon: 'success',
                  title: 'success',
                  text: 'Ubah Password berhasil',
                  
                  })
              </script>
             
            <?php
            } else {
              ?>
              <script>
              Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'ubah Password gagal',
              
              })
            </script>
            <?php
            }
        }else{
            ?>
            <script>
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'password baru tidak sama dengan password konfirmasi',
            
            })
          </script>
          <?php
        }
       
    }else{
        ?>
        <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'password Salah',
        
        })
      </script>
      <?php
      }
    
}
?>