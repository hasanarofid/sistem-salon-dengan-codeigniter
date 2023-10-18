  <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Kritik, Saran dan Masukan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kritik, Saran dan Masukan</th>
                
              </tr>
            </thead>

            <tbody>

              <?php
              $no = 1;
              foreach ($dt_pengaduan as $d) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->tgl_pengaduan; ?></td>
                  <td><?= $d->pengaduan; ?></td>
                  
                 
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>