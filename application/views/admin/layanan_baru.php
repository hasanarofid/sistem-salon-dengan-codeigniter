<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Layanan Baru</h6>
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
                            <th>Jangka Waktu</th>
                            <th>Waktu Proses</th>
                            <th>Bagian</th>
                            <th>Pegawai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dt_layanan_baru as $d) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d->no_tiket; ?></td>
                                <td><?php if (!$d->nama_pengusul) {
                                        echo $d->nama_pt;
                                    } else {
                                        echo $d->nama_pengusul;
                                    } ?></td>
                                <td><?= $d->nama_sp; ?></td>
                                 <td><?= $jangka_waktu=$d->jangka_waktu; ?> Hari</td>
                                <td>
                                <?php $hitung = $this->m_admin->hitung_proses($d->tgl_mulai); ?>
                               
                              <?php if ($d->id_status_layanan == "4f4s8rs") :?>
                             
                              <?=   $total=$hitung->row()->total_hari; ?>  Hari 
                                 
                              <?php endif; ?>
                          
                                 
                              

                                 
                                   </td>
                                <td><?= $d->nama_bagian; ?></td>
                                <td><?= $d->nama_pegawai; ?></td>
                                <td>
                                    <?php
                                    if ($d->id_status_layanan == "1f7e6gj") {
                                        $color = "badge-primary";
                                    } else if ($d->id_status_layanan == "6d5e4s5" || $d->id_status_layanan == "7d9aj39") {
                                        $color = "badge-danger";
                                    } else if ($d->id_status_layanan == "9f5s9ef") {
                                        $color = "badge-success";
                                    } else if ($d->id_status_layanan == "3f9j9h7s" || $d->id_status_layanan == "3h7g4h7" || $d->id_status_layanan == "4f4s8rs") {
                                        $color = "badge-info";
                                    }
                                    ?>
                                    <span class="badge <?= $color ?>"><?= $d->nama_status_layanan; ?></span>
                                </td>
                        <td><div align="center"><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_layanan/'.$d->id_layanan);?>" 
><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="View" 
href="<?php echo base_url('admin/view_layanan/'.$d->id_layanan);?>" 
><i class="fas fa-eye fa-sm"></i></a></div></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>





