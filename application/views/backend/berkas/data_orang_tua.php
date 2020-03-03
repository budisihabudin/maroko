
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
              <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_datadaftarsekolah"><i class="fa fa-plus fa-sm"></i> Tambah Data Wali</button>
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
                  <th >NAMA</th>
                  <th>PEKERJAAN</th>
                  <th>No. Telepom</th>
                  <th align="center">Tindakan</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($tb_org_tua as $r) { 
                 ?>

                <tr>
                  <!-- <input type="checkbox" class="delete_checkbox" value="'.$id.'" name="id">&nbsp;&nbsp; -->
                  <td><?php echo $i; ?></td>
                  <td nowrap><?php echo $r->nama_orgtua; ?></td>
                  <td nowrap><?php echo $r->pekerjaan; ?></td>
                  <td nowrap><?php echo $r->no_telp; ?></td>
                  
                 <td nowrap>
                  <a  data-toggle="modal" data-target="#edit_datadaftarsekolah"><i title="Edit" class="fa fa-pencil fa-sm"></i></a>
                   <!-- <a href="<?php echo base_url().'admin/edit_data_daftar/'.$r->id_daftar_sekolah; ?>"> <i class="fa fa-fw fa-pencil" title="Edit"></i></a> --> |
                  <a href="<?php echo base_url().'admin/hapus_data_orgtua/'.$r->id_org_tua; ?>"> <i  class="fa fa-fw fa-trash" title="Hapus"></i></a>  <!-- |  <a href="<?php echo base_url().'admin/detail_pendaftar/'.$a->id?>"> <i  class="fa fa-fw fa-eye" title="Detail"></i></a>  -->
                  </td>

              </tr>
              
              <?php $i++;
               }?>

             </tbody>
              </table>

              </div>

<!-- Modal -->
<div class="modal fade" id="tambah_datadaftarsekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA DAFTAR SEKOLAH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/tambah_daftar_sekolah'); ?>" method="post">
          <div class="form-group">
            <label>NAMA DAFTAR SEKOLAH</label>
            <!-- <input type="text" > -->
            <select name="nama_daftar" class="form-control">
              <option>-- Pilih --</option>
              <option>SD</option>
              <option>SMP</option>
              <option>SMA</option>
              <option>PERGURUAN TINGGI</option>
            </select>
            <?php echo form_error('nama_daftar'); ?>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Daftar Sekolah</button>
      </div>

      </form>

    </div>
  </div>
</div>
</div>
</tbody>

<!-- akhir modal -->

<!-- Modal edit-->
<div class="modal fade" id="edit_datadaftarsekolah" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA DAFTAR SEKOLAH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/simpan_daftar_sekolah/'.$r->id_daftar_sekolah; ?>"method="post">
          <div class="form-group">
            <label>NAMA DAFTAR SEKOLAH</label>
            <!-- <input type="text" > -->
            <select name="nama_daftar" class="form-control" value="<?php echo $r->nama_daftar ?>">
              <option>-- Pilih --</option>
              <option>SD</option>
              <option>SMP</option>
              <option>SMA</option>
              <option>PERGURUAN TINGGI</option>
            </select>
            <?php echo form_error('nama_daftar'); ?>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Daftar Sekolah</button>
      </div>

      </form>

    </div>
  </div>
</div>
</div>
</tbody>

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
