<div class="row">
  <div class="col-md-3"></div>
<div class="col-md">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tambah User Baru</h3>

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

                <?php echo form_open_multipart('user/insert'); ?>

                <div class="form-group">
                  <label>Nama</label>
                  <input name="nama_user" class="form-control" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" pattern=".+@*\.com" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select name="level" class="form-control">
                    <option value="">---Pilih Level---</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Unit</label>
                  <select name="id_unit" class="form-control">
                    <option value="">---Pilih Unit---</option>
                    <?php foreach ($unit as $key => $value) { ?>
                      // code...
                      <option value="<?= $value['id_unit'] ?>"><?= $value['nama_unit'] ?></option>
                    <?php } ?>
                    
                  </select>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input name="foto" type="file" class="form-control">
                  
                </div>
                
                <div class="form-group">
                  <a href="<?= base_url('user'); ?>" role="button" class="btn btn-default"><i class="fa fa-angle-left"></i> Kembali</a> 

                  <button type="submit" class="btn btn-success float-right">Tambah <i class="fa fa-plus"></i></button>
                </div>


                <?php echo form_close() ?>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
           <div class="col-md-3"></div>
</div>