<?php
if (isset($_GET["kodebarang"])) {
    $kodebarang = $_GET["kodebarang"];
    $check_kodebarang = "SELECT * FROM transaksi WHERE kodebarang = '$kodebarang'; ";
    include('./input-config.php');
    $query = mysqli_query($mysqli, $check_kodebarang);
    $row = mysqli_fetch_array($query);
}
?>
<div class="container">
    <h1>Edit data</h1>
    <form action="input-datadiri-edit.php" method="POST">
        <label for="kodebarang"> Kode Barang :</label><br>
        <input class="form-control" value="<?php echo $row["kodebarang"]; ?>" readonly type="number" name="kodebarang" placeholder="Ex. 12001142" /><br>

        <label for="tanggal"> tanggal :</label><br>
        <input class="form-control" value="<?php echo $row["tanggal"]; ?>" type="date" name="tanggal" placeholder="Ex. Firdaus" /><br>

        <label for="pembeli"> pembeli :</label><br>
        <input class="form-control" value="<?php echo $row["pembeli"]; ?>" type="text" name="pembeli" /><br>

        <label for="namabarang"> nama barang :</label><br>
        <input class="form-control" value="<?php echo $row["namabarang"]; ?>" type="text" name="namabarang" placeholder="Ex. 80.56" /><br>
        
        <label for="qty"> QTY :</label><br>
        <input class="form-control" value="<?php echo $row["qty"]; ?>" type="number" name="qty" placeholder="Ex. 80.56" /><br>
        
        <label for="harga_beli"> harga beli :</label><br>
        <input class="form-control" value="<?php echo $row["harga_beli"]; ?>" type="number" name="harga_beli" placeholder="Ex. 80.56" /><br>
        
        <label for="harga_jual"> harga jual :</label><br>
        <input class="form-control" value="<?php echo $row["harga_jual"]; ?>" type="number" name="harga_jual" placeholder="Ex. 80.56" /><br>
        
        <input class="btn btn-sm btn-primary" type="submit" name="simpan" value="simpan data" />
        <a class="btn btn-sm btn-danger" href="input-datadiri.php">Kembali</a>
    </form>
</div>
<?php
    if ($_SESSION["login"] != TRUE) {
        header('location:input-datadiri.php');
        }
    
        if ($_SESSION["role"] != "admin") {
        echo "
        <script>
            alert('akses tidak diberikan, kamu bukan admin');
            window.location = 'input-datadiri.php';
        </script>
        ";
    
    }
    



if (isset($_POST["simpan"])) {
    $kodebarang = $_POST["kodebarang"];
    $tanggal = $_POST["tanggal"];
    $pembeli = $_POST["pembeli"];
    $namabarang = $_POST["namabarang"];
    $qty = $_POST["qty"];
    $harga_beli = $_POST["harga_beli"];
    $harga_jual = $_POST["harga_jual"];
    
    // EDIT - Memperbarui Data
    $query = "
            UPDATE transakasi SET tanggal = '$tanggal',
            pembeli = '$pembeli',
            nama barang = '$namabarang'
            qty = '$qty'
            harga beli = '$harga_beli'
            harga jual = '$harga_jual'
            WHERE kodebarang = '$kodebarang';
        ";

    include('./input-config.php');
    $update = mysqli_query($mysqli, $query);

    if ($update) {
        echo "
                <script>
                alert('Data berhasil diperbaharui');
                window.location='input-datadiri.php';
                </script>
            ";
    } else {
        echo "
                <script>
                alert('Data gagal');
                window.location='input-datadiri-edit.php?kodebarang=$kodebarang';
                </script>
            ";
    }
}
?>