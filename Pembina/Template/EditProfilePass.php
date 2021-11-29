<?php 
    if (isset($_POST['submit1'])) {
        $NIDN = $_POST['NIDN'];
        $NAMA = $_POST['NAMA'];
        $Alamat = $_POST['Alamat'];
        $No = $_POST['No'];
              $sql = "UPDATE pembina set NAMA_PEMBINA = '$NAMA',  ALAMAT_PEMBINA = '$Alamat', NO_TELP_PEMBINA = '$No' where NIDN = '$NIDN'";
              $result = mysqli_query($koneksi, $sql);
              if ($result) {
                // mengosongkan post
                $_POST['NAMA']="";
                $_POST['Alamat']="";
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
    // CEK pass asli dengan inputan
    if (password_verify($_POST['pass1'],$_POST['pass']) ) {
      // cek password baru dan konfirmasi password
        if ($_POST['passB'] == $_POST['passBK']) {
            $NIDN = $_POST['NIDN'];
            $password = password_hash($_POST['passB'],PASSWORD_DEFAULT);
            $sql = "UPDATE pembina set  PASSOWRD_PEMBINA = '$password' where NIDN = '$NIDN'";
            $result = mysqli_query($koneksi, $sql);
            if ($result) {
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