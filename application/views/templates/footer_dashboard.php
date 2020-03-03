

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">NAMA SEKOLAH</a>.</strong> All rights
    reserved.
  </footer>

 

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/lte/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
<!-- CK Editor -->
<script src="<?php echo base_url('assets/lte/bower_components/ckeditor/ckeditor.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/lte/bower_components/fastclick/lib/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/lte/dist/js/adminlte.min.js');?>"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>
$('.custom-file-input').on('change',function(){
  let fileName = $(this).val().split('\\').pop();
  $(this).next('custom-file-label').addClass("selected").html(fileName);
});  
</script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>


</body>
</html>
