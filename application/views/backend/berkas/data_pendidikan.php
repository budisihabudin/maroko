
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
              <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_datapendidikan"><i class="fa fa-plus fa-sm"></i> Tambah Data Pendidikan</button>
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
                  <th >NAMA UNIT</th>
                  <th>JURUSAN</th>
                  <th>FAKULTAS</th>
                  <th>KELAS</th>
                  <th align="center">Tindakan</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($tb_pendidikan as $r) { 
                 ?>

                <tr>
                  <!-- <input type="checkbox" class="delete_checkbox" value="'.$id.'" name="id">&nbsp;&nbsp; -->
                  <td><?php echo $i; ?></td>
                  <td nowrap><?php echo $r->pendidikan; ?></td>
                  <td nowrap><?php echo $r->jurusan; ?></td>
                  <td nowrap><?php echo $r->fakultas; ?></td>
                  <td nowrap><?php echo $r->kelas; ?></td>
                  
                 <td nowrap>
                  <a  data-toggle="modal" data-target="#edit_datapendidikan"><i title="Edit" class="fa fa-pencil fa-sm"></i></a>
                   <!-- <a href="<?php echo base_url().'admin/edit_data_pendidikan/'.$r->id_daftar_sekolah; ?>"> <i class="fa fa-fw fa-pencil" title="Edit"></i></a> --> |
                  <a href="<?php echo base_url().'admin/hapus_data_pendidikan/'.$r->id_pendidikan; ?>"> <i  class="fa fa-fw fa-trash" title="Hapus"></i></a>  <!-- |  <a href="<?php echo base_url().'admin/detail_pendaftar/'.$a->id?>"> <i  class="fa fa-fw fa-eye" title="Detail"></i></a>  -->
                  </td>

              </tr>
              
              <?php $i++;
               }?>

             </tbody>
              </table>

              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>








<!-- Modal -->
<div class="modal fade" id="tambah_datapendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PENDIDIKAN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/tambah_data_pendidikan'); ?>" method="post">
          <div class="form-group">
            <label>PENDIDIKAN SEKARANG</label>
            <!-- <input type="text" > -->
            <select name="pendidikan" class="form-control">
              <option>-- Pilih Pendidikan --</option>
              <option>SD</option>
              <option>SMP</option>
              <option>SMA</option>
              <option>D1</option>
              <option>D2</option>
              <option>D3</option>
              <option>D4</option>
              <option>S1</option>
              <option>S2</option>
              <option>S3</option>
            </select>
            <?php echo form_error('pendidikan'); ?>
          </div>
           <div class="form-group">
            <label>FAKULTAS</label>
            <input type="text" name="fakultas" class="form-control">
            <?php echo form_error('fakultas'); ?>
          </div>
          <div class="form-group">
            <label>JURUSAN</label>
            <input type="text" name="jurusan" class="form-control">
            <?php echo form_error('jurusan'); ?>
          </div>
          <div class="form-group">
            <label>KELAS</label>
            <input type="text" name="kelas" class="form-control">
            <?php echo form_error('kelas'); ?>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Pendidikan</button>
      </div>

      </form>
    </div>

    </div>
  </div>
</div>
<!-- </div> -->


<!-- akhir modal -->

<!-- Modal edit-->
<div class="modal fade" id="edit_datapendidikan" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">FORM EDIT DATA PENDIDIKAN</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/simpan_data_pendidikan/'.$r->id_pendidikan; ?>"method="post">
          <div class="form-group">
            <label>PENDIDIKAN SEKARANG</label>
            <!-- <input type="text" > -->
            <select name="pendidikan" class="form-control" value="<?php echo $r->pendidikan ?>">
              <option>-- Pilih Pendidikan --</option>
              <option>SD</option>
              <option>SMP</option>
              <option>SMA</option>
               <option>D1</option>
              <option>D2</option>
              <option>D3</option>
              <option>D4</option>
              <option>S1</option>
              <option>S2</option>
              <option>S3</option>
            </select>
            <?php echo form_error('pendidikan'); ?>
          </div>
          <div class="form-group">
            <label>FAKULTAS</label>
            <input type="text" name="fakultas" class="form-control" value="<?php echo $r->fakultas ?>">
            <?php echo form_error('fakultas'); ?>
          </div>
          <div class="form-group">
            <label>JURUSAN</label>
            <input type="text" name="jurusan" class="form-control" value="<?php echo $r->jurusan ?>">
            <?php echo form_error('jurusan'); ?>
          </div>
          <div class="form-group">
            <label>KELAS</label>
            <input type="text" name="kelas" class="form-control" value="<?php echo $r->kelas ?>">
            <?php echo form_error('kelas'); ?>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Pendidikan</button>
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
