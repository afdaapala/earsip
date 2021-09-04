<div class="row">
<div class="col-md">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Daftar User</h3>

                <div class="card-tools">
                  <a href="<?= base_url('user/add') ?>" class="btn btn-success btn-sm">
                    <i class="fas fa-plus">Tambah</i>
                  </a>
                  <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="<?= base_url('user') ?>" data-source-selector="#card-refresh-content" data-load-on-init="false">
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
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="10px"> 
                        No
                      </th>
                      <th>
                        Nama User 
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Level
                      </th>
                      <th>
                        Foto
                      </th>
                      <th>
                        Unit
                      </th>
                      <th width="40px">
                        Opsi
                      </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($user as $key => $value) { ?>
                      <tr>
                        <td> <?= $no++; ?> </td>
                        <td> <?= $value['nama_user']++; ?></td>
                        <td> <?= $value['email']++; ?></td>
                        <td> <?php if ($value['level'] == 1 ){
                        	echo 'Admin';
                        } else {
                        	echo 'User';
                        }
                        
                         ?></td>
                        <td><img width="50px" height="50px" src="<?= base_url('assets/'.$value['foto']); ?>"> </td>
                        <td> <?= $value['nama_unit']; ?></td>
                        <td> 
                          <a href="<?= base_url('user/edit/' . $value['id_user']) ?>" class="btn btn-info btn-xs" title="Ubah Data"> <i class="fas fa-edit"></i> </a>
                        
                          <button class="btn btn-danger btn-xs" title="Hapus Data" data-toggle="modal" data-target="#remove<?= $value['id_user']; ?>"><i class="fas fa-times"></i></button>
                        </td>
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

<?php foreach ($user as $key => $value) { ?>
<div class="modal fade" id="remove<?= $value['id_user']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Peringatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Yakin Menghapus User <b> <?= $value['nama_user']; ?> </b> ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('user/remove/' . $value['id_user']) ?>" type="submit" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      </div>
<?php } ?>