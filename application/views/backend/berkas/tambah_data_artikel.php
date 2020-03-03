<div class="content-wrapper">
<section class="content">
      <div class="box-body">


          <?php echo form_open_multipart('admin/simpan_data_artikel', ['class' => 'form-group', 'method' => 'post']); ?>
            <input type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna'); ?>">

            <div class="form-group">
              <label>JUDUL</label>
              <input type="text" name="judul" class="form-control">
              <?php echo form_error('judul'); ?>
            </div>
            <div class="form-group">
              <label>KETERANGAN ARTIKEL</label>
              <input type="text" name="isi_teks" class="form-control">
              <?php echo form_error('isi_teks'); ?>
            </div>
            <div class="form-group">
              <label>WAKTU PENERBITAN</label>
              <input type="date" name="waktu" class="form-control">
              <?php echo form_error('waktu'); ?>
            </div>
            <div class="form-group">
                <label>JENIS ARTIKEL</label>
                  <select name="id_kategori_artikel" class="form-control">
                    <option>-- PILIH JENIS ARTIKEL --</option>
                    <?php $id_kategori_artikel = $this->db->get('tb_kategori_artikel')->result(); ?>
                    <?php foreach ($id_kategori_artikel as $rrr): ?>
                      <option value="<?= $rrr->id_kategori_artikel; ?>"><?= $rrr->kategori; ?></option>
                    <?php endforeach ?>
                  </select>
                    <?php echo form_error('id_kaktegori_artikel'); ?>
          </div>
            <div class="form-group">
              <label>FOTO</label>
              <input type="file" name="foto" class="form-control">
              <?php echo form_error('foto'); ?>
            </div>
            <br>
             <a href="<?php echo base_url('admin/lihat_data_artikel'); ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Publish</button>


          <?php   echo form_close(); ?>


      </div>
    </section>
  </div>