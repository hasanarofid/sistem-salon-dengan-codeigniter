<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Layanan <?= $get_row_detail_layanan->no_tiket; ?></h1>
        <?php
        $status = $get_row_detail_layanan->id_status_layanan;
        if ($status != "7d9aj39" && $status != "6d5e4s5" && $status != "9f5s9ef") {
        ?>
            <button data-toggle="modal" data-target="#proses_ajuan" class=" btn btn-sm btn-info shadow-sm">
                <i class="fas fa-paper-plane fa-sm"></i>
                Proses Ajuan
            </button>
        <?php } ?>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Berkas Respon</h6>
                        <?php if ($status == "4f4s8rs") { ?>
                            <button data-toggle="modal" data-target="#berkas_respon" class=" btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-plus fa-sm"></i>

                            </button>
                        <?php } ?>

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
                                                <?php if ($status == "4f4s8rs") { ?>
                                                <a class="btn btn-danger" data-tooltip="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('anda yakin ingin menghapus data ini')" href="<?php echo base_url('pegawai/hapus_dokumen_respon/' . $row->id_dokumen. '/'.$get_row_detail_layanan->no_tiket.'/'.$row->file); ?>">
                                                    <i class="fas fa-trash "></i>
                                                </a>
                                                <?php }?>
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
                            <label for="nama_pengusul">Nama Pengusul</label>
                            <input type="text" name="nama_pengusul" class="form-control" value="<?php if($get_row_detail_layanan->jenis_layanan == "PTS"){
                                        echo $get_row_detail_layanan->nama_pt;
                                    }else if($get_row_detail_layanan->jenis_layanan == "Umum"){
                                        echo $get_row_detail_layanan->nama_pengusul;
                                    }?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="nama_pengusul">No Hp Pengusul</label>
                            <input type="text" name="nama_pengusul" class="form-control" value="<?php if($get_row_detail_layanan->jenis_layanan == "PTS"){
                                        echo $get_row_detail_layanan->no_hp_operator;
                                    }else if($get_row_detail_layanan->jenis_layanan == "Umum"){
                                        echo $get_row_detail_layanan->no_hp_umum;
                                    }?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="nomor_tiket">Nomor Tiket</label>
                            <input type="text" name="nomor_tiket" class="form-control" value="<?= $get_row_detail_layanan->no_tiket; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label for="standar_id">Layanan</label>
                            <textarea name="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $get_row_detail_layanan->nama_sp; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="standar_id">Keterangan</label>
                            <textarea name="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $get_row_detail_layanan->ket; ?></textarea>
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
                                            <td><?= $row->nama_syarat ?></td>
                                            <td>
                                                <?php
                                                $get_row_dokumen_cek = $this->pegawai_model->get_row_dokumen_cek($get_row_detail_layanan->id_layanan, $row->id_syarat);
                                                $get_row_dokumen = $this->pegawai_model->get_row_dokumen($get_row_detail_layanan->id_layanan, $row->id_syarat);

                                                if ($get_row_dokumen_cek->num_rows() > 0) {
                                                ?>
                                                    <a href="<?= base_url('pegawai/view_dokumen_syarat/') . $get_row_dokumen->id_dokumen ?>" target="_blank" class="btn btn-primary">
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

<div class="modal" id="proses_ajuan" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Proses Ajuan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            echo validation_errors();
            echo form_open($action_proses_ajuan); ?>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" name="id_layanan" value="<?= $get_row_detail_layanan->id_layanan ?>">
                <input type="hidden" name="no_tiket" value="<?= $get_row_detail_layanan->no_tiket ?>">

                <div class="form-group">
                    <label for="standar_id">Pilih Status Layanan</label>
                    <select class="form-control select2bs4" id="id_status_layanan" name="id_status_layanan" required>
                        <option value="">-- Status Layanan --</option>
                        <?php
                        foreach ($get_status_proses_ajuan as $row) : ?>
                            <option value="<?= $row->id_status_layanan; ?>"><?= $row->nama_status_layanan; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Catatan</label>
                    <textarea name="catatan" class="form-control" placeholder="Isi Catatan jika ada"></textarea>
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

<div class="modal" id="berkas_respon" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Dokumen Berkas Respon </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php
            echo validation_errors();
            echo form_open_multipart($action_tambah_dokumen_respon); ?>

            <!-- Modal body -->
            <div class="modal-body">
                <input type="hidden" name="id_layanan" value="<?= $get_row_detail_layanan->id_layanan ?>">
                <input type="hidden" name="id_status_dokumen" value="c2713cfb-f2ee-11ed-9a98-c454445434d3">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Dokumen Respon</label>
                    <input type="text" name="nama_dokumen_respon" class="form-control" placeholder="Isi Nama Dokumen Respon" required>

                </div>
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


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    function beluman() {
        Toast.fire({
            icon: 'info',
            title: 'Belum diimplementasi'
        })
    }

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function kirim() {
        Swal.fire({
            title: 'Yakin akan mengirim tiket?',
            text: "Tiket yang sudah dikirim tidak bisa diubah  kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, kirim saja!'
        }).then((result) => {
            if (result.value) {
                return true;
            }
        })
    }
</script>