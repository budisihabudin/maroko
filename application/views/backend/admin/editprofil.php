<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="row">
				<div class="col-md-6">
					<?php echo $this->session->flashdata('sukses'); ?>
				</div>
			</div>
			<div class="col-md-6 ">
				<!-- Profile Image -->

          <div class="box box-primary">
            <div class="box-body box-profile ">
              

                <!-- <form class="form-horizontal"> -->
                	<?php echo form_open_multipart('admin/edit_profil');?>

                  <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/foto_admin/').$tb_pengguna_sistem['foto']; ?>" alt="User profile picture" >

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label" >Nama</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNama" placeholder="Nama" name="nama" value="<?= $tb_pengguna_sistem['nama']; ?>"  >
                      <?php echo form_error('nama'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="<?= $tb_pengguna_sistem['username']; ?>" >
                      <?php echo form_error('username'); ?>

                    </div>
                  </div>
                  <div class="form-group">
                  	<label for="Foto" class="col-sm-2 control-label">Foto</label>

                  	<div class="col-sm-10">
                  		<input type="file" name="foto">
                  	</div>
                  </div>

              <button type="submit" class=" btn btn-primary btn-block">Edit</button>    
                </form>

              <!-- <a href="<?php echo base_url('admin/editprofil'); ?>" type="submit" class="btn btn-primary btn-block"><b>Edit Profil</b></a> -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


	</section>
</div>