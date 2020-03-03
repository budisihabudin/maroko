
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
              <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_dataanggota"><i class="fa fa-plus fa-sm"></i> Tambah Data Anggota</button>
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
                  <th>NIK</th>
                  <th >NAMA</th>
                  <th>ALAMAT INDONESIA</th>
                  <th>ALAMAT MAROKO</th>
                  <th>JK</th>
                  <th>Telp</th>
                  <th>NAMA AYAH</th>
                  <th>NAMA IBU</th>
                  <th>PEKERJAAN AYAH</th>
                  <th>PEKERJAAN IBU</th>
                  <th>PENDIDIKAN</th>
                  <th align="center">PILIHAN</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($tb_data_anggota as $r) { 
                 ?>

                <tr>
                  <!-- <input type="checkbox" class="delete_checkbox" value="'.$id.'" name="id">&nbsp;&nbsp; -->
                  <td><?php echo $i; ?></td>
                  <td nowrap><?php echo $r->nik; ?></td>
                  <td nowrap><?php echo $r->nama; ?></td>
                  <td nowrap><?php echo $r->alamat_ind; ?></td>
                  <td nowrap><?php echo $r->alamat_mrk; ?></td>
                  <td nowrap><?php echo $r->jk; ?></td>
                  <td nowrap><?php echo $r->no_telp; ?></td>
                  <td nowrap><?php echo $r->nama_ayah; ?></td>
                  <td nowrap><?php echo $r->nama_ibu; ?></td>
                  <td nowrap><?php echo $r->pekerjaan_ayah; ?></td>
                  <td nowrap><?php echo $r->pekerjaan_ibu; ?></td>
                  <td nowrap><?php echo $r->pendidikan; ?></td>
                  
                 <td nowrap>
                  <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#edit_dataanggota"><i title="Edit" class="fa fa-pencil fa-sm"></i></button> -->
                   <a href="<?php echo base_url().'admin/edit_anggota/'.$r->id_anggota; ?>"> <i class="fa fa-fw fa-pencil" title="Edit"></i></a> |
                  <a href="<?php echo base_url().'admin/hapus_anggota/'.$r->id_anggota; ?>"> <i  class="fa fa-fw fa-trash" title="Hapus"></i></a>  <!-- |  <a href="<?php echo base_url().'admin/detail_pendaftar/'.$a->id?>"> <i  class="fa fa-fw fa-eye" title="Detail"></i></a>  -->
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
