<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

  </div>


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-info">Detail Syarat Standar Pelayanan</h6>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="nama_standar">Nama Standar</label>
        <input type="text" class="form-control" value="<?= $d->nama_sp; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="produk_pelayanan">Produk Pelayanan</label>
        <input type="text" class="form-control" value="<?= $d->produk; ?>" readonly>
      </div>

      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="produk_pelayanan">Penanggung Jawab</label>
            <input type="text" class="form-control" value="<?= $d->nama_bagian; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="produk_pelayanan">Jangka Waktu</label>
            <input type="text" class="form-control" value="<?= $d->jangka_waktu; ?>" readonly>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="produk_pelayanan">Jenis Layanan</label>
            <input type="text" class="form-control" value="<?= $d->jenis_layanan; ?>" readonly>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Syarat</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($dt_detail_sp as $c) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $c->nama_syarat; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>