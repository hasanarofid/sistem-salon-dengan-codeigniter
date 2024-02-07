    <!DOCTYPE html>
    <html lang="zxx" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="colorlib">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>KITALASHES</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
            <!--
            CSS
            ============================================= -->
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/linearicons.css">
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery-ui.css">                
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css">                          
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.css">             
            <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css">
             <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        </head>
        <body>  
            <header id="header">
            
                <div class="container main-menu">
                    <div class="row align-items-center justify-content-between d-flex">
                      <div id="logo">
                        <a href="index.html"><img src="<?= base_url(); ?>assets/img/logo.png" alt="" title="" /></a>
                      </div>
                      <nav id="nav-menu-container">
                        <ul class="nav-menu">
                          <li><a href="<?= base_url('site');?>">Home</a></li>
                          <li><a href="<?= base_url('site/about');?>">Tentang Kami</a></li>
                          <li><a href="<?= base_url('site/gallery');?>">Gallery</a></li>
                          <li><a href="<?= base_url('site/service');?>">Layanan Kami</a></li>
                                                                                            
                    
                          <li><a data-toggle="modal" data-target="#register" href="#">Register</a></li>
                          <li><a data-toggle="modal" data-target="#login" href="#">Login</a></li>
                        </ul>
                      </nav><!-- #nav-menu-container -->                                  
                    </div>
                </div>
            </header><!-- #header -->
            
            <!-- start banner Area -->
            <section class="banner-area relative">
                <div class="overlay overlay-bg"></div>              
                <div class="container">
                    <div class="row fullscreen align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 banner-left">
                          
                            <h1 class="text-white">KITALASHES</h1>
                            <p class="text-white">
                                Layanan Treatment Lengkap Dari Ujung Kepala Hingga Ujung Kaki
                            </p>
                            <a href="<?= base_url('site/service'); ?>" class="primary-btn text-uppercase">BOOKING NOW!</a>
                        </div>
                        
                    </div>
                </div>                  
            </section>
            <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php  
echo validation_errors();                       
echo form_open('login/auth_action'); ?>

<!-- Modal body -->
<div class="modal-body">
<div class="mb-3">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control"  name="username" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control"  name="password" required >
    
  </div>
  <div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Login">

</div>
</div>

                 
                  </form>
                </div>
              </div>
            </div>

             <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <?php  
echo validation_errors();                       
echo form_open('site/register'); ?>

<!-- Modal body -->
<div class="modal-body">
     <div class="mb-3">
            <label for="exampleInputEmail1">Nama pelanggan</label>
            <input type="text" class="form-control" name="nama_pelanggan" required>

          </div>
           <div class="mb-3">
            <label for="exampleInputEmail1">JK</label>

            <select class="form-control" name="jk">

              <option>--Pilih JK--</option>

              <option value="L">L</option>
              <option value="P">P</option>
              
            </select>

          </div>
         
          <div class="mb-3">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" required>

          </div>
           <div class="mb-3">
            <label for="exampleInputEmail1">Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required>

          </div>

           <div class="mb-3">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>

          </div>
           <div class="mb-3">
            <label for="exampleInputEmail1">No Telp</label>
            <input type="text" class="form-control" name="no_telp" required>

          </div>
         
<div class="mb-3">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control"  name="username" required >
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control"  name="password" required >
    
  </div>
  <div class="modal-footer">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
<input type="submit" name="submit"  class="btn btn-info btn-pill" value="Register">

</div>
</div>

                 
                  </form>
                </div>
              </div>
            </div>

  <?=$contents?>

  <footer class="footer-area section-gap">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-3  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>About Agency</h6>
                                <p>
                                    The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point 
                                </p>
                            </div>
                        </div>
                                                 
                        
                                          
                    </div>

                    <div class="row footer-bottom d-flex justify-content-between align-items-center">
                        <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by Ferdy&Briza
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        <div class="col-lg-4 col-sm-12 footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End footer Area -->    

            <script src="<?= base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>          
            <script src="<?= base_url(); ?>assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>     
            <script src="<?= base_url(); ?>assets/js/jquery-ui.js"></script>                 
            <script src="<?= base_url(); ?>assets/js/easing.min.js"></script>            
            <script src="<?= base_url(); ?>assets/js/hoverIntent.js"></script>
            <script src="<?= base_url(); ?>assets/js/superfish.min.js"></script> 
            <script src="<?= base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>                     
            <script src="<?= base_url(); ?>assets/js/jquery.nice-select.min.js"></script>                    
            <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>                          
            <script src="<?= base_url(); ?>assets/js/mail-script.js"></script>   
            <script src="<?= base_url(); ?>assets/js/main.js"></script>  
             <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
              <script type="text/javascript">
        <?php if ($this->session->flashdata('success')) { ?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php } else if ($this->session->flashdata('delete')) {  ?>
            toastr.error("<?php echo $this->session->flashdata('delete'); ?>");
        <?php } else if ($this->session->flashdata('update')) {  ?>
            toastr.info("<?php echo $this->session->flashdata('update'); ?>");
        <?php } ?>
    </script>
        </body>
    </html>