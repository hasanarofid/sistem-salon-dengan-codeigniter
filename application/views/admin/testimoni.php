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
        <h6 class="m-0 font-weight-bold text-info">Data Testimoni</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Testimoni</th>
                        <th>Ket</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_testimoni as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nama_testimoni; ?></td>
                        <td><?= $d->ket; ?></td>
                        <td><div align="center"><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_testimoni/'.$d->id_testimoni);?>" 
><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" href="javascript:;"
       data-toggle="modal" data-target="#edit"   
          data-id="<?= $d->id_testimoni ?>"
          data-nama_testimoni="<?= $d->nama_testimoni ?>"
          data-nama_testimoni="<?= $d->ket ?>"
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
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Tambah testimoni</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/simpan_testimoni'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
    <label for="exampleInputEmail1">Nama testimoni</label>
    <input type="text" class="form-control"  name="nama_testimoni" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Ket</label>
    <input type="text" class="form-control"  name="ket" required >
    
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


<div class="modal" id="edit" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Update Testimoni</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('admin/update_testimoni'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
<input type="hidden" class="form-control"  name="id_testimoni" id="id" required >
    <label for="exampleInputEmail1">Nama testimoni</label>
    <input type="text" class="form-control"  name="nama_testimoni" id="nama_testimoni" required >
    
  </div>

 <div class="mb-3">
    <label for="exampleInputEmail1">Ket</label>
    <input type="text" class="form-control"  name="ket" id="ket" required >
    
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

<script>
$(document).ready(function() {

$('#edit').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)
var modal   = $(this)
modal.find('#id').attr("value",div.data('id'));
modal.find('#nama_testimoni').attr("value",div.data('nama_testimoni'));
modal.find('#ket').attr("value",div.data('ket'));

});
});
</script>