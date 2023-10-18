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
                            <h6 class="m-0 font-weight-bold text-info">Data Syarat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Syarat</th>
                                            <th>Size File</th>
                                            <th>Inisial</th>
                                            <th>Template</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                   
                                    <?php
                                    $no=1;
                                    foreach ($dt_syarat as $d):?>
                                      
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $d->nama_syarat; ?></td>
                                            <td><?= $d->size; ?> Mb</td>
                                            <td><?= $d->inisial; ?></td>
                                            <td> <?php if($d->template != 'NULL') :?><a href="<?= base_url(); ?>assets/dokumen/template/<?= $d->template ?>" target="_blank">
                                                      <?= $d->template; ?>
                                                    </a>
                                                    <?php endif; ?></td>
                                            <td><div align="center"><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
                      data-bs-placement="top"
                      title="Delete" 
                  onclick="return confirm('anda yakin ingin menghapus data ini')"
                   href="<?php echo base_url('admin/delete_syarat/'.$d->id_syarat.'/'.$d->template);?>" 
                    ><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
                      data-bs-placement="top"
                      title="Edit" href="javascript:;"
                           data-toggle="modal" data-target="#edit"   
                              data-id="<?= $d->id_syarat ?>"
                              data-nama_syarat="<?= $d->nama_syarat ?>"
                              data-inisial="<?= $d->inisial ?>"
                              data-size="<?= $d->size ?>"
                              data-template="<?= $d->template ?>"
                              > 
                   <i class="fas fa-edit fa-sm"></i></a> </div></td>
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
        <h4 class="modal-title">Tambah Syarat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open_multipart('admin/simpan_syarat'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
       <div class="mb-3">
                        <label for="exampleInputEmail1">Nama Syarat</label>
                        <textarea class="form-control"  name="nama_syarat"  required ></textarea>
                        
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1">Size</label>
                        <input type="number" class="form-control"  name="size"  required >
                        
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1">Inisial</label>
                        <input type="text" class="form-control"  name="inisial"  required >
                        
                      </div>
                       <div class="mb-3">
                        <label for="exampleInputEmail1">Template</label>
                        <input type="file" class="form-control"  name="template" >
                        
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
 <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Syarat</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open_multipart('admin/update_syarat'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
       <div class="mb-3">
       <input type="hidden" class="form-control"  name="id_syarat" id="id" required >
                        <label for="exampleInputEmail1">Nama Syarat</label>
                        <input type="text" class="form-control"  name="nama_syarat" id="nama_syarat" required >
                        
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1">Size</label>
                        <input type="number" class="form-control"  name="size" id="size" required >
                        
                      </div>
                       <div class="mb-3">
                        <label for="exampleInputEmail1">Inisial</label>
                        <input type="text" class="form-control"  name="inisial" id="inisial"  required >
                        
                      </div>
                       <div class="mb-3">
                        <label for="exampleInputEmail1">Template</label>
                        <input type="file" class="form-control"  name="template" >
                        
                      </div>
                       <input type="hidden" class="form-control"  name="old_template" id="template" required >
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
            modal.find('#nama_syarat').attr("value",div.data('nama_syarat'));
            modal.find('#size').attr("value",div.data('size'));
            modal.find('#inisial').attr("value",div.data('inisial'));
            modal.find('#template').attr("value",div.data('template'));
           
        });
    });
</script>