<div class="row">
  <div class="col-md-3"></div>
<div class="col-md">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Arsip Baru</h3>

                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="<?= base_url('user/add') ?>" data-source-selector="#card-refresh-content" data-load-on-init="false">
                    <i class="fas fa-sync-alt"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
                <!-- /.card-tools -->
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  $errors = session()->getFlashdata('errors');
                  if (!empty($errors)){ ?>
                      <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <ul>
                              <?php foreach ($errors as $key => $value){ ?>
                              <li> <?= esc($value) ?> </li>
                              <?php } ?> 
                          </ul>
                      </div>
                  <?php } ?>

                <?php echo form_open_multipart('arsip/insert'); ?>

                <div class="form-group">
                   <label>Tanggal Surat/Arsip</label>
                <div class="datepicker date input-group">
                    <input name="tgl_arsip" type="text" placeholder="Pilih Tanggal" class="form-control" id="reservationDate">
                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                </div>
            </div>

                <div class="form-group">
                  <label>Nomor</label>
                  <input name="no_arsip" class="form-control" placeholder="Nomor Arsip" required>
                </div>

                <div class="form-group ">
                  <label>Klasifikasi</label>
                  <select name="id_klasifikasi" class="form-control select2-basic py-4 px-4">
                    <option value="" > --- Kode Klasifikasi --- </option>
                    <?php foreach ($klasifikasi as $key => $value) { ?>
                      // code...
                      <option value="<?= $value['id_klasifikasi'] ?>"><?= $value['kode_klasifikasi'] ?></option>
                    <?php } ?>
                    
                  </select>
                </div>


                <div class="form-group">
                  <label>Pengirim</label>
                  <input name="nama_pengirim" class="form-control" placeholder="Nama Pengirim" required>
                </div>
                <div class="form-group">
                  <label>Perihal</label>
                  <textarea name="perihal" rows="2" class="form-control" placeholder="Perihal/Deskripsi Arsip"></textarea>
                </div>

                <div class="form-group">
                  <label>Upload File </label> <label class="text-warning"> (Format .PDF maks 20MB) </label>
                  <input class="form-control" name="file_arsip" type="file">
                </div>

                <div class="form-group">
                  <a href="<?= base_url('arsip'); ?>" role="button" class="btn btn-default"><i class="fa fa-angle-left"></i> Batal</a> 

                  <button type="submit" class="btn btn-info float-right">Tambah <i class="fa fa-plus"></i></button>
                </div>


                <?php echo form_close() ?>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
           <div class="col-md-3"></div>
</div>