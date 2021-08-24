<div class="row">
<div class="col-md">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Data Klasifikasi</h3>

                <div class="card-tools">
                  <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">
                    <i class="fas fa-plus">Tambah</i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="<?= base_url('kategori') ?>" data-source-selector="#card-refresh-content" data-load-on-init="false">
                    <i class="fas fa-sync-alt"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
                <!-- /.card-tools -->
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
              if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5>';
                  echo session()->getFlashdata('pesan');
                  echo '</h5></div>';
              }
              ?>
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th> 
                        No
                      </th>
                      <th>
                        Kode
                      </th>
                      <th>
                        Nama Klasifikasi 
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($klasifikasi as $key => $value) { ?>
                      <tr>
                        <td> <?= $no++; ?> </td>
                        <td> <?= $value['kode_klasifikasi']++; ?></td>
                        <td> <?= $value['nama_klasifikasi']++; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                  
                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
</div>


<!-- Modal Klasifikasi -->
<div class="modal fade" id="add">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open('klasifikasi/add') ?>
                             <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                    <label>Kode Klasifikasi</label>
                    <input name="kode_klasifikasi" class="form-control" placeholder="Kode" required>
                  </div>

                  <div class="form-group">
                    <label>Nama Klasifikasi</label>
                    <input name="nama_klasifikasi" class="form-control" placeholder="Nama Klasifikasi" required>
                  </div>

                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                    </div>
                  </div> -->
                  
                </div>
                <!-- /.card-body -->

                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div> -->
              
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-info">Tambah</button>
            </div>
            </form>
              <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->