<div class="container">
<h1 class="text-center">Tambah data</h1>

<form action="input-datadiri-tambah.php" method="POST">
    <label for="kodebarang"> Kode Barang :</label><br>
    <input class="form-control" type="number" name="kodebarang" placeholder="Ex. 0122" /><br>

    <label for="tanggal"> Tanggal :</label><br>
    <input class="form-control" type="date" name="tanggal" placeholder="Ex. 22-09-2022" /><br>

    <label for="pembeli"> Pembeli :</label><br>
    <input class="form-control" type="text" name="pembeli" placeholder="Ex. Udin"/><br>

    <label for="namabarang"> Nama Barang :</label><br>
    <input class="form-control" type="text" name="namabarang" placeholder="Ex. Sosis Kanzler" /><br>

    <label for="qty"> qty :</label><br>
    <input class="form-control" type="number" name="qty" placeholder="Ex. 10" /><br>

    <label for="harga_beli"> Harga Beli :</label><br>
    <input class="form-control" type="number" name="harga_beli" placeholder="Ex. Rp20.000" /><br>

    <label for="harga_jual"> Harga Jual :</label><br>
    <input class="form-control" type="number" name="harga_jual" placeholder="Ex. Rp30.000" /><br>
    
    <input class="btn btn-sm btn-primary" type="submit" name="simpan" value="simpan " /><br>
    <a class="btn btn-sm btn-danger" href="input-datadiri.php">Kembali</a>
</form>
</div>

<?php 
    include ('./input-config.php');
    if ($_SESSION["login"] != TRUE) {
    header('location:login.php');
    }

    if ($_SESSION["role"] != "admin") {
    echo "
    <script>
        alert('akses tidak diberikan, kamu bukan admin');
        window.location = 'input-datadiri.php';
        </script>
        ";

    }



    if( isset($_POST["simpan"])) {
        $kodebarang = $_POST["kodebarang"];
        $tanggal = $_POST["tanggal"];
        $pembeli = $_POST["pembeli"];
        $namabarang = $_POST["namabarang"];
        $qty = $_POST["qty"];
        $harga_beli = $_POST["harga_beli"];
        $harga_jual = $_POST["harga_jual"];

        // CREATE - menambahkan data ke database
        $query = "
            INSERT INTO transaksi VALUES
            ('$kodebarang','$tanggal','$pembeli','$namabarang','$qty','$harga_beli','$harga_jual');
        ";

       
        $insert = mysqli_query($mysqli, $query);
        if ($insert) {
            echo "
                <script>
                    alert('berhasil ditambahkan');
                    window.location='input-datadiri.php';
                </script>
            ";
        }   
        
        
        
    }
?>