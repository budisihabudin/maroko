<body class="hold-transition login-page" style="background-image: url(assets/course/images/slider_background.jpg);">
<div class="login-box">
  <!-- <div class="login-logo">
    
  </div> -->
  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius: 30px;" >
    <!-- <p class="login-box-msg">Silahkan Ketikan Username Dan Password Untuk Masuk Sistem Mroko</p> -->

    <?= $this->session->flashdata('pesan'); ?>

    <?php echo form_open('auth');?>
    <div class="form-group">
        <img style="margin-left: 60px; border-radius: 90px;" id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    </div>
      <div class="form-group" >
                      <input style="border-radius: 30px;" type="text" name="username" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Username Anda . . ." value="<?= set_value('username') ?>">
                      <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input style="border-radius: 30px;" type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password . . .">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
      
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12">
          <button style="border-radius: 30px;" type="submit" name="submit" class="btn btn-primary btn-block btn-flat" >Masuk Sistem</button>
        </div>
        <!-- /.col -->
      </div>
      <hr>
                    <div style="text-align: center;">
                    <!-- <a class="small" href="<?= base_url('auth/changepass'); ?>">Lupa Password?</a><br> -->
                    <a class="small" href="<?= base_url('auth/registrasi'); ?>">Buat Akun Baru!</a><br>
                    <a class="small" href="<?= base_url('beranda'); ?>">Beranda</a>
                    </div>

    <?php echo form_close(); ?>

    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->