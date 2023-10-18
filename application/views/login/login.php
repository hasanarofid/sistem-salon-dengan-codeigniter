   <section id="home">

        <div class="container">

            <div class="row">

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <h1>Aplikasi Unit Layanan Terpadu</h1>

                   <!--  <h2>

                           SIKAT !!

                            <span class="animated-text"></span>

                      

                        </h2> -->

                    <p>Selamat datang di Aplikasi Unit Layanan Terpadu Lembaga Layanan Pendidikan TInggi Wilayah XI Kalimantan. Anda dapat melakukan  pelayanan secara online</p>

                    <a data-toggle="modal" data-target="#ganti" href="#" class="btn btn-transparent">Jelajahi LLDIKTI XI</a>


                    <a class="btn btn-blue popup-youtube" href="https://www.youtube.com/watch?v=ANobzlRbTHs">

                        <i class="material-icons">play_circle_filled</i>Video LLDIKTI XI

                    </a>

                </div>

                <!-- Sign Up -->
<div class="modal fade" id="ganti" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Jelajahi LLDIKTI XI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <iframe src="<?= base_url(); ?>/tour" height="600px" width="100%" title="Pinandu LLDIKTIXI Kalimantan"></iframe>
                  </div>
                 
                  </form>
                </div>
              </div>
            </div>
                <div class="col-md-5 col-md-offset-1">

                   
                   
                   
 <?php
     echo validation_errors();   
                                    echo form_open($action, 'class="signup-form"'); ?>
                        <h3 class="text-center"><?= $judul; ?></h3>
                        <h3 class="text-center">PINANDU LLDIKTI XI</h3>

         

                       
                                 <div class="form-group">
                                <label for="nama_standar">NIP</label>
                                     <input type="text" name="nip" class="form-control"  required>
                                    
                                 </div>
                                 <div class="form-group">
                                <label for="nama_standar">Password</label>
                                     <input type="password" name="password" class="form-control"  required>
                                    
                                 </div>
 <div class="form-group">
 <label for="nama_standar">Akses</label>
                                    <select class="form-control"  name="aplikasi">
   
 <?php foreach ($dt_aplikasi as $r) :?>
   <option value="<?= $r->id_aplikasi; ?>"><?= $r->nama_aplikasi; ?></option>
   <?php endforeach;?>
   </select>
                                    </div>
                                  
                                 
                        <div class="form-group text-center">

                           
 <button type="submit" name="submit" class="btn btn-blue btn-block" ><strong>Login</strong></button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    