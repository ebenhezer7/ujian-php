<?php
    include('./input-config.php');
    echo "<div class='container'>"; 
    echo "Selamat Datang " .$_SESSION["username"] . "<br>";
    echo "Anda Sebagai : -" .$_SESSION["role"] . "<br>";
    echo "<hr>";
    echo "<a class='btn btn-sm btn-secondary' href='logout.php'>Logout</a>";
    echo "<hr>";
    echo "<a class='btn btn-sm btn-primary' href='input-datadiri-tambah.php'>Tambah Data</a>&nbsp; -&nbsp;";
    echo "<a class='btn btn-sm btn-warning' href='input-datadiri-pdf.php'>Cetak PDF</a>";
    echo "<hr>";

    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, " SELECT * FROM transaksi ");
    while($row = mysqli_fetch_array($data)) {
        $total_harga_beli=($row["qty"]*$row["harga_beli"]);
        $total_harga_jual=($row["qty"]*$row["harga_jual"]);
        $laba=($total_harga_jual-$total_harga_beli);
        $tabledata .= "
            <tr>
                <td>".$row["kodebarang"]."</td>
                <td>".$row["tanggal"]."</td>
                <td>".$row["pembeli"]."</td>
                <td>".$row["namabarang"]."</td>
                <td>".$row["qty"]."</td>
                <td>".$row["harga_beli"]."</td>
                <td>".$row["harga_jual"]."</td>
                <td>".$total_harga_beli."</td>
                <td>".$total_harga_jual."</td>
                <td>".$laba."</td>
                <td>
                    <a class='btn btn-sm btn-success' href='input-datadiri-edit.php?kodebarang=".$row["kodebarang"]."'>Edit</a>
                    &nbsp;-&nbsp;
                    <a class='btn btn-sm btn-danger' href='input-datadiri-hapus.php?kodebarang=".$row["kodebarang"]."' 
                    onclick='return confirm(\"Yakin Mau Dihapus Dek ?\");'>Hapus</a>
                </td>
            </tr>
        ";
        $no++;
    }

    echo "
        <table class='table table-bordered table-striped table-danger'>
            <tr>
                <th>kodebarang</th>
                <th>tanggal</th>
                <th>pembeli</th>
                <th>namabarang</th>
                <th>qty</th>
                <th>harga_beli</th>
                <th>harga_jual</th>
                <th>total harga beli</th>
                <th>total harga jual</th>
                <th>laba</th>
                <th>Aksi</th>
            </tr>
            $tabledata
        </table>
    ";
?>