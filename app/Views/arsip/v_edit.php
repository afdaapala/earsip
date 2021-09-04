<div class="row">
  <div class="col-md-3"></div>
<div class="col-md">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Ubah Arsip</h3>

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

                <?php echo form_open_multipart('arsip/update/' . $arsip['id_arsip']); ?>

                <div class="form-group">
                  <label>Tanggal Surat/Arsip</label>
                <div class="input-group">
                    <input name="tgl_arsip" value="<?= $arsip['tgl_arsip']?>" class="form-control" readonly>
                </div>
            </div>
                <div class="form-group">
                  <label>Nomor</label>
                  <input name="no_arsip" class="form-control" value="<?= $arsip['no_arsip']?>" readonly>
                </div>

                <div class="form-group ">
                  <label>Klasifikasi</label>
                  <select name="id_klasifikasi" class="form-control select2-basic py-4 px-4">
                    <option value="<?= $arsip['id_klasifikasi']?>" > <?= $arsip['kode_klasifikasi']?> </option>
                    <?php foreach ($klasifikasi as $key => $value) { ?>
                      // code...
                      <option value="<?= $value['id_klasifikasi'] ?>"><?= $value['kode_klasifikasi'] ?></option>
                    <?php } ?>
                    
                  </select>
                </div>
                <div class="form-group">
                  <label>Pengirim</label>
                  <input name="nama_pengirim" class="form-control" value="<?= $arsip['nama_pengirim']?>" required>
                </div>
                <div class="form-group">
                  <label>Perihal</label>
                  <textarea name="perihal" rows="2" class="form-control"><?= $arsip['perihal']?></textarea>
                </div>

                <div class="form-group">
                  <label>Ganti File </label> <label class="text-warning"> (Format <b>.PDF</b> maks. <b>20MB</b>) </label>
                  <input class="form-control" name="file_arsip" type="file" readonly>
                </div>

                <div class="form-group">
                  <a href="<?= base_url('arsip'); ?>" role="button" class="btn btn-default"><i class="fa fa-angle-left"></i> Batal</a> 

                  <button type="submit" class="btn btn-warning float-right">Ubah <i class="fa fa-plus"></i></button>
                </div>


                <?php echo form_close() ?>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
           <div class="col-md-3"></div>
</div>