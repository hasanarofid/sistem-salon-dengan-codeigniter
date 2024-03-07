<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
  <a data-toggle="modal" data-target="#add" href="#" class=" btn btn-sm btn-info shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>
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
                <th>No Pesanan</th>
                <th>Tanggal Transaksi</th>
                <th>Tanggal Booking</th>
                <th>Jam</th>
                <th>Nama Service</th>
                <th>Biaya</th>
                <th>Durasi</th>
                <th>Bukti Bayar</th>
                <th>Status </th>
                <th>Opsi </th>
         
              </tr>
            </thead>

            <tbody>

              <?php
              $no = 1;
              foreach ($dt_transaksi as $d) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->no_transaksi; ?></td>
                  <td><?= $d->tgl_transaksi; ?></td>
                  <td><?= $d->tgl_booking; ?></td>
                  <td><?= $d->jam.':00'; ?></td>
                  <td><?= $d->nama_service; ?></td>
                  <td><?= $d->biaya; ?></td>
                  <td><?= $d->durasi; ?></td>
                  <td><?php if($d->bukti!=NULL):?><a href="<?= base_url();?>upload/<?= $d->bukti;?>"><i class="fa fa-file"></i></a><?php endif; ?> <?php if($d->status==1):?><a  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Bayar" href="javascript:;"
       data-toggle="modal" data-target="#bayar"   
          data-id="<?= $d->id_transaksi ?>"
          data-no_transaksi="<?= $d->no_transaksi ?>"
          > 
<i class="fa fa-upload fa-sm"></i></a><?php endif; ?></td>
           <td> <?php if($d->status==0):?><span class="badge badge-danger">Menunggu Konfirmasi</span><?php endif; ?>

           <?php if($d->status==1):?><span class="badge badge-warning">Menunggu Pembayaran</span><?php endif; ?>
           <?php if($d->status==2):?><span class="badge badge-info">Menunggu Kedatangan Pelanggan</span><?php endif; ?>
           <?php if($d->status==3):?><span class="badge badge-primary">Sedang Dikerjakan</span><?php endif; ?>
           <?php if($d->status==4):?><span class="badge badge-success">Selesai</span><?php endif; ?></td>
                     <td><div align="center"><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_transaksi/'.$d->id_transaksi);?>" 
><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm" data-tooltip="tooltip" data-bs-placement="top" title="Edit" href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_transaksi ?>">
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
          <h4 class="modal-title">Tambah Transaksi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php
        echo validation_errors();
        echo form_open('admin/simpan_transaksi'); ?>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="mb-3">
            <label for="exampleInputEmail1">Pelanggan</label>

            <select class="form-control" name="id_pelanggan">
<?php

  foreach ($dt_pelanggan as $q) : ?>
              <option value="<?= $q->id_pelanggan; ?>"><?= $q->nama_pelanggan; ?></option>
<?php endforeach; ?>
              
            </select>

          </div>
           <div class="mb-3">
            <label for="exampleInputEmail1">Service</label>

            <select class="form-control" name="id_service">
<?php

  foreach ($dt_service as $r) : ?>
              <option value="<?= $r->id_service; ?>"><?= $r->nama_service; ?></option>
<?php endforeach; ?>
              
            </select>

          </div>
         
          <div class="mb-3">
            <label for="exampleInputEmail1">Tanggal Booking</label>
            <input type="date" class="form-control" name="tgl_booking" required>

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



<?php
// var_dump("totalnya ".count($dt_service));die;
  foreach ($dt_transaksi as $f) : ?>

    <div class="modal" id="modaledit<?= $f->id_transaksi; ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit transaksi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <?php
          echo validation_errors();
          echo form_open('admin/update_transaksi'); ?>

          <!-- Modal body -->
          <div class="modal-body">
            <input type="hidden" class="form-control" value="<?= $f->id_transaksi; ?>" id="id" name="id_transaksi" required>
             <div class="mb-3">
            <label for="exampleInputEmail1">Service</label>

            <select class="form-control" name="id_service">
<?php

  foreach ($dt_service as $g) : ?>
              <option value="<?= $g->id_service; ?>" <?php if($f->id_service==$g->id_service) { echo 'selected'; } ?>><?= $g->nama_service; ?></option>
<?php endforeach; ?>
              
            </select>

          </div>
 <div class="mb-3">
            <label for="exampleInputEmail1">Tanggal Booking</label>
            <input type="date" id="inputTanggal" class="form-control" name="tgl_booking" value="<?= $f->tgl_booking; ?>" required>

          </div>
<div class="mb-3">
              <label for="exampleInputEmail1">Status</label>

              <select class="form-control" name="status">

                <option>--Pilih Status--</option>

                <option value="0" <?php if ($f->status == 0) {
                                      echo 'selected';
                                    } ?>>Menunggu Konfirmasi</option>
                                     <option value="1" <?php if ($f->status == '1') {
                                        echo 'selected';
                                      } ?>>Menunggu Pembayaran</option>
                                        <option value="2" <?php if ($f->status == '2') {
                                        echo 'selected';
                                      } ?>>Menunggu Kedatangan</option>
                                        <option value="3" <?php if ($f->status == '3') {
                                        echo 'selected';
                                      } ?>>Sedang dikerjakan</option>
                                        <option value="4" <?php if ($f->status == '4') {
                                        echo 'selected';
                                      } ?>>Selesai</option>
                                    
              </select>

            </div>
            
<?php
if($f->jam == '17'){
  if(count($dt_service) >= 2){
      $tersedia = false;
      $batas_slot = 2;
      $slot_tersedia = 0;
      $keterangan = 'Slot sudah  penuh';
  }else{
      $tersedia = true;
      $batas_slot = 2;
      $slot_tersedia = 2 -count($dt_service) ;
      $keterangan = 'Slot tersedia. sisa slot '.$slot_tersedia;
  }
}else{
  if(count($dt_service) >= 3){
      $tersedia = false;
      $batas_slot = 3;
      $slot_tersedia = 0;
      $keterangan = 'Slot sudah  penuh';
  }else{
      $batas_slot = 3;
      $tersedia = true;
      $slot_tersedia = 3 -count($dt_service) ;
      $keterangan = 'Slot tersedia. sisa slot '.$slot_tersedia;
  }

}
?>
            <div class="mb-3">

<label for="exampleInputEmail1">Jam Booking</label>
<div class="form-group">
  <a href="#" onclick="checkSlot(10)" class="<?php echo
  ($f->jam == 10) ? 'btn-success' : 'btn-info' ?>
  btn-sm jam" id="btn-10">10:00</a>
  <a href="#" onclick="checkSlot(11)" class="<?php echo
  ($f->jam == 11) ? 'btn-success' : 'btn-info' ?> btn-sm jam" id="btn-11">11:00</a>
  <a href="#" onclick="checkSlot(13)" class="<?php echo
  ($f->jam == 13) ? 'btn-success' : 'btn-info' ?> btn-sm jam" id="btn-13">13:00</a>
  <a href="#" onclick="checkSlot(14)" class="<?php echo
  ($f->jam == 14) ? 'btn-success' : 'btn-info' ?> btn-sm jam" id="btn-14">14:00</a>
  <a href="#" onclick="checkSlot(15)" class="<?php echo
  ($f->jam == 15) ? 'btn-success' : 'btn-info' ?> btn-sm jam" id="btn-15">15:00</a>
  <a href="#" onclick="checkSlot(16)" class="<?php echo
  ($f->jam == 16) ? 'btn-success' : 'btn-info' ?> btn-sm jam" id="btn-16">16:00</a>
  <a href="#" onclick="checkSlot(17)" class="<?php echo
  ($f->jam == 17) ? 'btn-success' : 'btn-info' ?> btn-sm jam" id="btn-17">17:00</a>

  <input type="hidden" id="jam_edit" name="jam" value="<?= $f->jam ?>">
</div>


</div>
<div class="mb-3">
  <p id="keterangan_slot"><?php $keterangan ?></p>
</div>
         
            

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-info btn-pill" value="Update">

          </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <div class="modal" id="bayar" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Uplaod Bukti Pembayaran</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open_multipart('admin/bayar'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
<input type="hidden" class="form-control"  name="id_transaksi" id="id" required >
    <label for="exampleInputEmail1">No Pesanan</label>
    <input type="text" class="form-control"   id="no_transaksi" readonly >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Bukti Bayar</label>
    <input type="file" class="form-control"  name="bukti" required >
    
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
  <script>
$(document).ready(function() {

$('#bayar').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)
var modal   = $(this)
modal.find('#id').attr("value",div.data('id'));
modal.find('#no_transaksi').attr("value",div.data('no_transaksi'));

});



});

function checkSlot(jam){
  // console.log(jam);
	$(".jam").removeClass("btn-success").addClass("btn-info");
	var tanggalBooking = $("#inputTanggal").val();
    if (!tanggalBooking) {
			alert('Pilih Tanggal Booking terlebih dahulu');
			$("#tgl_booking").focus();
		} else {
      console.log(jam);
			$("#btn-" + jam).removeClass("btn-info").addClass("btn-success");
			$("#jam_edit").val(jam);
			$.ajax({
            url: "check_slot", // Ubah sesuai dengan URL controller Anda
            type: "POST",
            data: {
                tanggal: tanggalBooking,
                jam: jam,
				id_service : $("#id").val()
            },
				success: function(response) {
					var data = JSON.parse(response); // Mengubah respons JSON menjadi objek JavaScript
						console.log(data); // Menampilkan data dari controller
						// Lakukan tindakan sesuai dengan respons
						if(data.tersedia) {
							$("#keterangan_slot").text(data.keterangan);
							console.log('Slot tersedia');
							console.log('Batas slot:', data.batas_slot);
							console.log('Slot tersedia:', data.slot_tersedia);
							console.log('Keterangan:', data.keterangan);
							// document.getElementById("submit_booking").disabled = false;

						} else {
							$("#keterangan_slot").text(data.keterangan);
							console.log('Slot tidak tersedia');
							console.log('Keterangan:', data.keterangan);
						}
				},
				error: function(xhr, status, error) {
					console.error(xhr.responseText);
					// Tangani kesalahan jika terjadi
				}
			});
		}
}
</script>