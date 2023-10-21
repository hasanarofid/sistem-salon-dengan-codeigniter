  <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
      <a data-toggle="modal" data-target="#add" href="#" class=" btn btn-sm btn-info shadow-sm"><i class="fas fa-plus-circle fa-sm"></i>
        Data Baru</a>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Pelanggan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>JK</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Opsi</th>
              </tr>
            </thead>

            <tbody>

              <?php
              $no = 1;
              foreach ($dt_pelanggan as $d) : ?>

                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d->nama_pelanggan; ?></td>
                  <td><?= $d->jk; ?></td>
                  <td><?= $d->tempat_lahir; ?></td>
                  <td><?= $d->tgl_lahir; ?></td>
                  <td><?= $d->alamat; ?></td>
                  <td><?= $d->no_telp; ?></td>
                  <td>
                    <div align="center"><a class=" btn btn-sm btn-danger shadow-sm" data-tooltip="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('anda yakin ingin menghapus data ini')" href="<?php echo base_url('admin/delete_pelanggan/' . $d->id_pelanggan); ?>"><i class="fas fa-trash fa-sm"></i></a> <a class=" btn btn-sm btn-info shadow-sm" data-tooltip="tooltip" data-bs-placement="top" title="Edit" href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_pelanggan ?>">
                        <i class="fas fa-edit fa-sm"></i></a></div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>



  <div class="modal" id="add" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pelanggan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php
        echo validation_errors();
        echo form_open('admin/simpan_pelanggan'); ?>

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
         

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" name="submit" class="btn btn-info btn-pill" value="Submit">

        </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  foreach ($dt_pelanggan as $f) : ?>

    <div class="modal" id="modaledit<?= $f->id_pelanggan; ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Edit Pelanggan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <?php
          echo validation_errors();
          echo form_open('admin/update_pelanggan'); ?>

          <!-- Modal body -->
          <div class="modal-body">
            <input type="hidden" class="form-control" value="<?= $f->id_pelanggan; ?>" name="id_pelanggan" required>
            <div class="mb-3">
              <label for="exampleInputEmail1">Nama Pelanggan</label>
              <input type="text" class="form-control" value="<?= $f->nama_pelanggan; ?>" name="nama_pelanggan" required>

            </div>
<div class="mb-3">
              <label for="exampleInputEmail1">JK</label>

              <select class="form-control" name="jk">

                <option>--Pilih JK--</option>

                <option value="L" <?php if ($f->jk == 'L') {
                                      echo 'selected';
                                    } ?>>L</option>
                                     <option value="P" <?php if ($f->jk == 'P') {
                                        echo 'selected';
                                      } ?>>P</option>
                                    
              </select>

            </div>
            

         
          <div class="mb-3">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" value="<?= $f->tempat_lahir; ?>" required>

          </div>
           <div class="mb-3">
            <label for="exampleInputEmail1">Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" value="<?= $f->tgl_lahir; ?>" required>

          </div>

           <div class="mb-3">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?= $f->alamat; ?>" required>

          </div>
           <div class="mb-3">
            <label for="exampleInputEmail1">No Telp</label>
            <input type="text" class="form-control" name="no_telp" value="<?= $f->no_telp; ?>" required>

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