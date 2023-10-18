<!-- DataTales Example -->
<div class="container">
 <div class="row justify-content-center">

     <div class="col-xl-10 col-lg-12 col-md-12">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Standar Layanan</h6>
    </div>
    <div class="card-body ">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama SP</th>
                        <th>Produk</th>
                        <th>PJ</th>
                        <th>Jangka Waktu</th>
                        <th>Jenis Layanan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_info_sp as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nama_sp; ?></td>
                        <td><?= $d->produk; ?></td>
                        <td><?= $d->nama_bagian; ?></td>
                        <td><?= $d->jangka_waktu; ?></td>
                        <td><?= $d->jenis_layanan; ?></td>
                        <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Lihat" 
href="<?= base_url('umum/view_detail_sp/'.$d->id_sp);?>" 
><i
class="fas fa-eye fa-sm"></i></a> </div></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>




</div>
</div>
</div>