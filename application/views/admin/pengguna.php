<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
<a data-toggle="modal"
    data-target="#add" href="#" class=" btn btn-sm btn-info shadow-sm"><i
class="fas fa-plus-circle fa-sm"></i>
Data Baru</a>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Akun Pegawai</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Aplikasi</th>
                        <th>Role</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_pengguna as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nip; ?></td>
                        <td><?= $d->gelar_depan; ?><?= $d->nama_pegawai; ?> <?= $d->gelar_belakang; ?></td>
                        <td><?= $d->nama_aplikasi; ?></td>
                        <td><?= $d->nama_role; ?></td>
                        <td><div align="center"><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_pengguna/'.$d->id_pengguna);?>" 
><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_pengguna ?>"
      
          > 
<i class="fas fa-edit fa-sm"></i></a></div></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>



<div class="modal" id="add" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Tambah Pengguna</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/simpan_pengguna'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
    <label for="exampleInputEmail1">Pegawai</label>
 
   <select select class="form-control select2bs4"  name="id_pegawai">
   
      <option>--Pilih Pegawai--</option>
    <?php foreach ($dt_pegawai as $t) :?>
      <option value="<?= $t->id_pegawai; ?>"><?= $t->gelar_depan; ?><?= $t->nama_pegawai; ?> <?= $t->gelar_belakang; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Aplikasi</label>
 
   <select class="form-control"  name="id_aplikasi">
   
      <option>--Pilih Aplikasi--</option>
    <?php foreach ($dt_aplikasi as $a) :?>
      <option value="<?= $a->id_aplikasi; ?>"><?= $a->nama_aplikasi; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1">Role</label>
 
   <select class="form-control"  name="id_role">
   
      <option>--Pilih Role--</option>
    <?php foreach ($dt_role as $b) :?>
      <option value="<?= $b->id_role; ?>"><?= $b->nama_role; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>
  
</div>

<!-- Modal footer -->
<div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">

</div>
</form>
</div>
</div>
</div>

<?php

foreach ($dt_pengguna as $f): ?>

<div class="modal" id="modaledit<?= $f->id_pengguna; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Edit Pengguna</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/update_pengguna'); ?>

<!-- Modal body -->
<div class="modal-body">
<input type="hidden" class="form-control" value="<?= $f->id_pengguna; ?>" name="id_pengguna" required >

  <div class="mb-3">
    <label for="exampleInputEmail1">Pegawai</label>
 
   <select select class="form-control select2bs4"  name="id_pegawai">
   
      <option>--Pilih Pegawai--</option>
    <?php foreach ($dt_pegawai as $p) :?>
      <option value="<?= $p->id_pegawai; ?>" <?php if($p->id_pegawai == $f->id_pegawai) { echo 'selected'; } ?>><?= $p->gelar_depan; ?><?= $p->nama_pegawai; ?> <?= $p->gelar_belakang; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1">Aplikasi</label>
 
   <select class="form-control"  name="id_aplikasi">
   
      <option>--Pilih Aplikasi--</option>
    <?php foreach ($dt_aplikasi as $r) :?>
      <option value="<?= $r->id_aplikasi; ?>" <?php if($r->id_aplikasi == $f->id_aplikasi) { echo 'selected'; } ?>><?= $r->nama_aplikasi; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1">Role</label>
 
   <select class="form-control"  name="id_role">
   
      <option>--Pilih Role--</option>
    <?php foreach ($dt_role as $q) :?>
      <option value="<?= $q->id_role; ?>" <?php if($q->id_role == $f->id_role) { echo 'selected'; } ?>><?= $q->nama_role; ?></option>
      <?php endforeach;?>
      </select>
    
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

