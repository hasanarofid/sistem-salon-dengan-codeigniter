<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>

</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Service</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>No Pesanan</th>
                <th>Tanggal Transaksi</th>
                <th>Tanggal Booking</th>
                <th>Nama Service</th>
                <th>Biaya</th>
                <th>Durasi</th>
                <th>Bukti Bayar</th>
                <th>Status </th>
                <th>Opsi </th>
         
              </tr>
            </thead>

            <tbody>

              <?php
              $no = 1;
              foreach ($dt_transaksi as $d) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->no_transaksi; ?></td>
                  <td><?= $d->tgl_transaksi; ?></td>
                  <td><?= $d->tgl_booking; ?></td>
                  <td><?= $d->nama_service; ?></td>
                  <td><?= $d->biaya; ?></td>
                  <td><?= $d->durasi; ?></td>
                  <td><?php if($d->file!=NULL):?><a href="<?= base_url();?>upload/<?= $d->bukti;?>"><i class="fa fa-file"></i></a><?php endif; ?></td>
           <td> <?php if($d->status==0):?><span class="badge badge-danger">Menunggu Konfirmasi</span><?php endif; ?>

           <?php if($d->status==1):?><span class="badge badge-warning">Menunggu Pembayaran</span><?php endif; ?>
           <?php if($d->status==2):?><span class="badge badge-info">Menunggu Kedatangan Pelanggan</span><?php endif; ?>
           <?php if($d->status==3):?><span class="badge badge-primary">Sedang Dikerjakan</span><?php endif; ?>
           <?php if($d->status==4):?><span class="badge badge-success">Selesai</span><?php endif; ?></td>
                     <td><div align="center"><?php if($d->status==0):?><a class=" btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('user/delete_transaksi/'.$d->id_transaksi);?>" 
><i class="fas fa-trash fa-sm"></i></a> <?php endif; ?> <a class=" btn btn-sm btn-info shadow-sm" data-tooltip="tooltip" data-bs-placement="top" title="Edit" href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_transaksi ?>">
                        <i class="fas fa-edit fa-sm"></i></a></div></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </div>
</div>

</div>





<?php

  foreach ($dt_transaksi as $f) : ?>

    <div class="modal" id="modaledit<?= $f->id_transaksi; ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit transaksi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <?php
          echo validation_errors();
          echo form_open('admin/update_transaksi'); ?>

          <!-- Modal body -->
          <div class="modal-body">
            <input type="hidden" class="form-control" value="<?= $f->id_transaksi; ?>" name="id_transaksi" required>

<div class="mb-3">
              <label for="exampleInputEmail1">Status</label>

              <select class="form-control" name="status">

                <option>--Pilih Status--</option>

                <option value="0" <?php if ($f->status == 0) {
                                      echo 'selected';
                                    } ?>>Menunggu Konfirmasi</option>
                                     <option value="1" <?php if ($f->status == '1') {
                                        echo 'selected';
                                      } ?>>Menunggu Pembayaran</option>
                                        <option value="2" <?php if ($f->status == '2') {
                                        echo 'selected';
                                      } ?>>Menunggu Kedatangan</option>
                                        <option value="3" <?php if ($f->status == '3') {
                                        echo 'selected';
                                      } ?>>Sedang dikerjakan</option>
                                        <option value="4" <?php if ($f->status == '4') {
                                        echo 'selected';
                                      } ?>>Selesai</option>
                                    
              </select>

            </div>
            

         
         
            

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-info btn-pill" value="Update">

          </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>