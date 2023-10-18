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

            <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <?php  
             echo validation_errors();                       
    echo form_open_multipart('login/register'); ?>
                     <div class="form-group">
                                    
                                     <select class="form-control select2bs4" name="kode_pt" required>
                                     <option value="">-- Pilih PT --</option>
                                     <?php
                $no=1;
                foreach ($dt_pt as $a):?>
                                        
                                         <option value="<?= $a->kode_pt; ?>"><?= $a->nama_pt; ?></option>
                                        <?php endforeach; ?>
                                         
                                     </select>
                                     
                                 </div>
                   <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" class="form-control"  name="nama_lengkap"  required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Email Aktif</label>
                        <input type="email" class="form-control"  name="email"  required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">No HP Aktif</label>
                        <input type="text" class="form-control"  name="no_hp"  required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="username" class="form-control"  name="username"  required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control"  name="password"  required >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Surat Tugas Operator</label>
                        <input type="file" class="form-control"  name="surat_tugas"  required >
                        
                      </div>
                  </div>
                  <div class="modal-footer">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" name="submit" class="btn btn-info btn-pill" value="Submit">

        </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="modal fade" id="lupa" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <?php
        echo validation_errors();
        echo form_open('login/reset_password'); ?>

                  <div class="modal-body">
                
                       <div class="form-group">
                        <label for="exampleInputEmail1">Email Terdaftar</label>
                        <input type="email" class="form-control"  name="email"  required >
                        
                      </div>
                     
                       <div class="form-group">
                        <label for="exampleInputEmail1">Password baru</label>
                        <input type="password" class="form-control"  name="pass_baru"  required >
                        
                      </div>
                  </div>
                      <div class="modal-footer">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" name="submit" class="btn btn-info btn-pill" value="Submit">

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
                                <label for="nama_standar">Username</label>
                                     <input type="text" name="username" class="form-control"  required>
                                    
                                 </div>
                                 <div class="form-group">
                                <label for="nama_standar">Password</label>
                                     <input type="password" name="password" class="form-control"  required>
                                    
                                 </div>

                                  
                                 
                        <div class="form-group text-center">

                           
 <button type="submit" name="submit" class="btn btn-blue btn-block" ><strong>Login</strong></button> ,<br />
 belum punya akun ?   <a data-toggle="modal" data-target="#register" href="#">daftar </a> 
 <br /> 
  <a data-toggle="modal" data-target="#lupa" href="#">Lupa Password </a> 



                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    