<body class="hold-transition login-page" style="background-image: url(assets/course/images/author.jpg);">
<div class="register-box" >
  <!-- <div class="register-logo">
    <a href="#"><b>Ibnu</b>Sina</a>
  </div> -->

  <div class="register-box-body" style="border-radius: 30px;">
    <!-- <p class="login-box-msg">Halaman Registrasi Akun</p> -->

    <form action="<?php echo base_url('auth/registrasi'); ?>" method="post">
      <div class="form-group">
        <img style="margin-left: 60px; border-radius: 90px;" id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
    </div>
      <div class="form-group has-feedback">
        <input style="border-radius: 30px;" type="text" name="nama" class="form-control form-control-user" placeholder="Nama Anda" value="<?= set_value('nama') ?>">
                    <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input style="border-radius: 30px;" type="username" name="username" class="form-control form-control-user" id="exampleInputUsername" placeholder="Username Anda" value="<?= set_value('username') ?>">
                  <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input style="border-radius: 30px;" type="password" name="password1" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input style="border-radius: 30px;" type="password" name="password2" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Konfirmasi Password">
        <?= form_error('password2','<small class="text-danger pl-3">','</small>'); ?>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button style="border-radius: 30px;" type="submit" class="btn btn-primary btn-block btn-flat">Registrasi</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <div class="checkbox icheck">
            <label>
                <a href="<?php echo base_url('auth'); ?>">Sudah punya akun</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </form>
<!-- 
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div> -->
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
