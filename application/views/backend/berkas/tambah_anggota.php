<div class="content-wrapper">
<section class="content">
      <div class="box-body">

           <?php echo form_open('admin/simpan_anggota/', ['method' => 'POST']);?>
           <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" >
            <?php echo form_error('nik'); ?>
          </div>
           <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" class="form-control" >
            <?php echo form_error('nama'); ?>
          </div>
          <div class="form-group">
            <label>ALAMAT INDONESIA</label>
            <input type="text" name="alamat_ind" class="form-control" >
            <?php echo form_error('alamat_ind'); ?>
          </div>
          <div class="form-group">
            <label>ALAMAT MAROKO</label>
            <input type="text" name="alamat_mrk" class="form-control" >
            <?php echo form_error('alamat_mrk'); ?>
          </div>
          <div class="form-group">
            <label>SD</label>
            <input type="text" name="sd" class="form-control" >
            <?php echo form_error('sd'); ?>
          </div>
          <div class="form-group">
            <label>SMP</label>
            <input type="text" name="smp" class="form-control" >
            <?php echo form_error('smp'); ?>
          </div>
          <div class="form-group">
            <label>SMA</label>
            <input type="text" name="sma" class="form-control" >
            <?php echo form_error('sma'); ?>
          </div>
          <div class="form-group">
            <label>PERGURUAN TINGGI</label>
            <input type="text" name="pgtinggi" class="form-control" >
            <?php echo form_error('pgtinggi'); ?>
          </div>
          <div class="form-group">
            <label>JENIS KELAMIN</label>
            <input type="text" name="jk" class="form-control">
            <?php echo form_error('jk'); ?>
          </div>
          <div class="form-group">
            <label>NOMOR TELEPEOM</label>
            <input type="text" name="no_telp" class="form-control">
            <?php echo form_error('no_telp'); ?>
          </div>
          <div class="form-group">
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
            <input type="text" name="pekerjaan_ayah" class="form-control" >
            <?php echo form_error('pekerjaan_ayah'); ?>
          </div>
          <div class="form-group">
            <label>PEKERJAAN IBU</label>
            <input type="text" name="pekerjaan_ibu" class="form-control" >
            <?php echo form_error('pekerjaan_ibu'); ?>
          </div>

          <div class="form-group">
                <label>PENDIDIKAN SEKARANG</label>
                  <select name="id_pendidikan" class="form-control">
                    <option>-- PILIH PENDIDIKAN --</option>
                    <?php $id_pendidikan = $this->db->get('tb_pendidikan')->result(); ?>
                    <?php foreach ($id_pendidikan as $rr): ?>
                      <option value="<?= $rr->id_pendidikan; ?>"><?= $rr->pendidikan ?></option>
                    <?php endforeach ?>
                  </select>
                    <?php echo form_error('id_pendidikan'); ?>
          </div>
          <div class="form-group">
                <label>STATUS ANGGOTA</label>
                  <select name="id" class="form-control">
                    <option>-- PILIH ANGGOTA --</option>
                    <?php $id = $this->db->get('tb_aturan_pengguna_sistem')->result(); ?>
                    <?php foreach ($id as $rrr): ?>
                      <option value="<?= $rrr->status_pengguna; ?>"><?= $rrr->status_pengguna; ?></option>
                    <?php endforeach ?>
                  </select>
                    <?php echo form_error('id'); ?>
          </div>
          <div class="form-group">
            <label>FOTO</label>
            <input type="file" name="foto">
            <?php echo form_error('foto'); ?>
          </div>
          <div class="form-group">
            <label>STATUS AKUN</label>
            <input type="radio" value="1">Aktif
            <input type="radio" value="0">Tidak Aktif
            <?php echo form_error('status_akun'); ?>
          </div>
      <br>


        <a href="<?php echo base_url('admin/lihat_data_anggota'); ?>" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Simpan Data Anggota</button>


      <?php echo form_close(); ?>

    </div>
</section>
</div>