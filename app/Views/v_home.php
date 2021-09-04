<div class="row">
       <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow elevation-1"><a href="<?= base_url('arsip')?>" class="small-box-footer">
                    <i class="fas fa-archive"></i>
                    </a>
                </span>
                <div class="info-box-content">
                <span class="info-box-text">Jumlah Arsip</span>
                <span class="info-box-number">
                  <?= $total_arsip ?>
                  <small>File</small>
                </span>
              </div>
            </div>
          </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><a href="<?= base_url('klasifikasi')?>" class="small-box-footer">
                    <i class="fas fa-boxes"></i>
                    </a>
                </span>
                <div class="info-box-content">
                <span class="info-box-text">Klasifikasi</span>
                <span class="info-box-number">
                  <?= $total_klasifikasi ?>
                  <small>Kode</small>
                </span>
              </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><a href="<?= base_url('user')?>" class="small-box-footer">
                    <i class="fas fa-users"></i>
                    </a>
                </span>
                <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">
                  <?= $total_user ?>
                  <small>Akun</small>
                </span>
              </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-secondary elevation-1"><a href="<?= base_url('unit')?>" class="small-box-footer">
                    <i class="fas fa-building"></i>
                    </a>
                </span>
                <div class="info-box-content">
                <span class="info-box-text">Unit</span>
                <span class="info-box-number">
                  <?= $total_unit ?>
                  <small>Bagian</small>
                </span>
              </div>
            </div>
        </div>
        
</div>
