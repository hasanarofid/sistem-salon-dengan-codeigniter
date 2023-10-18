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
    echo form_open('umum/buat_tiket','class="signup-form"'); ?>

                        <h3 class="text-center">Buat Tiket</h3>

         

                         <div class="form-group">
                                    
                                     <select class="form-control select2bs4"  id="id_sp" name="id_sp" required>
                                     <option value="">-- Pilih Layanan --</option>
                                     <?php
                $no=1;
                foreach ($dt_sp as $a):?>
                                        
                                         <option value="<?= $a->id_sp; ?>"><?= $a->nama_sp; ?></option>
                                        <?php endforeach; ?>
                                         
                                     </select>
                                     
                                 </div>
                                 <div class="form-group">
                                
                                     <input type="text" name="nama_pengusul" class="form-control" placeholder="Isi Nama Lengkap dengan Gelar" required>
                                    
                                 </div>

                                  <div class="form-group">
                                  
                                     <input type="email" name="email" class="form-control" placeholder="Isi Dengan Email Valid" required>
                                    
                                 </div>
                                  <div class="form-group">
                                    
                                     <input type="text" name="no_hp" class="form-control" placeholder="Isi Dengan No HP Aktif" required>
                                    
                                 </div>
                                  <div class="form-group">
                                    
                                     <input type="text" name="pekerjaan" class="form-control" placeholder="Isi Dengan Pekerjaan Anda" required>
                                    
                                 </div>
                                 <div class="form-group">
                                   
                                     <input type="text" name="asal_institusi" class="form-control" placeholder="Isi Dengan Asal Institusi anda" required>
                                    
                                 </div>
                                 <div class="form-group">
                          
                                     <textarea name="alamat" class="form-control" placeholder="Isi Dengan Alamat Anda" required></textarea>
                                    
                                 </div>
                                 <div class="form-group">
                                    
                                     <textarea name="ket" class="form-control" placeholder="Isi Dengan Keterangan jika ada" required></textarea>
                                    
                                 </div>
                                  <div class="form-row">
                <div class="col-md-6">
                <?= $captcha ?>
                </div>
                <div class="col-md-6">
                    
                   
                <input type="text" name="captcha" class="form-control"  placeholder="Captcha">
                    
                </div>
                <?php if(validation_errors()) { ?>
                    <?php echo validation_errors() ?>
                    <?php } ?>
                
            </div>
            <p />
                        <div class="form-group text-center">

                           
 <button type="submit" name="submit" class="btn btn-blue btn-block" ><strong>BUAT TIKET</strong></button>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

    