<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Pendaftar PT</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode PT</th>
                        <th>Nama PT</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_pendaftar as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->kode_pt; ?></td>
                        <td><?= $d->nama_pt; ?></td>
                        <td><?= $d->nama_lengkap; ?></td>
                        <td><?= $d->email; ?></td>
                        <td><?= $d->no_hp; ?></td>
                        <td><div align="center"><a class="btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_pendaftar/'.$d->id_pengguna_pt);?>" 
><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Verifikasi" href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_pengguna_pt ?>"
      
          > 
<i class="fas fa-edit fa-sm"></i></a>  <a href="<?= base_url(); ?>assets/dokumen/surat_tugas/<?= $d->surat_tugas ?>" target="_blank" class="btn btn-sm btn-warning shadow-sm">
                                                        <i class="fas fa-eye "></i>
                                                    </a></div></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>




<?php

foreach ($dt_pendaftar as $f): ?>

<div class="modal" id="modaledit<?= $f->id_pengguna_pt; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Verifikasi</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/verifikasi'); ?>

<!-- Modal body -->
<div class="modal-body">
<input type="hidden" class="form-control" value="<?= $f->id_pengguna_pt; ?>" name="id_pengguna_pt" required >
<input type="hidden" class="form-control" value="<?= $f->password_temporary; ?>" name="password_temporary" required >
<input type="hidden" class="form-control" value="<?= $f->username; ?>" name="username" required >
<input type="hidden" class="form-control" value="<?= $f->email; ?>" name="email" required >





  <div class="mb-3">
    <label for="exampleInputEmail1">Status</label>
 
   <select class="form-control"  name="status">
   
      <option>--Pilih Status--</option>
      <option value="1">Valid</option>
      <option value="2">Tidak Valid</option>
   
      </select>
    
  </div>

  
    <div class="mb-3">
    <label for="exampleInputEmail1">Catatan</label>
 
   <input class="form-control" type="text" name="catatan">  
  </div>
</div>

<!-- Modal footer -->
<div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Update">

</div>
</form>
</div>
</div>
</div>
<?php endforeach; ?>

