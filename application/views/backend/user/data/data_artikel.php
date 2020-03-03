
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
              <a class="btn btn-primary" href="<?php echo base_url('user/tambah_artikel'); ?>"><i class="fa fa-plus"></i> Tambah Artikel</a>
              <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_dataartikel"><i class="fa fa-plus fa-sm"></i> Tambah Data Artikel</button> -->
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
                  <th>JUDUL</th>
                  <th >KETERANGAN ARTIKEL</th>
                  <th>WAKTU</th>
                  <th>PENULIS</th>
                  <th>JENIS ARTIKEl</th>
                  <th>FOTO</th>
                  <th align="center">PILIHAN</th>
                </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($tb_artikel as $r) { 
                 ?>

                <tr>
                  <!-- <input type="checkbox" class="delete_checkbox" value="'.$id.'" name="id">&nbsp;&nbsp; -->
                  <td><?php echo $i; ?></td>
                  <td nowrap><?php echo $r->judul; ?></td>
                  <td nowrap><?php echo $r->isi_teks; ?></td>
                  <td><?php echo $r->waktu; ?></td>
                  <td nowrap><?php echo $r->username; ?></td>
                  <td nowrap><?php echo $r->kategori; ?></td>
                  <td><img style="margin-bottom: 3px; margin-top: auto;" src="<?php echo base_url().'upload/artikel/'.$r->foto ?>" width="150px" height="150px"></td>
                  
                 <td nowrap>
                  <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#edit_dataanggota"><i title="Edit" class="fa fa-pencil fa-sm"></i></button> -->
                   <!-- <a href="<?php echo base_url().'user/edit_artikel/'.$r->id_artikel; ?>"> <i class="fa fa-fw fa-pencil" title="Edit"></i></a> | -->
                  <a href="<?php echo base_url().'user/hapus_artikel/'.$r->id_artikel; ?>"> <i  class="fa fa-fw fa-trash" title="Hapus"></i></a>
                  </td>

              </tr>
              
              <?php $i++;
               }?>

             </tbody>
              </table>

              </div>

<!-- Modal -->
<!-- <div class="modal fade" id="tambah_dataanggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA ARTIKEL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/tambah_data_artikel'); ?>" method="post">
          
          <div class="box-body">
            <div class="form-group">
               <label for="">KETERANGAN ARTIKEL</label>
               <textarea name="artikel" class="form-control" id="editor1"><?php echo $iden->artikel; ?></textarea>
            </div>
            <div class="row">
               <div class="col-md-3">
                  <div class="form-group"><img src="" alt="" width="100px"></div>
               </div>
               <div class="col-md-9">
                  <div class="form-group">
                     <label for="">Pilih Foto</label>
                     <input type="file" name="filekepsek" id="" class="form-control">
                  </div>
               </div>
            </div>
         </div>

          
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data Artikel</button>
      </div>

      </form>

    </div>
  </div>
</div>
</div>
</tbody> -->

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
