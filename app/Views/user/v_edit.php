<div class="row">
  <div class="col-md-3"></div>
<div class="col-md">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ubah Data User </h3>

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

                <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/'.$user['foto']) ?>" width="100px" style="border:2px solid green">
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label>Ganti Foto</label>
                    <input name="foto" type="file" class="form-control">
                    </div>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label>Nama</label>
                  <input name="nama_user" class="form-control" value="<?= $user['nama_user']?>" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" pattern=".+@*\.com" class="form-control" value="<?= $user['email']?>" readonly>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" value="<?= $user['password']?>" required>
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select name="level" class="form-control">
                    <option value="<?= $user['level']?>"><?php if ($user['level'] == 1){
                                                              echo 'Admin';
                                                          } else{
                                                            echo 'User';
                                                          }?></option>

                    <option value="1">Admin</option>
                    <option value="2">User</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Unit</label>
                  <select name="id_unit" class="form-control">
                    <option value="<?= $user['id_unit']?>"><?= $user['nama_unit']?></option>
                    <?php foreach ($unit as $key => $value) { ?>
                      // code...
                      <option value="<?= $value['id_unit'] ?>"><?= $value['nama_unit'] ?></option>
                    <?php } ?>
                    
                  </select>
                </div>
                
                

                
                
                <div class="form-group">
                  <a href="<?= base_url('user'); ?>" role="button" class="btn btn-default"><i class="fa fa-angle-left"></i> Kembali</a> 

                  <button type="submit" class="btn btn-success float-right">Ubah <i class="fa fa-write"></i></button>
                </div>


                <?php echo form_close() ?>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
           <div class="col-md-3"></div>
</div>