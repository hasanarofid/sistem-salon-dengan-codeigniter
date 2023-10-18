<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Layanan LLDIKTI XI</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Tiket</th>
                            <th>Nama Pengirim</th>
                            <th>Standar</th>
                            <th>Bagian</th>
                            <th>Pegawai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_layanan as $dt) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dt->no_tiket; ?></td>
                                <td><?php if (!$dt->nama_pengusul) {
                                        echo $dt->nama_pt;
                                    } else {
                                        echo $dt->nama_pengusul;
                                    } ?></td>
                                <td><?= $dt->nama_sp; ?></td>
                                <td><?= $dt->nama_bagian; ?></td>
                                <td><?= $dt->nama_pegawai; ?></td>
                                <td>
                                    <?php
                                    if ($dt->id_status_layanan == "1f7e6gj") {
                                        $color = "badge-primary";
                                    } else if ($dt->id_status_layanan == "6d5e4s5" || $dt->id_status_layanan == "7d9aj39") {
                                        $color = "badge-danger";
                                    } else if ($dt->id_status_layanan == "9f5s9ef") {
                                        $color = "badge-success";
                                    } else if ($dt->id_status_layanan == "3f9j9h7s" || $dt->id_status_layanan == "3h7g4h7" || $dt->id_status_layanan == "4f4s8rs") {
                                        $color = "badge-info";
                                    }
                                    ?>
                                    <span class="badge <?= $color ?>"><?= $dt->nama_status_layanan; ?></span>
                                </td>
                                <td style="min-width: 100px;">
                                    <a href="<?php echo base_url('kepala/detail/' . $dt->id_layanan); ?>" class=" btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>