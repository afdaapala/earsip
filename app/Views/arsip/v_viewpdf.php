<div class="row">
  <div class="col-sm-12">
  <table class="table table-hover">
    <tr>
      <th width="150px">
        Tanggal 
      </th>
      <th class="" width="50px">
        :
      </th>
      <th>
        <?= $arsip['tgl_arsip']?>
      </th>
    </tr>
    <tr>
      <th>
        No Arsip 
      </th>
      <th>
        :
      </th>
      <th>
        <?= $arsip['no_arsip']?>
      </th>
    </tr>
    <tr>
      <th>
        Pengirim
      </th>
      <th>
        :
      </th>
      <th>
        <?= $arsip['nama_pengirim']?>
      </th>
    </tr>
    <tr>
      <th>
        Perihal/Deskripsi
      </th>
      <th>
        :
      </th>
      <th>
        <?= $arsip['perihal']?>
      </th>
    </tr>
  </table>
  </div>
  <div class="col-sm-12">
    <!-- <iframe src="<?= base_url('files/'.$arsip['file_arsip']); ?>" title="<?= $arsip['no_arsip']?>"></iframe> -->
    <iframe src="<?= base_url('files/'.$arsip['file_arsip']); ?>?file='.urlencode($pdf_url)" title="<?= $arsip['no_arsip']?>" title="<?= $arsip['no_arsip']?>" height="800px" width="100%"></iframe>
    <!-- <embed type="application/pdf" src="<?= base_url('files/'.$arsip['file_arsip']); ?>" width="600" height="400"></embed> -->
    
    
  </div>
</div>