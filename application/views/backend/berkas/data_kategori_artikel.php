
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
              <a class="btn btn-primary" href="<?php echo base_url('admin/tambah_data_kategori'); ?>">Tambah Artikel</a>
              <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_dataanggota"><i class="fa fa-plus fa-sm"></i> Tambah Data Anggota</button> -->
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <div class="col-xs-12 col-lg-12">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th <input type="checkbox" id="check-all" name="delete_all">No</th> -->
                  <th>NO</th>
                  <th>KATEGORI</th>
                  <th align="center">PILIHAN</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($tb_kategori_artikel as $r) { 
                 ?>

                <tr>
                  <!-- <input type="checkbox" class="delete_checkbox" value="'.$id.'" name="id">&nbsp;&nbsp; -->
                  <td><?php echo $i; ?></td>
                  <td nowrap><?php echo $r->kategori; ?></td>
                 <td nowrap>
                  <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#edit_dataanggota"><i title="Edit" class="fa fa-pencil fa-sm"></i></button> -->
                   <!-- <a href="<?php echo base_url().'admin/edit_data_artikel/'.$r->id_artikel; ?>"> <i class="fa fa-fw fa-pencil" title="Edit"></i></a> | -->
                  <a href="<?php echo base_url().'admin/hapus_kategori_artikel/'.$r->id_kategori_artikel; ?>"> <i  class="fa fa-fw fa-trash" title="Hapus"></i></a>
                  </td>

              </tr>
              
              <?php $i++;
               }?>

             </tbody>
              </table>

              </div>




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
