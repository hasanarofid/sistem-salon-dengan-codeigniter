<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Standar Pelayanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama SP</th>
                        <th>Produk</th>
                        <th>PJ</th>
                        <th>Jangka Waktu</th>
                        <th>Jenis Layanan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_detail_sp as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nama_sp; ?></td>
                        <td><?= $d->produk; ?></td>
                        <td><?= $d->nama_bagian; ?></td>
                        <td><?= $d->jangka_waktu; ?></td>
                        <td><?= $d->jenis_layanan; ?></td>
                        <td><div align="center"><a class=" btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Tambah" 
href="<?php echo base_url('admin/add_detail_sp/'.$d->id_sp);?>" 
><i
class="fas fa-plus-circle fa-sm"></i></a> </div></td>
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
<h4 class="modal-title">Tambah Standar Pelayanan</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/simpan_sp'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
    <label for="exampleInputEmail1">Nama SP</label>
    <input type="text" class="form-control"  name="nama_sp" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Produk</label>
    <input type="text" class="form-control"  name="produk" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Penananggung Jawab</label>
 
   <select class="form-control"  name="id_bagian">
   
      <option>--Pilih PJ--</option>
    <?php foreach ($dt_bagian as $t) :?>
      <option value="<?= $t->id_bagian; ?>"><?= $t->nama_bagian; ?></option>
      <?php endforeach;?>
      </select>
    
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1">Jangka Waktu</label>
    <input type="text" class="form-control"  name="jangka_waktu" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Jenis Layanan</label>
 
   <select class="form-control"  name="jenis_layanan">
   
      <option>--Pilih Jenis Layanan--</option>
    
      <option value="PTS">PTS</option>
      <option value="Umum">Umum</option>
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


