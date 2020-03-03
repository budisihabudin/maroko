
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <br>
      <ol class="breadcrumb">

        <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="<?php echo base_url('auth/logout'); ?>" >Keluar</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
             <div class="box-header"> 
               <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_datapengguna"><i class="fa fa-plus fa-sm"></i> Tambah Pengguna Sistem</button>
              <!-- <a href="<?php echo base_url('admin/tambah_pengguna'); ?>"><button type="button" class="btn btn-primary">Tambah Penguna Sistem</button></a> -->
              <!-- <a href="<?php echo base_url('admin/detail_pengguna');?>"><button type="button" class="btn btn-green"><i class="fa fa-users" title="Lihat Details"></i>&nbsp;Lihat Detail Data</button></a> -->
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <div class="col-xs-12 col-lg-12">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th <input type="checkbox" id="check-all" name="delete_all">No</th> -->
                  <th>No</th>
                  <th nowrap>NAMA</th>
                  <th nowrap>USERNAME</th>
                  <th nowrap>STATUS AKUN</th>
                  <th nowrap>PENGGUNA</th>
                  <th nowrap>MENDAFTAR</th>
                  <!-- <th nowrap>FOTO</th> -->
                  <th align="center">Tindakan</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($tb_data_anggota as $r) { 
                 ?>

                <tr>
                  <!-- <input type="checkbox" class="delete_checkbox" value="'.$id.'" name="id">&nbsp;&nbsp; -->
                  <td><?php echo $i; ?></td>
                  <td nowrap><?php echo $r->nama; ?></td>
                  <td nowrap><?php echo $r->username; ?></td>
                  <td nowrap><?php 
                  if ($r->status_akun == 1) {
                    echo "Aktif";
                  }
                  elseif ($r->status_akun == 0) {
                    echo "Tidak Aktif";
                  }
                  /*if ($r->status_akun == 1) {
                    echo "Aktif";
                  }
                  elseif ($r->status_akun == 2) {
                    echo "Tidak Aktif";
                  }*/
                  // echo $r->status_akun;  
                    ?></td>
                    <td nowrap><?php 
                  echo $r->status_pengguna;
                    ?></td>
                  <td nowrap><?php echo $r->daftar_pada; ?></td>
                  <!-- <td nowrap><?php echo $r->foto; ?></td> -->
                 <td nowrap>
                  <a  data-toggle="modal" data-target="#edit_datapengguna"><i title="Edit" class="fa fa-pencil fa-sm"></i></a>
                   <!-- <a href="<?php echo base_url().'admin/edit_pengguna_sistem/'.$r->id_anggota; ?>"> <i class="fa fa-fw fa-pencil" title="Edit"></i></a> --> |
                  <a href="<?php echo base_url().'admin/hapus_pengguna_sistem/'.$r->id_anggota; ?>"> <i  class="fa fa-fw fa-trash" title="Hapus"></i></a> <!-- |  <a href="<?php echo base_url().'admin/detail_pendaftar/'.$a->id?>"> <i  class="fa fa-fw fa-eye" title="Detail"></i></a>  -->
                  </td>

              </tr>
              
              <?php $i++;
               }?>

             </tbody>
              </table>

              </div>


<!-- Modal -->
<div class="modal fade" id="tambah_datapengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PENGGUNA SISTEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/tambah_pengguna_sistem'); ?>" method="post">
        
         <div class="form-group has-feedback">
                <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Pengguna Sistem" value="<?= set_value('nama') ?>">
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="username" name="username" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username Pengguna Sistem" value="<?= set_value('username') ?>">
                          <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                  <input type="password" name="password1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                            <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
              </div>
             <!--  <div class="form-group has-feedback">
                    <label>STATUS AKUN</label>
                     <select type="text" name="status_akun" class="form-control" value="<?php echo $r->status_akun; ?>">
                      <option>Pilih</option>
                      <option value="0">Tidak Aktif</option>
                      <option value="1">Aktif</option>
                    </select>
                    <?php echo form_error('status_akun'); ?>
                  </div> -->
                 <!--  <div class="form-group has-feedback">
                    <label>STATUS PENGGUNA</label>
                    <select name="id_anggota" class="form-control">
                            <option>-- PILIH PENGGUNA --</option>
                            <?php $pengguna = $this->db->get_where('tb_aturan_pengguna_sistem')->result(); ?>
                            <?php foreach ($pengguna as $row): ?>
                              <option value="<?= $row->id; ?>"><?= $row->status_pengguna ?></option>
                            <?php endforeach ?>
                          </select>
                  </div> -->


          
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Pengguna Sistem</button>
      </div>

      </form>

    </div>
  </div>
</div>
</div>

<!-- akhir modal -->


<!-- Modal edit-->
<div class="modal fade" id="edit_datapengguna" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM EDIT DATA PENGGUNA SISTEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/simpan_pengguna_sistem/'.$r->id_anggota; ?>" method="post">
        
         <div class="form-group has-feedback">
                <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Pengguna Sistem" value="<?php echo $r->nama; ?>">
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="username" name="username" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username Pengguna Sistem" value="<?php echo $r->username; ?>">
                          <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <!-- <div class="form-group has-feedback">
                  <input type="password" name="password1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                            <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
                <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
              </div> -->
              <div class="form-group has-feedback">
                    <label>STATUS AKUN</label>
                     <select type="text" name="status_akun" class="form-control" value="<?php echo $r->status_akun; ?>">
                      <option>Pilih</option>
                      <option value="0">Tidak Aktif</option>
                      <option value="1">Aktif</option>
                    </select>
                    <?php echo form_error('status_akun'); ?>
                  </div>
                  <div class="form-group has-feedback">
                    <label>STATUS PENGGUNA</label>
                    <select name="status_pengguna" class="form-control" value="<?php echo $r->status_pengguna; ?>">
                            <option>-- PILIH PENGGUNA --</option>
                            <?php $pengguna = $this->db->get('tb_aturan_pengguna_sistem')->result(); ?>
                            <?php foreach ($pengguna as $roww): ?>
                              <option value="<?= $roww->id; ?>"><?= $roww->status_pengguna ?></option>
                            <?php endforeach ?>
                          </select>
                  </div>


          
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Pengguna Sistem</button>
      </div>

      </form>

    </div>
  </div>
</div>
</div>

<!-- akhir modal -->





            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
