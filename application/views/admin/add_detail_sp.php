<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

</div>


<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Tambah/Ubah Syarat Standar Pelayanan</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nama_standar">Nama Standar</label>
                <input type="text" class="form-control"  value="<?= $d->nama_sp; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="produk_pelayanan">Produk Pelayanan</label>
                <input type="text" class="form-control"  value="<?= $d->produk; ?>" readonly>
            </div>
          
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="produk_pelayanan">Penanggung Jawab</label>
                <input type="text" class="form-control"  value="<?= $d->nama_bagian; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="produk_pelayanan">Jangka Waktu</label>
                <input type="text" class="form-control"  value="<?= $d->jangka_waktu; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label for="produk_pelayanan">Jenis Layanan</label>
                <input type="text" class="form-control"  value="<?= $d->jenis_layanan; ?>" readonly>
                    </div>
                </div>
            </div>
           
            <?php  
             echo validation_errors();                       
    echo form_open('admin/simpan_detail_sp'); ?>
                
                
                <input type="hidden" name="id_sp" value="<?= $id_sp; ?>">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="syarat_id">Syarat</label>
                    </div>
                    <select class="form-control select2bs4"  id="id_syarat" name="id_syarat" required>
                        <option value="" selected>-- Pilih Syarat --</option>
                        <?php
                                    $no=1;
                                    foreach ($dt_syarat as $a): ?>
                            <option value="<?= $a->id_syarat; ?>"><?= $a->nama_syarat; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" name="submit" class="btn btn-info" type="button"><i class="fa fa-plus-circle"></i>
                            Tambahkan</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Syarat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                    <?php
                                    $no=1;
                                    foreach ($dt_detail_sp as $c): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $c->nama_syarat; ?></td>
                                <td style="min-width: 100px;">
                                <a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
                      data-bs-placement="top"
                      title="Delete" 
                  onclick="return confirm('anda yakin ingin menghapus data ini')"
                   href="<?php echo base_url('admin/delete_detail_sp/'.$c->id_detail_sp.'/'.$id_sp);?>" 
                    ><i class="fas fa-trash fa-sm"></i></a> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>