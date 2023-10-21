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
        <h6 class="m-0 font-weight-bold text-info">Data Service</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Nama Service</th>
                        <th>Biaya</th>
                        <th>Durasi</th>
                        <th>File Foto</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_service as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nama_kategori; ?></td>
                        <td><?= $d->nama_service; ?></td>
                        <td><?= $d->biaya; ?></td>
                        <td><?= $d->durasi; ?></td>
                        <td><a href="<?= base_url();?>upload/<?= $d->file;?>"><img width="50px" src="<?= base_url();?>upload/<?= $d->file;?>"></a></td>
                        <td><div align="center"><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_service/'.$d->id_service);?>" 
><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_service ?>"
      
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
<h4 class="modal-title">Tambah Service</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open_multipart('admin/simpan_service'); ?>

<!-- Modal body -->
<div class="modal-body">

  <div class="mb-3">
    <label for="exampleInputEmail1">Kategori</label>
 
   <select class="form-control"  name="id_kategori">
   
      <option>--Pilih kategori--</option>
    <?php foreach ($dt_kategori as $a) :?>
      <option value="<?= $a->id_kategori; ?>"><?= $a->nama_kategori; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>

<div class="mb-3">
            <label for="exampleInputEmail1">Nama Service</label>
            <input type="text" class="form-control" name="nama_service" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Durasi</label>
            <input type="text" class="form-control" name="durasi" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Biaya</label>
            <input type="text" class="form-control" name="biaya" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">File Foto</label>
            <input type="file" class="form-control" name="file" required>

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

foreach ($dt_service as $f): ?>

<div class="modal" id="modaledit<?= $f->id_service; ?>" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Edit service</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open_multipart('admin/update_service'); ?>

<!-- Modal body -->
<div class="modal-body">
<input type="hidden" class="form-control" value="<?= $f->id_service; ?>" name="id_service" required >



  <div class="mb-3">
    <label for="exampleInputEmail1">Kategori</label>
 
   <select class="form-control"  name="id_kategori">
   
      <option>--Pilih kategori--</option>
    <?php foreach ($dt_kategori as $r) :?>
      <option value="<?= $r->id_kategori; ?>" <?php if($r->id_kategori == $f->id_kategori) { echo 'selected'; } ?>><?= $r->nama_kategori; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>

  <div class="mb-3">
            <label for="exampleInputEmail1">Nama Service</label>
            <input type="text" class="form-control" name="nama_service" value="<?= $f->nama_service; ?>" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Durasi</label>
            <input type="text" class="form-control" name="durasi" value="<?= $f->durasi; ?>" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Biaya</label>
            <input type="text" class="form-control" name="biaya" value="<?= $f->biaya; ?>" required>
            <input type="hidden" class="form-control" name="old_file" value="<?= $f->file; ?>" required>

          </div>
             <div class="mb-3">
            <label for="exampleInputEmail1">File Foto</label>
            <input type="file" class="form-control" name="file">

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

