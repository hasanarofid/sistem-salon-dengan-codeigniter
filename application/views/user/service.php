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
    <input type="date" class="form-control"  name="tgl_booking" required >
    
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

$('#edit').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget)
var modal   = $(this)
modal.find('#id').attr("value",div.data('id'));
modal.find('#nama_service').attr("value",div.data('nama_service'));

});
});
</script>