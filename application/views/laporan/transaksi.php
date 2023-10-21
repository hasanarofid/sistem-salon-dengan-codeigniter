<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script>
  window.print();
</script>
<style type="text/css">
 body{
  -webkit-print-color-adjust:exact;
}
</style>

<div style='mso-element:para-border-div;border:none;border-top:solid windowtext 3.0pt;
padding:1.0pt 0cm 0cm 0cm'>
<p>
 
 <?php 

function rupiah($angka){
  
  $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
  return $hasil_rupiah;

}
?>
<center><font size="+1"><?= $judul; ?></font></center> <br />
 <table class="w3-table-all">
                                   <thead>
                                        <tr class="w3-black" >
                                          
                                            <th>No</th>
                <th>No Pesanan</th>
                <th>Tanggal Transaksi</th>
                <th>Tanggal Booking</th>
                <th>Nama Service</th>
                <th>Biaya</th>
                <th>Durasi</th>
               
         
              </tr>
            </thead>

            <tbody>

              <?php
              $no = 1;
              $total=0;
              foreach ($dt_transaksi as $d) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->no_transaksi; ?></td>
                  <td><?= $d->tgl_transaksi; ?></td>
                  <td><?= $d->tgl_booking; ?></td>
                  <td><?= $d->nama_service; ?></td>
                  <td><?= rupiah($biaya=$d->biaya) ?></td>
                  <td><?= $d->durasi; ?></td>
                      <?php  $total=$total+$biaya; ?>
                    </tr>
                                             <?php endforeach; ?>
                                            
                                            <tr>
                                              <td colspan="5" align="right">Total</td>
                                              <td><?= rupiah($total); ?></td>
                                            </tr>
                                    </tbody>


                                </table>
                               
<br />
