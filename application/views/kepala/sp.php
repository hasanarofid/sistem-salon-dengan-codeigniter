  <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data sp Layanan</h6>
      </div>
      <div class="card-body">
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
                <th>Status</th>
                <th>Detail</th>
              </tr>
            </thead>

            <tbody>

              <?php
              $no = 1;
              foreach ($dt_sp as $d) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->nama_sp; ?></td>
                  <td><?= $d->produk; ?></td>
                  <td><?= $d->nama_bagian; ?></td>
                  <td><?= $d->jangka_waktu; ?></td>
                  <td><?= $d->jenis_layanan; ?></td>
                  <td><?= $d->status_sp; ?></td>
                  <td>
                    <div align="center"><a class=" btn btn-sm btn-info shadow-sm" data-tooltip="tooltip" data-bs-placement="top" title="Tambah" href="<?php echo base_url('kepala/detail_sp/' . $d->id_sp); ?>"><i class="fas fa-plus-circle fa-sm"></i></a> </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>