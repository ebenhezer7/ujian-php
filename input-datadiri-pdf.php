<?php
    require_once __DIR__ . './vendor/autoload.php' ;

    $mpdf = new \Mpdf\Mpdf();
    include ('./Input-config.php');
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM transaksi ");
    while ($row = mysqli_fetch_array($data)){
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
        ";
        $no++;
    }
    $waktu_cetak = date('d M Y - H:i:s');
    $table =  "
            <h1>Laporan Data Diri</h1>
            <h6>waktu cetak : $waktu_cetak</h6>
          <table cellpadding=5 border=1 cellspacing=0>
                <tr>
                   <th>kode barang</th> 
                   <th>tanggal</th> 
                   <th>pembeli</th> 
                   <th>nama barang</th>  
                   <th>qty</th>  
                   <th>harga beli</th>  
                   <th>harga jual</th>  
                   <th>total harga beli</th>  
                   <th>total harga jua</th>  
                   <th>laba</th>  
                </tr>
                $tabledata
          </table>
    ";

    $mpdf->WriteHTML("$table");
    $mpdf->Output();

?>