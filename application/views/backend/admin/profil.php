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
                  <?php echo form_open_multipart('admin/simpanprofil');?>
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/foto_admin/').$tb_pengguna_sistem['foto']; ?>" alt="User profile picture" >


                  <!-- <div class="form-group">
                    <label for="inputStatusPengguna" class="col-sm-2 control-label" >Status</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputStatusPengguna" placeholder="Status Pengguna" name="status_pengguna" value="<?= $tb_pengguna['status_pengguna']; ?>"  readonly>
                      <?php echo form_error('status_pengguna'); ?>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label for="inputNama" class="col-sm-2 control-label" >Nama</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputNama" placeholder="Nama" name="nama" value="<?= $tb_pengguna_sistem['nama']; ?>"  readonly>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username" value="<?= $tb_pengguna_sistem['username']; ?>" readonly>
                      
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputUsername" class="col-sm-2 control-label">STATUS PENGGUNA</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputUsername" placeholder="Status Pengguna" name="status_pengguna" value="<?= $tb_pengguna_sistem['status_pengguna']; ?>" readonly>
                      
                    </div>
                  </div>
                  
                </form>

                
              <a href="<?php echo base_url('admin/edit_profil'); ?>"><button type="submit" class="btn btn-primary btn-block">Edit</button></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


  </section>
</div>
