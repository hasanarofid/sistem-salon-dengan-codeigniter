 <div class="container">

        <div class="row justify-content-center">

     <div class="col-xl-12 col-lg-12 col-md-12">

         <div class="card o-hidden border-0 shadow my-5">
             <div class="card-body p-0">
                 <!-- Nested Row within Card Body -->
                 <div class="row">
                     <div class="col-lg-6">

                         <iframe src="<?= base_url(); ?>/tour" height="100%" width="100%" title="Pinandu LLDIKTIXI Kalimantan"></iframe>
                         </a>
                     </div>
                     <div class="col-lg-6">
                         <div class="p-5">
                             <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">Selamat Datang di PINANDU LLDIKTI XI</h1>
                             </div>
                            
                             <?php  
             echo validation_errors();                       
    echo form_open('umum/buat_tiket','class="user"'); ?>
                               
                                 <div class="form-group">
                                     <label for="standar_id">Pilih Layanan Tersedia</label>
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
                                     <label for="nama_lengkap">Nama Lengkap</label>
                                     <input type="text" name="nama_pengusul" class="form-control" placeholder="Isi Nama Lengkap dengan Gelar" required>
                                    
                                 </div>

                                  <div class="form-group">
                                     <label for="nama_lengkap">Email</label>
                                     <input type="email" name="email" class="form-control" placeholder="Isi Dengan Email Valid" required>
                                    
                                 </div>
                                  <div class="form-group">
                                     <label for="nama_lengkap">No Handphone</label>
                                     <input type="text" name="no_hp" class="form-control" placeholder="Isi Dengan No HP Aktif" required>
                                    
                                 </div>
                                  <div class="form-group">
                                     <label for="nama_lengkap">Pekerjaan</label>
                                     <input type="text" name="pekerjaan" class="form-control" placeholder="Isi Dengan Pekerjaan Anda" required>
                                    
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_lengkap">Asal Institusi</label>
                                     <input type="text" name="asal_institusi" class="form-control" placeholder="Isi Dengan Asal Institusi anda" required>
                                    
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_lengkap">Alamat</label>
                                     <textarea name="alamat" class="form-control" placeholder="Isi Dengan Alamat Anda" required></textarea>
                                    
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_lengkap">Keterangan</label>
                                     <textarea name="ket" class="form-control" placeholder="Isi Dengan Keterangan jika ada" required></textarea>
                                    
                                 </div>
                                 <div class="form-row">
                <div class="col-md-6">
                <?= $captcha ?>
                </div>
                <div class="col-md-6">
                    
                   
                <input type="text" name="captcha" class="form-control"  placeholder="Masukkan Captcha">
                    
                </div>
                <?php if(validation_errors()) { ?>
                    <?php echo validation_errors() ?>
                    <?php } ?>
                
            </div>
           <p></p>
                     
                                

                         <button type="submit" name="submit" class="btn btn-info btn-user btn-block" name="button"><strong>BUAT TIKET</strong></button>
                         </form>
                         <hr>
                         <div class="text-center">
                             <a class="small" href="<?= base_url('umum/input_tiket'); ?>">Input Tiket</a>
                         </div>
                          <div class="text-center">
                             <a class="small" href="<?= base_url('umum/info_sp'); ?>">Info Standar Layanan</a>
                         </div>
                        
                         <form action=""></form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>

    </div>