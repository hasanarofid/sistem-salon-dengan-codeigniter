<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
<a data-toggle="modal"
    data-target="#add" href="#" class=" btn btn-sm btn-info shadow-sm"><i
class="fas fa-sync fa-sm"></i>
Sync</a>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data PTS</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode PT</th>
                        <th>Nama PT</th>
                        <th>Provinsi</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Jenis PT</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_pts as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->kode_pt; ?></td>
                        <td><?= $d->nama_pt; ?></td>
                        <td><?= $d->provinsi; ?></td>
                        <td><?= $d->alamat; ?></td>
                        <td><?= $d->status_pt; ?></td>
                        <td><?= $d->jenis_pt; ?></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>




