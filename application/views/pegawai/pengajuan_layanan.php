<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

    </div>


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
                            <th>No Tiket</th>
                            <th>Nama Pengusul</th>
                            <th>Nama Layanan</th>
                            <th>Jangka Waktu</th>
                            <th>Waktu Proses</th>
                            <th>Status Layanan</th>
                            <th width="100px">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($get_all_pengajuan_layanan as $row) : ?>

                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->no_tiket; ?></td>
                                <td>
                                    <?php
                                    if($row->jenis_layanan == "PTS"){
                                        echo $row->nama_pt;
                                    }else if($row->jenis_layanan == "Umum"){
                                        echo $row->nama_pengusul;
                                    }
                                    ?>

                                </td>
                                <td><?= $row->nama_sp; ?></td>
                                <td><?= $jangka_waktu=$row->jangka_waktu; ?> Hari</td>
                                <td>
                                <?php $hitung = $this->m_admin->hitung_proses($row->tgl_mulai); ?>
                                <?php if ($row->id_status_layanan == "4f4s8rs") :?>
                             
                              <?=   $total=$hitung->row()->total_hari; ?>  Hari 
                                 
                              <?php endif; ?>

                                 
                                   </td>
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
                                <td>
                                    <div class="text-center">

                                        <a class=" btn btn-sm btn-info shadow-sm" data-tooltip="tooltip" data-bs-placement="top" title="View" href="<?php echo base_url('pegawai/detail_pengajuan_layanan/' . $row->no_tiket); ?>">
                                            <i class="fas fa-eye fa-sm"></i>
                                        </a>
                                        <?php if ($row->id_status_layanan == "1f7e6gj") { ?>
                                            <a class=" btn btn-sm btn-danger shadow-sm" data-tooltip="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('anda yakin ingin menghapus data ini')" href="<?php echo base_url('pts/hapus_pengajuan_layanan/' . $row->id_layanan); ?>">
                                                <i class="fas fa-trash fa-sm"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

