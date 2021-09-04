<div class="row">
<div class="col-md">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Arsip</h3>

                <div class="card-tools">
                  <a href="<?=base_url('arsip/add')?>" class="btn btn-success btn-sm">
                    <i class="fas fa-plus">Tambah</i>
                  </a>
                  <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="<?= base_url('arsip')?>" data-source-selector="#card-refresh-content" data-load-on-init="false">
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
                <?php if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5>';
                  echo session()->getFlashdata('pesan');
                  echo '</h5></div>';
              } ?>
              
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="10px"> 
                        No
                      </th>
                      <th>
                        Tanggal Surat/File
                      </th>
                      <th>
                        No Arsip
                      </th>
                      <th>
                        Pengirim
                      </th>
                      <th>
                        Klasifikasi
                      </th>
                      <th>
                        Petugas
                      </th>
                      <th>
                        Unit
                      </th>
                      <th>
                        Upload
                      </th>
                      <!-- <th>
                        Updated
                      </th> -->
                      <th>
                        File
                      </th>
                      <th width="40px">
                        Opsi
                      </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($arsip as $key => $value) { ?>
                      <tr>
                        <td> <?= $no++; ?> </td>
                        <td> <?= $value['tgl_arsip']++; ?></td>
                        <td> <?= $value['no_arsip']++; ?></td>
                        <td> <?= $value['nama_pengirim']++; ?></td>
                        <td> <?= $value['kode_klasifikasi']++; ?></td>
                        <td> <?= $value['nama_user']++; ?></td>
                        <td> <?= $value['nama_unit']++; ?></td>
                        <td> <?= $value['tgl_upload']++; ?></td>
                        <!-- <td> <?= $value['tgl_update']++; ?></td> -->
                        <td class="text-center"><a href="<?= base_url('arsip/viewpdf/' . $value['id_arsip']) ?>" class="btn btn-default btn-sm" title="Lihat Data"> <i class="fas fa-file-pdf"></i> </a><br><?= $value['filesize'] ?> MB</td>
                        <td> 
                          <a href="<?= base_url('arsip/edit/' . $value['id_arsip']) ?>" class="btn btn-info btn-xs" title="Ubah Data"> <i class="fas fa-edit"></i> </a>
                          <button class="btn btn-danger btn-xs" title="Hapus Data" data-toggle="modal" data-target="#remove<?= $value['id_arsip']; ?>"><i class="fas fa-times"></i></button>
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
<?php foreach ($arsip as $key => $value) { ?>
<div class="modal fade" id="remove<?= $value['id_arsip']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Peringatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Yakin Menghapus <b> <?= $value['no_arsip']; ?> </b> ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url('arsip/remove/' . $value['id_arsip']) ?>" type="submit" class="btn btn-danger">Hapus</a>
            </div>
          </div>
        </div>
      </div>
<?php } ?>