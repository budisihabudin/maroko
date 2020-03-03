<div class="content-wrapper">
<section class="content">
      <div class="box-body">


          <?php echo form_open_multipart('user/simpan_databiodata', ['class' => 'form-group', 'method' => 'post']); ?>
            <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna'); ?>">

              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">NIK</label>
                <div class="col-sm-6">
                  <input type="number" name="nik" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('nik') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">NAMA</label>
                <div class="col-sm-6">
                  <input name="nama" type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('nama') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ALAMAT INDONESIA</label>
                <div class="col-sm-6">
                  <input name="alamat_ind" type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('alamat_ind') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">ALAMAT MAROKO</label>
                <div class="col-sm-6">
                  <input name="alamat_mrk" type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('alamat_mrk') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">JENIS KELAMIN</label>
                <div class="col-sm-6">
                  <input name="jk" type="radio"  value="1" >&nbsp;Laki - Laki &nbsp;
                  <input name="jk" type="radio"  value="2">&nbsp;Perempuan
                  <?php echo form_error('jk') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">NO. TELEPON</label>
                <div class="col-sm-6">
                  <input name="no_telp" type="number" class="form-control form-control-sm" id="
                  colFormLabelSm" >
                  <?php echo form_error('no_telp') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">NAMA AYAH</label>
                <div class="col-sm-6">
                  <input name="nama_ayah" type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('nama_ayah') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">NAMA IBU</label>
                <div class="col-sm-6">
                  <input name="nama_ibu" type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('nama_ibu') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">PEKERJAAN AYAH</label>
                <div class="col-sm-6">
                  <input name="pekerjaan_ayah" type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('pekerjaan_ayah') ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">PEKERJAAN IBU</label>
                <div class="col-sm-6">
                  <input name="pekerjaan_ibu" type="text" class="form-control form-control-sm" id="colFormLabelSm" >
                  <?php echo form_error('pekerjaan_ibu') ?>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label col-form-label-sm">PENDIDIKAN SEKARANG</label>
                <div class="col-sm-3">
                  <select name="id_pendidikan" class="form-control">
                    <option>-- PILIH PENDIDIKAN --</option>
                    <?php $id_pendidikan = $this->db->get('tb_pendidikan')->result(); ?>
                    <?php foreach ($id_pendidikan as $rr): ?>
                      <option value="<?= $rr->id_pendidikan; ?>"><?= $rr->pendidikan ?></option>
                    <?php endforeach ?>
                  </select>
                  </div>
                    <?php echo form_error('id_pendidikan'); ?>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label col-form-label-sm">FOTO</label>
            <div class="col-sm-6">
            <input type="file" name="foto" >
            <?php echo form_error('foto') ?>
            </div>
          </div>
            <br>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label col-form-label-sm"></label>
              <div class="col-sm-6">
             <a href="<?php echo base_url('user/lihat_biodata'); ?>" class="btn btn-warning">Cancel</a>
             <button type="submit" class="btn btn-primary">Simpan Biodata</button>
             </div>
            </div>
           <!-- <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" >
            <?php echo form_error('nik'); ?>
          </div> -->
           <!-- <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" class="form-control" >
            <?php echo form_error('nama'); ?>
          </div> -->
          <!-- <div class="form-group">
            <label>ALAMAT INDONESIA</label>
            <input type="text" name="alamat_ind" class="form-control">
            <?php echo form_error('alamat_ind'); ?>
          </div>
          <div class="form-group">
            <label>ALAMAT MAROKO</label>
            <input type="text" name="alamat_mrk" class="form-control">
            <?php echo form_error('alamat_mrk'); ?>
          </div> -->
          <!-- <div class="form-group">
            <label>JENIS KELAMIN</label>
            <input type="text" name="jk" class="form-control" >
            <?php echo form_error('jk'); ?>
          </div>
          <div class="form-group">
            <label>NOMOR TELEPEOM</label>
            <input type="text" name="no_telp" class="form-control" >
            <?php echo form_error('no_telp'); ?>
          </div> -->
          <!-- <div class="form-group">
            <label>NAMA AYAH</label>
            <input type="text" name="nama_ayah" class="form-control" >
            <?php echo form_error('nama_ayah'); ?>
          </div>
          <div class="form-group">
            <label>NAMA IBU</label>
            <input type="text" name="nama_ibu" class="form-control" >
            <?php echo form_error('nama_ibu'); ?>
          </div>
          <div class="form-group">
            <label>PEKERJAAN AYAH</label>
            <input type="text" name="pekerjaan_ayah" class="form-control">
            <?php echo form_error('pekerjaan_ayah'); ?>
          </div>
          <div class="form-group">
            <label>PEKERJAAN IBU</label>
            <input type="text" name="pekerjaan_ibu" class="form-control" >
            <?php echo form_error('pekerjaan_ibu'); ?>
          </div> -->

          <!-- <div class="form-group">
                <label>PENDIDIKAN SEKARANG</label>
                  <select name="id_pendidikan" class="form-control">
                    <option>-- PILIH PENDIDIKAN --</option>
                    <?php $id_pendidikan = $this->db->get('tb_pendidikan')->result(); ?>
                    <?php foreach ($id_pendidikan as $rr): ?>
                      <option value="<?= $rr->id_pendidikan; ?>"><?= $rr->pendidikan ?></option>
                    <?php endforeach ?>
                  </select>
                    <?php echo form_error('id_pendidikan'); ?>
          </div> -->
          <!-- <div class="form-group">
            <label>FOTO</label>
            <input type="file" name="foto" class="form-control">
          </div> -->
        <!--   <br>
             <a href="<?php echo base_url('user/lihat_biodata'); ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Simpan Biodata</button> -->


          <?php   echo form_close(); ?>


      </div>
    </section>
  </div>