
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

      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumlah_data_anggota; ?></h3>

              <p>Data Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/lihat_data_anggota'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3> <?php echo $jumlah_data_anggota; ?> </h3>

              <p>Pengguna Sistem</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/lihat_pengguna_sistem'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3> <?php echo $jumlah_data_pendidikan; ?> </h3>

              <p>Data Pendidikan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/lihat_data_pendidikan'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3> <?php echo $jumlah_data_dokumen; ?> </h3>

              <p>Data Dokumen</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/lihat_data_dokumen'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3> 1<!-- <?php echo $jumlah_data_artikel; ?> --> </h3>

              <p>Data Artikel</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/lihat_data_artkel'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box warning">
            <div class="inner">
              <h3> <?php echo $jumlah_data_kategori_artikel; ?> </h3>

              <p>Data Kategori Artikel</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo base_url('admin/lihat_data_kategori_artkel'); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        

      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
     
    <!-- </section> -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <!-- /Main Content -->


    <!-- Main content -->
   <!--  <section class="content">
      <div class="box">
        <div class="box-header with-border">
        
          <div class="box-tools pull-right">
        
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> 
                <i class="fa fa-minus"></i></button>-->
              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Tutup"> -->
        <!--         <i class="fa fa-times"></i></button>
          </div>
        </div>
          <div class="box-body">
            <h4><?php echo "selamat datang:) ". $users['name']; ?></h4>
          </div>
      </div>

     
    </section>
    --> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->