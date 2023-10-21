
			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Layanan Terpopuler</h1>
		                        <p>Layanan yang paling di minati pelanggan kami</p>
		                        <a href="<?= base_url('user/service'); ?>" class="primary-btn text-uppercase">Lihat Semua</a>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						
									
						 <?php
            
                foreach ($dt_service as $d):?>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">Rp. <?= $d->biaya; ?></a>			
									<h4><?= $d->nama_service; ?></h4>
									<p><?= $d->nama_kategori; ?></p>			
								</div>
							</div>
						</div>		
<?php endforeach; ?>	

					</div>
					

					

				</div>	
			</section>
			<!-- End popular-destination Area -->
			

			<!-- Start price Area -->
			<section class="price-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Kategori Layanan Kami</h1>
		                        <p>Kami berikan layanan terbaik untuk pelanggan kami</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
							   <?php
            
                foreach ($dt_kategori as $kt):?>
						<div class="col-lg-3">
							<div class="single-price">
								<h4><?= $kt->nama_kategori; ?>
									<?php $id=$kt->id_kategori; ?>
								</h4>
								<ul class="price-list">

									<?php
									 $query=$this->db->query("Select * from service where id_kategori = '$id'");
                                                        foreach ($query->result() as $row) :?>
                                                        
									<li class="d-flex justify-content-between align-items-center">
										<span><?= $row->nama_service; ?></span>
										<a href="#" class="price-btn">Rp. <?= $row->biaya; ?></a>
									</li>
									<?php endforeach; ?>													
								</ul>
							</div>
						</div>
					<?php endforeach; ?>
						
																	
					</div>
				</div>	
			</section>
			<!-- End price Area -->
			

			<!-- Start other-issue Area -->
			<section class="other-issue-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Gallery Kami</h1>
		                       
		                    </div>
		                </div>
		            </div>					
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
			<!-- End other-issue Area -->
			

			<!-- Start testimonial Area -->
		    <section class="testimonial-area section-gap">
		        <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Testimoni Pelanggan Kami</h1>
		                        <p>Apa kata pelanggan kami ?</p>
		                    </div>
		                </div>
		            </div>
		            <div class="row">
		                <div class="active-testimonial">
		                	 <?php
            
                foreach ($dt_testimoni as $ts):?>
		                    <div class="single-testimonial item d-flex flex-row">
		                        <div class="thumb">
		                            <img class="img-fluid" src="<?= base_url(); ?>assets/img/elements/user1.png" alt="">
		                        </div>
		                        <div class="desc">
		                            <p>
		                                <?= $ts->ket; ?>		     
		                            </p>
		                            <h4><?= $ts->nama_testimoni; ?>	</h4>
	                            		
		                        </div>
		                    </div>
		                <?php endforeach; ?>
		                   
		                   
		             
		                  
		                  		                    		                    
		                </div>
		            </div>
		        </div>
		    </section>

<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Hubungi Kami</h1>
		                       
		                    </div>
		                </div>
		            </div>
					<div class="row">
						
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Binghamton, New York</h5>
									<p>
										4343 Hinkle Deegan Lake Road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>00 (958) 9865 562</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@colorlib.com</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
							
								 <?php
        echo validation_errors();
        echo form_open('site/simpan_kontak','class="form-area contact-form text-right"'); ?>
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input name="nama" placeholder="Nama Anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nama Anda'" class="common-input mb-20 form-control" required="" type="text">
									
										<input name="no_hp" placeholder="No HP" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'No HP'" class="common-input mb-20 form-control" type="text">

										<input name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="pesan" placeholder="Pesan Anda" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pesan'" required=""></textarea>				
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary" type="submit" name="submit" style="float: right;">Send Message</button>											
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>	
			</section>