<?php
      include ('./input-config.php');
      if( $_SESSION["login"] !=TRUE) {
            header('location:login.php');
      }
      if( $_SESSION["role"] !="admin") {
            echo "
                  <script>
                        alert('Akses tidak diberikan, kamu bukan siswa');
                        window.location='input-datadiri.php';
                  </script>
            ";
      }

      if ( isset($_GET["kodebarang"]) && $_SESSION["role"] =="admin" ){
            $kodebarang = $_GET["kodebarang"];

            $query = "
                  DELETE FROM transaksi
                  WHERE kodebarang = '$kodebarang';
            ";
            
            $delete = mysqli_query($mysqli, $query);

            if($delete){
                  echo "
                        <script>
                        alert('Data berhasil dihapus');
                        window.location='input-datadiri.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                        window.location='input-datadiri.php';
                        </script>
                  ";
            }
      }
?>