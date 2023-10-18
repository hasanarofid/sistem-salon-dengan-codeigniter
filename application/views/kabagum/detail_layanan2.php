<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="row">

        <div class="col-xl-12 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#syaratberkas" role="tab" aria-controls="syaratberkas" aria-selected="false">Syarat dan Berkas Pelayanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#respon" role="tab" aria-controls="teruskan" aria-selected="false">Berkas Respon</a>
                    </li>

                </ul>
                <div class="tab-content border border-top-0 p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="home-tab">
                        <?php
                        $id = "";
                        $status = "";
                        foreach ($data_layanan as $dt) : ?>
                            <div class="card-body">
                                <form id="form_tiket" method="POST" action="#">
                                    <input type="hidden" name="id_layanan" value="<?= $dt->id_layanan; ?>">
                                    <?php $id = $dt->id_layanan;
                                    $status = $dt->id_status_layanan; ?>
                                    <?php if (!$dt->nama_pengusul) { ?>
                                        <div class="form-group">
                                            <label for="nomor_tiket">Nomor Tiket </label>
                                            <input type="text" name="nomor_tiket" class="form-control" id="no_tiket" value="<?= $dt->no_tiket; ?>" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label for="standar_id">Layanan</label>
                                            <textarea name="" id="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $dt->nama_sp; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_lengkap">Kode Perguruan Tinggi</label>
                                            <input type="text" name="kode_pt" class="form-control " id="kode_pt" value="<?= $dt->kode_pt; ?>" required readonly>
                                        </div>


                                        <div class="form-group">
                                            <label for="pekerjaan">Nama Perguruan Tinggi</label>
                                            <textarea name="nama_pt" class="form-control " cols="30" rows="2" style="resize:none" readonly><?= $dt->nama_pt; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="pekerjaan">Provinsi</label>
                                            <input type="text" name="provinsi" class="form-control " id="provinsi" value="<?= $dt->provinsi; ?>" required readonly>
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" name="id_layanan" value="<?= $dt->id_layanan; ?>">
                                        <div class="form-group">
                                            <label for="nomor_tiket">Nomor Tiket </label>
                                            <input type="text" name="nomor_tiket" class="form-control" id="no_tiket" value="<?= $dt->no_tiket; ?>" readonly>
                                            <input type="hidden" id="status_tiket" name="status_tiket" value="BARU">
                                        </div>
                                        <div class="form-group">
                                            <label for="standar_id">Layanan</label>
                                            <textarea name="" id="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $dt->nama_sp; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control " id="nama_lengkap" placeholder="Isi Nama Lengkap dengan Gelar" value="<?= $dt->nama_pengusul; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control " id="email" placeholder="Isi dengan email valid" value="<?= $dt->email; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_handphone">Nomor Handphone</label>
                                            <input type="text" name="nomor_handphone" class="form-control " id="nomor_handphone" placeholder="Isi Dengan Nomor Handphone aktif" value="<?= $dt->no_hp; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" name="pekerjaan" class="form-control " id="pekerjaan" placeholder="Isi Dengan Pekerjaan" value="<?= $dt->pekerjaan; ?>" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control " id="alamat" placeholder="Isi Dengan Alamat" value="<?= $dt->alamat; ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control " id="keterangan" placeholder="Isi Dengan keterangan" value="<?= $dt->ket; ?>" required readonly>
                                        </div><?php }
                                        endforeach; ?>
                                </form>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-body">
                            <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                </tr>
                                <?php
                                foreach ($data_riwayat as $dt) : ?>
                                    <tr>
                                        <td><?= $dt->tgl_riwayat; ?></td>
                                        <td><?= $dt->nama_status_layanan; ?></td>
                                        <td><?= $dt->catatan; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="syaratberkas" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card-body">
                            <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
                                <?php if (!$data_dok) { ?>
                                    Belum Ada Berkas
                                <?php } else { ?>
                                    <tr>
                                        <th>Berkas</th>
                                        <th>Nama Berkas</th>
                                    </tr>
                                    <?php foreach ($data_dok as $data) : ?>
                                        <tr>
                                            <td><?php echo $data->nama_syarat; ?></td>
                                            <td> <a class="btn btn-primary" target="blank" href="<?= base_url(); ?>assets/dokumen/berkas/<?php echo $data->file; ?>"><i class=" fas fa-folder-open"></i></a></td>

                                        </tr>
                                <?php endforeach;
                                } ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="respon" role="tabpanel" aria-labelledby="teruskan-tab">
                        <div class="card-body">

                            <?php if (!$data_dok_respon) { ?>
                                Tidak Ada Respon
                            <?php } else { ?>
                                <object data="<?= base_url('') ?>assets/dokumen/berkas/<?php foreach ($data_dok_respon as $data) : echo $data->file; ?>" width="100%" height="600px" style="border: 1px solid; box-shadow: 2px 2px 8px #000000;"></object>
                        <?php endforeach;
                                                                                    } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>