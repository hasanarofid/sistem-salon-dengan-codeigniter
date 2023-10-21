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
	<section class="other-issue-area section-gap">
				<div class="container">
		      				
					<div class="row">
						   <?php
            
                foreach ($dt_gallery as $d):?>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="">					
								</div>
								<a href="#">
									<h4><?= $d->nama_gallery; ?></h4>
								</a>
								<p>
									<?= $d->ket; ?>
								</p>
							</div>
						</div>
					<?php endforeach; ?>
																						
					</div>
				</div>	
			</section>