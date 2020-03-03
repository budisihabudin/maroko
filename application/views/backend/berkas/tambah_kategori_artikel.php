<div class="content-wrapper">
<section class="content">
      <div class="box-body">
       
           <?php echo form_open('admin/simpan_data_kategori_artikel', ['method' => 'POST']);?>
          
          <div class="form-group">
            <label>KATEGORI ARTIKEL</label>
            <input type="text" name="kategori" class="form-control">
            <?php echo form_error('kategori'); ?>
          </div>
         
      <br>


        <a href="<?php echo base_url('admin/lihat_kategori_artikel'); ?>" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-primary">Simpan Data Kategori</button>


      <?php echo form_close(); ?>

    </div>
</section>
</div>