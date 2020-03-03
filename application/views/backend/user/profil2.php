<div class="content-wrapper">

 <!-- Main content -->
    <section class="content">

      <div class="row" >

        <div class="row">
        <div class="col-md-6">
          <?php echo $this->session->flashdata('sukses'); ?>
        </div>
      </div>

        <div class="col-md-7" >
<?php foreach ($tb_data_anggota as $r) {
 
 ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php echo form_open_multipart('user/simpanprofil');?>
               <img style="width: 200px; height: 200px;"  class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/foto_user/').$tb_pengguna_sistem['foto']; ?>" alt="User profile picture" >
               <br>
              <!-- <h3 class="profile-username text-center"><?= $r->nama; ?></h3> -->

              <!-- <p class="text-muted text-center"><?php echo $r->status_pengguna; ?></p> -->
               <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $r->nama ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control form-control-sm" id="colFormLabelSm" value="<?php echo $r->username ?>" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Pendidikan </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="colFormLabel" value="<?php echo $r->pendidikan ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Alamat Indonesia</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->alamat_ind ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Alamat Maroko</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->alamat_mrk ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->jk ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">No. Telepon</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->no_telp ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Nama Ayah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->nama_ayah ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Nama Ibu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->nama_ibu ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Pekerjaan Ayah</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->pekerjaan_ayah ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Pekerjaan Ibu</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-lg" id="colFormLabelLg" value="<?php echo $r->pekerjaan_ibu ?>" readonly>
                </div>
              </div>
              
                  <div class="form-group text-center">
                    <button type="submit" class="btn btn-warning"><a class="text-black" href="<?php echo base_url('user/editprofil'); ?>">Edit Profil</a></button>
                      <!-- <a href="<?php echo base_url('user/editprofil'); ?>"><button type="submit" class="btn btn-primary btn-block">Edit</button></a> -->
                  </div>
                  

                <?php echo form_close(); ?>




              

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <?php } ?>

    
        </div>
      
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

</div>