<div class="content-wrapper">
<section class="content">
      <div class="box-body">
         <?php  
                
          foreach ($tb_data_anggota as $r ){ 
        ?>
           <?php echo form_open('admin/simpan_data_anggota/'.$r->id_anggota, ['method' => 'POST']);?>
           <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" value="<?php echo $r->nik; ?>">
            <?php echo form_error('nik'); ?>
          </div>
           <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $r->nama; ?>">
            <?php echo form_error('nama'); ?>
          </div>
          <div class="form-group">
            <label>ALAMAT INDONESIA</label>
            <input type="text" name="alamat_ind" class="form-control" value="<?php echo $r->alamat_ind; ?>">
            <?php echo form_error('alamat_ind'); ?>
          </div>
          <div class="form-group">
            <label>ALAMAT MAROKO</label>
            <input type="text" name="alamat_mrk" class="form-control" value="<?php echo $r->alamat_mrk; ?>">
            <?php echo form_error('alamat_mrk'); ?>
          </div>
          <div class="form-group">
            <label>JENIS KELAMIN</label>
            <input type="text" name="jk" class="form-control" value="<?php echo $r->jk; ?>">
            <?php echo form_error('jk'); ?>
          </div>
          <div class="form-group">
            <label>NOMOR TELEPEOM</label>
            <input type="text" name="no_telp" class="form-control" value="<?php echo $r->no_telp; ?>">
            <?php echo form_error('no_telp'); ?>
          </div>
          <div class="form-group">
            <label>NAMA AYAH</label>
            <input type="text" name="nama_ayah" class="form-control" value="<?php echo $r->nama_ayah; ?>">
            <?php echo form_error('nama_ayah'); ?>
          </div>
          <div class="form-group">
            <label>NAMA IBU</label>
            <input type="text" name="nama_ibu" class="form-control" value="<?php echo $r->nama_ibu; ?>">
            <?php echo form_error('nama_ibu'); ?>
          </div>
          <div class="form-group">
            <label>PEKERJAAN AYAH</label>
            <input type="text" name="pekerjaan_ayah" class="form-control" value="<?php echo $r->pekerjaan_ayah; ?>">
            <?php echo form_error('pekerjaan_ayah'); ?>
          </div>
          <div class="form-group">
            <label>PEKERJAAN IBU</label>
            <input type="text" name="pekerjaan_ibu" class="form-control" value="<?php echo $r->pekerjaan_ibu; ?>">
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
                <label>ANGGOTA</label>
                  <select name="id_pengguna" class="form-control">
                    <option>-- PILIH ANGGOTA --</option>
                    <?php $id_pengguna = $this->db->get('tb_pengguna_sistem')->result(); ?>
                    <?php foreach ($id_pengguna as $rrr): ?>
                      <option value="<?= $rrr->id_pengguna; ?>"><?= $rrr->username; ?></option>
                    <?php endforeach ?>
                  </select>
                    <?php echo form_error('id_pengguna'); ?>
          </div>
      <br>


        <a href="<?php echo base_url('admin/lihat_data_anggota'); ?>" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Simpan Data Anggota</button>


      <?php echo form_close(); ?>
<?php } ?>

    </div>
</section>
</div>