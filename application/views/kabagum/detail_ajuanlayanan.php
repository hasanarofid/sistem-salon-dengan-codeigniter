<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Tiket </h6>

                </div>
                <!-- Card Body -->
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
                                </div><?php } ?>
                        </form>
                    </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Tiket</h6>
                </div>
                <!-- Card Body -->
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
        </div>
    <?php endforeach;
    ?>
    <div class="col-xl-6 col-lg-6">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Syarat Pelayanan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ol>
                        <?php
                        foreach ($data_syarat as $dt) : ?>
                            <li><?= $dt->nama_syarat; ?></li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Berkas </h6>
                </div>
                <!-- Card Body -->
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
                                    <td> <a target="blank" href="<?= base_url(); ?>berkas/<?php echo $data->file; ?>">Lihat</a></td>
                                    <td><?php echo $data->nama_syarat; ?></td>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- *status* Ajuan Baru Diteruskan -->
        <?php
        if ($status == '3h7g4h7') { ?>
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Teruskan Layanan</h6>
                    </div>
                    <!-- Card Body -->
                    <?php
                    echo validation_errors();
                    echo form_open('kabagum/update_ajuanlayanan'); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="standar_id">Pilih Pegawai</label>
                            <select class="form-control select2bs4" id="id_pegawai" name="id_pegawai" required>
                                <option value="">-- Pilih Pegawai --</option>
                                <?php
                                foreach ($data_pegawai as $dt) : ?>

                                    <option value="<?= $dt->nip; ?>"><?= $dt->nama_pegawai; ?></option>
                                <?php endforeach; ?>

                            </select>
                            <input type="hidden" class="form-control" id="id_layanan" name="id_layanan" value="<?= $id; ?>">
                            <input type="hidden" class="form-control" id="id_status_layanan" name="id_status_layanan" value="3f9j9h7s">

                        </div>
                        <div class="form-group">
                            <label for="standar_id">Catatan</label>
                            <textarea name="catatan" id="catatan" class="form-control" cols="20" rows="7" style="resize:none" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-info btn-user btn-block" name="button">Teruskan</button>
                        </form>
                    </div>

                    <!-- *status* Periksa Ajuan untuk proses , dikembalikan, ditolak -->
                <?php } elseif ($status == '3f9j9h7s') { ?>

                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Proses Layanan</h6>
                            </div>
                            <!-- Card Body -->
                            <?php
                            echo validation_errors();
                            echo form_open('kabagum/update_periksalayanan'); ?>

                            <div class="card-body">
                                <input type="hidden" class="form-control" id="id_layanan" name="id_layanan" value="<?= $id; ?>">
                                <div class="form-group">
                                    <label for="standar_id">Catatan</label>
                                    <textarea name="catatan" id="catatan" class="form-control" cols="20" rows="8" style="resize:none" required></textarea>
                                </div>
                                <button type="button" data-toggle="modal" data-target="#proses" class="btn btn-info btn-user btn-block">Proses</button>
                                <button type="button" data-toggle="modal" data-target="#kembali" class="btn btn-warning btn-user btn-block">Kembalikan Layanan</button>
                                <button type="button" data-toggle="modal" data-target="#tolak" class="btn btn-danger btn-user btn-block">Tolak</button>

                            </div>

                            <!-- Modal Proses-->
                            <div class="modal" id="proses" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Proses Layanan</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin berkas yang diperiksa sudah benar? Jika yakin lanjut untuk diproses, waktu layanan akan berjalan setelah anda memproses layanan ini!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="status_layanan" value="4f4s8rs" class="btn btn-info btn-user ">Proses</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Dikembalikan-->
                            <div class="modal" id="kembali" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Kembalikan Layanan</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin berkas yang diperiksa akan dikembalikan? Jangan lupa untuk memberikan catatan yang mudah dipahami tentang alasan mengapa layanan ini dikembalikan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="status_layanan" value="7d9aj39" class="btn btn-warning btn-user ">Kembalikan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Tolak-->
                            <div class="modal" id="tolak" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Proses Layanan</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin layanan ditolak? Jangan lupa untuk memberikan catatan yang mudah dipahami tentang alasan mengapa layanan ini ditolak.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="status_layanan" value="6d5e4s5" class="btn btn-danger btn-user ">Tolak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } elseif ($status == '4f4s8rs') { ?>

                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Hasil Respon Layanan</h6>
                            </div>
                            <!-- Card Body -->
                            <?php
                            echo validation_errors();
                            echo form_open_multipart('kabagum/update_responlayanan'); ?>

                            <div class="card-body">
                                <input type="hidden" class="form-control" id="id_layanan" name="id_layanan" value="<?= $id; ?>">
                                <div class="form-group">
                                    <label for="standar_id">Catatan</label>
                                    <textarea name="catatan" id="catatan" class="form-control" cols="20" rows="8" style="resize:none" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">File Hasil Respon Layanan </label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                                <button type="button" data-toggle="modal" data-target="#hasil" class="btn btn-success btn-user btn-block">Kirim Hasil Respon</button>
                            </div>
                        </div>

                        <!-- Modal Hasil-->
                        <div class="modal" id="hasil" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hasil Respon Layanan</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Periksa kembali dokumen respon yang akan dikirim, Jika yakin benar silahkan klik tombol kirim.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="status_layanan" value="9f5s9ef" class="btn btn-success btn-user ">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } elseif ($status == '9f5s9ef') { ?>
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Berkas Respon</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <object data="<?= base_url('') ?>berkas/<?php foreach ($data_dok_respon as $data) : echo $data->file; ?>" width="100%" height="600px" style="border: 1px solid; box-shadow: 2px 2px 8px #000000;"></object>
                            </div><?php endforeach; ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Berkas Respon</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                Tidak Ada Respon
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
    </div>