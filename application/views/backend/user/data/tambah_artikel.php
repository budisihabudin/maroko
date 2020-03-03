 
<div class="content-wrapper">
<section class="content">
      <div class="box-body">

<!--
          <?php echo form_open_multipart('user/post_artikel', ['class' => 'form-group', 'method' => 'post']); ?>
            <input type="hidden" name="id_anggota" value="<?= $this->session->userdata('id_anggota'); ?>">

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
             <a href="<?php echo base_url('user/lihat_artikel'); ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Publish</button>


          <?php   echo form_close(); ?>


      </div>
    </section>
  </div> --> 



  <!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <link rel="stylesheet" type="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.0/jquery.tinymce.min.js"> -->
<!--     <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

  </head>

  <body>
  <h1>TinyMCE Quick Start Guide</h1>
    <form method="post">
      
      <textarea id="mytextarea">Hello, World!</textarea>
      
    </form>
  </body>
</html>-->



 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
              </h3>
              <!-- tools box -->
              <!-- <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div> -->
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                  <?php echo form_open_multipart('user/post_artikel', ['class' => 'form-group', 'method' => 'post']); ?>
            <input type="hidden" name="id_anggota" value="<?= $this->session->userdata('id_anggota'); ?>">

                 <div class="form-group">
              <label>JUDUL</label>
              <input type="text" name="judul" class="form-control">
              <?php echo form_error('judul'); ?>
            </div>
            <!-- <div class="form-group">
              <label>KETERANGAN ARTIKEL</label>
              <input type="text" name="isi_teks" class="form-control">
              <?php echo form_error('isi_teks'); ?>
            </div> -->
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
            <div class="form-group">
                    <label>KETERANGAN ARTIKEL</label>
                    <textarea id="editor1" name="isi_teks" rows="10" cols="80">
                    </textarea>
              </div>

                <a href="<?php echo base_url('user/lihat_artikel'); ?>" class="btn btn-warning">Cancel</a>
            <button type="submit" class="btn btn-primary">Publish</button>


              <?php echo form_close(); ?>

            </div>
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->

  </div>
</section>
</div>

