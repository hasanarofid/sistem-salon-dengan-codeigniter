<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Layanan <?= $get_row_detail_layanan->no_tiket; ?></h1>

        <?php
        $status = $get_row_detail_layanan->id_status_layanan;
        ?>

        <?php
        $status = $get_row_detail_layanan->id_status_layanan;
        ?>
        <?php if ($status == '1f7e6gj') : ?>
            <button class=" btn btn-sm btn-info shadow-sm" onclick="kirim_tiket()"> <i class="fas fa-paper-plane fa-sm"></i> Kirim Tiket</button>
        <?php endif; ?>
        <?php if ($status == '7d9aj39') : ?>
            <button class=" btn btn-sm btn-info shadow-sm" onclick="kirim_lagi()"> <i class="fas fa-paper-plane fa-sm"></i>Kirim Tiket</button>

        <?php endif; ?>

    </div>
    <form action="<?= base_url('umum/kirim_tiket') ?>" method="post" id="kirim_tiket">
        <input type="hidden" class="form-control" name="no_tiket" value="<?= $get_row_detail_layanan->no_tiket; ?>" required>
        <input type="hidden" class="form-control" name="id_layanan" value="<?= $get_row_detail_layanan->id_layanan; ?>" required>
        <input type="hidden" class="form-control" name="id_status_layanan" value="3h7g4h7" required>

    </form>

    <form action="<?= base_url('umum/kirim_tiket') ?>" method="post" id="kirim_lagi">
        <input type="hidden" class="form-control" name="no_tiket" value="<?= $get_row_detail_layanan->no_tiket; ?>" required>
        <input type="hidden" class="form-control" name="id_layanan" value="<?= $get_row_detail_layanan->id_layanan; ?>" required>
        <input type="hidden" class="form-control" name="id_status_layanan" value="3f9j9h7s" required>

    </form>
    <div class="row">



        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Berkas Respon</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Berkas</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($get_all_dokumen_respon as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->nama_dokumen_respon ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#lihat_berkas_respon<?= $row->id_dokumen ?>" class="btn btn-info">
                                                    <i class=" fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Tiket</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Status</th>
                                        <th>Tanggal Riwayat</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($get_all_riwayat_tiket as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->nama_status_layanan ?></td>
                                            <td><?= $row->tgl_riwayat ?></td>
                                            <td>
                                                <?php if ($row->catatan != "") { ?>
                                                    <a href="#" data-toggle="modal" data-target="#lihat_catatan<?= $row->id_riwayat ?>" class="btn btn-info">
                                                        <i class=" fas fa-eye"></i>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Tiket</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nomor_tiket">Nomor Tiket</label>
                            <input type="text" name="nomor_tiket" class="form-control" value="<?= $get_row_detail_layanan->no_tiket; ?>" readonly>

                        </div>

                        <div class="form-group">
                            <label for="standar_id">Layanan</label>
                            <textarea name="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $get_row_detail_layanan->nama_sp; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Isi Nama Lengkap dengan Gelar" value="<?= $get_row_detail_layanan->nama_pengusul; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Isi dengan email valid" value="<?= $get_row_detail_layanan->email; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="nomor_handphone">Nomor Handphone</label>
                            <input type="text" name="nomor_handphone" class="form-control" id="nomor_handphone" placeholder="Isi Dengan Nomor Handphone aktif" value="<?= $get_row_detail_layanan->no_hp; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Isi Dengan Pekerjaan" value="<?= $get_row_detail_layanan->pekerjaan; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Asal Institusi</label>
                            <input type="text" name="asal_institusi" class="form-control" value="<?= $get_row_detail_layanan->asal_institusi; ?>" readonly>

                        </div>

                        <div class="form-group">
                            <label for="standar_id">Alamat</label>
                            <textarea name="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $get_row_detail_layanan->alamat; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="standar_id">Keterangan</label>
                            <textarea name="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $get_row_detail_layanan->alamat; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="nomor_tiket">Status Layanan</label>
                            <input type="text" name="id_status_layanan" class="form-control" value="<?= strtoupper($get_row_detail_layanan->nama_status_layanan); ?>" readonly>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Syarat Pelayanan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Dokumen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($get_all_syarat_layanan as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?= $row->nama_syarat ?><br>
                                                <?php if ($row->template == 'NULL') { ?>

                                                <?php } else { ?>
                                                      <a href="<?= base_url('umum/view_dokumen_template/') . $row->id_syarat ?>" target="_blank">(contoh dokumen)</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($get_row_detail_layanan->kode_pt == NULL) : ?>
                                                    <?php if ($status == '7d9aj39' or $status == '1f7e6gj') : ?>
                                                        <a href="#" data-toggle="modal" data-target="#tambah_dokumen<?= $row->id_syarat ?>" class="btn btn-info">
                                                            <i class=" fas fa-folder-open"></i>
                                                        </a>
                                                    <?php
                                                    endif; ?>
                                                <?php
                                                endif; ?>
                                                <?php $get_row_dokumen_cek = $this->pts_model->get_row_dokumen_cek($get_row_detail_layanan->id_layanan, $row->id_syarat);
                                                $get_row_dokumen = $this->pts_model->get_row_dokumen($get_row_detail_layanan->id_layanan, $row->id_syarat); ?>

                                                <?php if ($get_row_dokumen_cek->num_rows() > 0) {
                                                ?>
                                                    <a href="<?= base_url('umum/view_dokumen_syarat/') . $get_row_dokumen->id_dokumen ?>" target="_blank" class="btn btn-primary">
                                                        <i class="fas fa-eye "></i>
                                                    </a>

                                                <?php } ?>
                                            </td>
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

<?php foreach ($get_all_dokumen_respon as $row) : ?>
    <div class="modal" id="lihat_berkas_respon<?= $row->id_dokumen ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?= $row->nama_dokumen_respon ?> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <br>

                        <iframe src="<?= base_url('assets/dokumen/berkas/') . $row->file ?>" width="100%" height="720px"></iframe>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($get_all_riwayat_tiket as $row) : ?>
    <div class="modal" id="lihat_catatan<?= $row->id_riwayat ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Catatan <?= $row->nama_status_layanan ?> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <br>

                        <h4><?= $row->catatan ?></h4>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<?php foreach ($get_all_syarat_layanan as $row) : ?>
    <div class="modal" id="tambah_dokumen<?= $row->id_syarat ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Dokumen <?= $row->nama_syarat ?> MAX (<?= $row->size ?> kb) </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <?php
                echo validation_errors();
                echo form_open_multipart($action_tambah_dokumen); ?>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="hidden" name="id_layanan" value="<?= $get_row_detail_layanan->id_layanan ?>">
                    <input type="hidden" name="id_syarat" value="<?= $row->id_syarat ?>">
                    <input type="hidden" name="id_status_dokumen" value="bb81f56a-f2ee-11ed-9a98-c454445434d3">
                    <div class="mb-3">
                        <label for="exampleInputEmail1">File</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-info btn-pill" value="Submit">

                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>