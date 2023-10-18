
     <section id="newsletter" >

        <div class="container" style="height: 100%;" >


            <div class="row">

                <h3>NOMOR TIKET</h3>

                <div class="form-container">

                
     <?php  
             echo validation_errors();                       
    echo form_open('umum/cek_tiket','class="form-inline"'); ?>
                        <input type="text" class="form-control" name="nomor_tiket" id="newsletter-form" value="<?= $kode_tiket; ?>" placeholder="Isi dengan Nomor Tiket" required="required">

                        <button type="submit" name="submit" class="btn btn-white">  Periksa  </button>

                    </form>

                </div>

            </div>

        </div>


    </section>
     
      <section id="contact" class="section-padding">

        <div class="container">

            <h2>Aplikasi Unit Layanan Terpadu</h2>

                 <p>Silakan simpan nomor tiket diatas untuk pengajuan layanan LLDIKTI Wilayah XI Kalimantan</p>

        </div>

      

        

      

    </section>
     