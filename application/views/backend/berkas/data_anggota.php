
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
                  <th>FOTO</th>
                  <th>NIK</th>
                  <th >NAMA</th>
                  <th>ALAMAT INDONESIA</th>
                  <th>ALAMAT MAROKO</th>
                  <th>JK</th>
                  <!-- <th>Telp</th>
                  <th>NAMA AYAH</th>
                  <th>NAMA IBU</th>
                  <th>PEKERJAAN AYAH</th>
                  <th>PEKERJAAN IBU</th>
                  <th>PENDIDIKAN</th> -->
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
                  <td><img width="200" height="200" src="<?php echo base_url().'upload/foto/'.$r->foto ?>"></td>
                  <td nowrap><?php echo $r->nik; ?></td>
                  <td nowrap><?php echo $r->nama; ?></td>
                  <td nowrap><?php echo $r->alamat_ind; ?></td>
                  <td nowrap><?php echo $r->alamat_mrk; ?></td>
                  <td nowrap><?php echo $r->jk; ?></td>
                  <!-- <td nowrap><?php echo $r->no_telp; ?></td>
                  <td nowrap><?php echo $r->nama_ayah; ?></td>
                  <td nowrap><?php echo $r->nama_ibu; ?></td>
                  <td nowrap><?php echo $r->pekerjaan_ayah; ?></td>
                  <td nowrap><?php echo $r->pekerjaan_ibu; ?></td>
                  <td nowrap><?php echo $r->pendidikan; ?></td> -->
                  
                 <td nowrap>
                  <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#edit_dataanggota"><i title="Edit" class="fa fa-pencil fa-sm"></i></button> -->
                   <a href="<?php echo base_url().'admin/edit_anggota/'.$r->id_anggota; ?>"> <i class="fa fa-fw fa-pencil" title="Edit"></i></a> |
                  <a href="<?php echo base_url().'admin/hapus_anggota/'.$r->id_anggota; ?>"> <i  class="fa fa-fw fa-trash" title="Hapus"></i></a>  |  <a href="<?php echo base_url().'admin/detail_data_anggota/'.$r->id_anggota?>"> <i  class="fa fa-fw fa-eye" title="Detail"></i></a> 
                  </td>

              </tr>
              
              <?php $i++;
               }?>

             </tbody>
              </table>

              </div>

<!-- Modal -->
<div class="modal fade" id="tambah_dataanggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT DATA ANGGOTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/tambah_anggota'); ?>" method="post">
          
          <div class="form-group">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control">
            <?php echo form_error('nik'); ?>
          </div>
          <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="nama" class="form-control">
            <?php echo form_error('nama'); ?>
          </div>
          <div class="form-group">
            <label>ALAMAT INDONESIA</label>
            <input type="text" name="alamat_ind" class="form-control">
            <?php echo form_error('alamat_ind'); ?>
          </div>
          <div class="form-group">
            <label>ALAMAT MAROKO</label>
            <input type="text" name="alamat_mrk" class="form-control">
            <?php echo form_error('alamat_mrk'); ?>
          </div>
          <div class="form-group">
            <label>JENIS KELAMIN</label><br>
            <input type="radio" name="jk"  value="1">&nbsp;Laki - Laki&nbsp;
            <input type="radio" name="jk"  value="2">&nbsp;Perempuan
            <?php echo form_error('jk'); ?>
          </div>
          <div class="form-group">
            <label>NOMOR TELEPON</label>
            <input type="text" name="no_telp" class="form-control">
            <?php echo form_error('no_telp'); ?>
          </div>
          <div class="form-group">
                <label>PENDIDIKAN SEKARANG</label>
                  <select name="id_pendidikan" class="form-control">
                    <option>-- PILIH PENDIDIKAN --</option>
                    <?php $id_pendidikan = $this->db->get('tb_pendidikan')->result(); ?>
                    <?php foreach ($id_pendidikan as $rr): ?>
                      <option value="<?= $rr->id_pendidikan; ?>"><?= $rr->pendidikan ?></option>
                    <?php endforeach ?>
                  </select>
                    <?php echo form_error('id_pendidikan'); ?>
          </div>
           <div class="form-group">
                <label>ANGGOTA</label>
                  <select name="id_pengguna" class="form-control">
                    <option>-- PILIH PENGGUNA --</option>
                    <?php $id_pengguna = $this->db->get('tb_data_anggota')->result(); ?>
                    <?php foreach ($id_pengguna as $row): ?>
                      <option value="<?= $row->id_anggota; ?>"><?= $row->nama ?></option>
                    <?php endforeach ?>
                  </select>
                    <?php echo form_error('id_pengguna'); ?>
          </div>


          <div class="form-group">
            <label>NAMA AYAH</label>
            <input type="text" name="nama_ayah" class="form-control">
            <?php echo form_error('nama_ayah'); ?>
          </div>
          <div class="form-group">
            <label>NAMA IBU</label>
            <input type="text" name="nama_ibu" class="form-control">
            <?php echo form_error('nama_ibu'); ?>
          </div>
          <div class="form-group">
            <label>PEKERJAAN AYAH</label>
            <input type="text" name="pekerjaan_ayah" class="form-control">
            <?php echo form_error('pekerjaan_ayah'); ?>
          </div>
          <div class="form-group">
            <label>PEKERJAAN IBU</label>
            <input type="text" name="pekerjaan_ibu" class="form-control">
            <?php echo form_error('pekerjaan_ibu'); ?>
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
