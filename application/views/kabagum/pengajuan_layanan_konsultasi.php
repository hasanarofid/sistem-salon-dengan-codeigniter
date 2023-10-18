<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info"><?= $judul ?></h6>
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
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($get_all_pengajuan_layanan_konsultasi as $row) : ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->no_tiket; ?></td>
                                <td><?php if (!$row->nama_pengusul) {
                                        echo $row->nama_pt;
                                    } else {
                                        echo $row->nama_pengusul;
                                    } ?></td>
                                <td><?= $row->nama_sp; ?></td>
                                <td>
                                    <?php
                                    if ($row->id_status_layanan == "1f7e6gj") {
                                        $color = "badge-primary";
                                    } else if ($row->id_status_layanan == "6d5e4s5" || $row->id_status_layanan == "7d9aj39") {
                                        $color = "badge-danger";
                                    } else if ($row->id_status_layanan == "9f5s9ef") {
                                        $color = "badge-success";
                                    } else if ($row->id_status_layanan == "3f9j9h7s" || $row->id_status_layanan == "3h7g4h7" || $row->id_status_layanan == "4f4s8rs") {
                                        $color = "badge-info";
                                    }
                                    ?>
                                    <span class="badge <?= $color ?>"><?= $row->nama_status_layanan; ?></span>
                                </td>
                                <td style="min-width: 100px;">
                                    <a href="<?php echo base_url('kabagum/detail_pengajuan_layanan_konsultasi/' . $row->id_layanan); ?>" class=" btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>