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
                <th>Nama Karyawan</th>
                <th>JK</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>No Telp</th>
            
              </tr>
            </thead>

            <tbody>

              <?php
              $no = 1;
              foreach ($dt_karyawan as $d) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->nama_karyawan; ?></td>
                  <td><?= $d->jk; ?></td>
                  <td><?= $d->tempat_lahir; ?></td>
                  <td><?= $d->tgl_lahir; ?></td>
                  <td><?= $d->alamat; ?></td>
                  <td><?= $d->no_telp; ?></td>
                        
                    </tr>
                                             <?php endforeach; ?>
                                    </tbody>
                                </table>
<br />
