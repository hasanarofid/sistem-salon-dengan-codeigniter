<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?= $judul; ?>				
							</h1>	
							
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start about-info Area -->
		<section class="destinations-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-40 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Layanan Kami</h1>
		                        <p>Kami berikan layanan  terbaik untuk anda</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
					
						
					
						   <?php
            
                foreach ($dt_service as $d):?>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="">
								</div>
								<div class="details">
									<h4><?= $d->nama_service; ?></h4>
									
									<ul class="package-list">
										<li class="d-flex justify-content-between align-items-center">
											<span>Biaya</span>
											<span><?= $d->biaya; ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Durasi</span>
											<span><?= $d->durasi; ?></span>
										</li>
									
										<li class="d-flex justify-content-between align-items-center">
											<span></span>
											<a href="javascript:;" class="price-btn"  data-toggle="modal" data-target="#edit"   
          data-id="<?= $d->id_service ?>"
          data-nama_service="<?= $d->nama_service ?>"
          >Booking</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>		
						<?php endforeach;?>																												
					</div>
				</div>	
			</section>


			<div class="modal" id="edit" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
<h4 class="modal-title">Booking</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<?php  
echo validation_errors();                       
echo form_open('user/booking'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
<input type="hidden" class="form-control"  name="id_service" id="id" required >
    <label for="exampleInputEmail1">Nama Service</label>
    <input type="text" class="form-control"   id="nama_service" readonly >
    
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1">Tanggal Booking</label>
    <input type="date" class="form-control" id="inputTanggal"  name="tgl_booking" required >
    
  </div>
  <div class="mb-3">

	<label for="exampleInputEmail1">Jam Booking</label>
	<div class="form-group">
		<a href="#" onclick="checkSlot(10)" class="btn-info btn-sm jam" id="btn-10">10:00</a>
		<a href="#" onclick="checkSlot(11)" class="btn-info btn-sm jam" id="btn-11">11:00</a>
		<a href="#" onclick="checkSlot(13)" class="btn-info btn-sm jam" id="btn-13">13:00</a>
		<a href="#" onclick="checkSlot(14)" class="btn-info btn-sm jam" id="btn-14">14:00</a>
		<a href="#" onclick="checkSlot(15)" class="btn-info btn-sm jam" id="btn-15">15:00</a>
		<a href="#" onclick="checkSlot(16)" class="btn-info btn-sm jam" id="btn-16">16:00</a>
		<a href="#" onclick="checkSlot(17)" class="btn-info btn-sm jam" id="btn-17">17:00</a>

		<input type="hidden" id="jam" name="jam">
	</div>


	</div>
	<div class="mb-3">
		<p id="keterangan_slot"></p>
	</div>
</div>

<!-- Modal footer -->
<div class="modal-footer">

<button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" id="submit_booking" disable name="submit"  class="btn btn-info btn-pill" value="Submit">

</div>
</form>
</div>
</div>
</div>

<script>
$(document).ready(function() {
	document.getElementById("submit_booking").disabled = true;

	

$('#edit').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)
var modal   = $(this)
modal.find('#id').attr("value",div.data('id'));
modal.find('#nama_service').attr("value",div.data('nama_service'));

});
});


function checkSlot(jam){
	$(".jam").removeClass("btn-success").addClass("btn-info");
	var tanggalBooking = $("#inputTanggal").val();
    if (!tanggalBooking) {
			alert('Pilih Tanggal Booking terlebih dahulu');
			$("#tgl_booking").focus();
		} else {
			$("#btn-" + jam).removeClass("btn-info").addClass("btn-success");
			$("#jam").val(jam);
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
							document.getElementById("submit_booking").disabled = false;

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