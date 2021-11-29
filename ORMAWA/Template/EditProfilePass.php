<?php 
    if (isset($_POST['submit1'])) {
        $NIDN = $_POST['NIDN'];
        $NAMA = $_POST['NAMA'];
              $sql = "UPDATE pengurus_ormawa set NAMA_KETUA = '$NAMA' where USERNAME_KETUA = '$NIDN'";
              $result = mysqli_query($koneksi, $sql);
              if ($result) {
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
  var_dump($_POST['pass1']);
  var_dump($_POST['pass']);
    if (password_verify($_POST['pass1'],$_POST['pass']) ) {
        if ($_POST['passB'] == $_POST['passBK']) {
            $NIDN = $_POST['NIDN'];
            $password = password_hash($_POST['passB'],PASSWORD_DEFAULT);
            $sql = "UPDATE pengurus_ormawa set  PASSWORD_KETUA = '$password' where USERNAME_KETUA = '$NIDN'";
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