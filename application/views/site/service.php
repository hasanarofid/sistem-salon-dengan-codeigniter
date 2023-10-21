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
											<a href="<?= base_url('user'); ?>" class="price-btn">Booking</a>
										</li>													
									</ul>
								</div>
							</div>
						</div>		
						<?php endforeach;?>																												
					</div>
				</div>	
			</section>