<!DOCTYPE html>
<html>
<head>
  <base href="<?php echo BASE_URI; ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $headtitle; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include("include/header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include("include/sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Home Page Content</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
           
               <?php
	if(isset($_SESSION['successmsg']))
	{
	?>
    <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
    </div>
    <?php
	unset($_SESSION['successmsg']);
	}
	else if(isset($_SESSION['errormsg']))
	{
	?>
    <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php echo $_SESSION['errormsg']; ?>
    </div>
    <?php
	unset($_SESSION['errormsg']);
	}
	?>
            
            <!-- /.box-header -->
            <!-- form start -->
           
            
            <!-- /.box-header -->
           
            <form action="<?php echo BASE_URI.'backend/home_page/contentedit'; ?>" method="post" enctype="multipart/form-data">
           
            <input type="hidden" name="txtCid" value="<?php if(isset($bannerinfo['home_id'])){echo $bannerinfo['home_id'];} ?>"/>
           
           
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="txtTitle" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_title'])){echo $bannerinfo['home_title'];} ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">What we offer</label>
                  <div class="row">
                   <div class="col-sm-4">
                   <input type="text" class="form-control" name="txtOt1" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_offer1_title'])){echo $bannerinfo['home_offer1_title'];} ?>"><br/>
                   <textarea class="form-control" rows="5" name="txtOc1"><?php if(isset($bannerinfo['home_offer1_content'])){echo $bannerinfo['home_offer1_content'];} ?></textarea>
                   </div>
                   <div class="col-sm-4">
                   <input type="text" class="form-control" name="txtOt2" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_offer2_title'])){echo $bannerinfo['home_offer2_title'];} ?>"><br/>
                   <textarea class="form-control" rows="5" name="txtOc2"><?php if(isset($bannerinfo['home_offer2_content'])){echo $bannerinfo['home_offer2_content'];} ?></textarea>
                   </div>
                   <div class="col-sm-4">
                   <input type="text" class="form-control" name="txtOt3" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_offer3_title'])){echo $bannerinfo['home_offer3_title'];} ?>"><br/>
                   <textarea class="form-control" rows="5" name="txtOc3"><?php if(isset($bannerinfo['home_offer3_content'])){echo $bannerinfo['home_offer3_content'];} ?></textarea>
                   </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Some Stats</label>
                  <div class="row">
                   <div class="col-sm-3">
                   <input type="text" class="form-control" name="txtSt1" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_stat1_title'])){echo $bannerinfo['home_stat1_title'];} ?>"><br/>
                   <input type="text" class="form-control" name="txtSc1" placeholder="Enter Count" value="<?php if(isset($bannerinfo['home_stat1_content'])){echo $bannerinfo['home_stat1_content'];} ?>" >
                   </div>
                   <div class="col-sm-3">
                   <input type="text" class="form-control" name="txtSt2" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_stat2_title'])){echo $bannerinfo['home_stat2_title'];} ?>" ><br/>
                   <input type="text" class="form-control" name="txtSc2" placeholder="Enter Count" value="<?php if(isset($bannerinfo['home_stat2_content'])){echo $bannerinfo['home_stat2_content'];} ?>" >
                   </div>
                   <div class="col-sm-3">
                   <input type="text" class="form-control" name="txtSt3" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_stat3_title'])){echo $bannerinfo['home_stat3_title'];} ?>" ><br/>
                   <input type="text" class="form-control" name="txtSc3" placeholder="Enter Count" value="<?php if(isset($bannerinfo['home_stat3_content'])){echo $bannerinfo['home_stat3_content'];} ?>" >
                   </div>
                   <div class="col-sm-3">
                   <input type="text" class="form-control" name="txtSt4" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_stat4_title'])){echo $bannerinfo['home_stat4_title'];} ?>" ><br/>
                   <input type="text" class="form-control" name="txtSc4" placeholder="Enter Count" value="<?php if(isset($bannerinfo['home_stat4_content'])){echo $bannerinfo['home_stat4_content'];} ?>" >
                   </div>
                  </div>
                </div>
            
            <div class="form-group">
                  <label for="exampleInputEmail1">Current Information</label>
                  <div class="row">
                   <div class="col-sm-4">
                   <input type="text" class="form-control" name="txtXt1" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_sec1_title'])){echo $bannerinfo['home_sec1_title'];} ?>" ><br/>
                   <textarea class="form-control" rows="5" name="txtXc1"><?php if(isset($bannerinfo['home_sec1_content'])){echo $bannerinfo['home_sec1_content'];} ?></textarea>
                   </div>
                   <div class="col-sm-4">
                   <input type="text" class="form-control" name="txtYt2" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_sec2_title'])){echo $bannerinfo['home_sec2_title'];} ?>" ><br/>
                   <textarea class="form-control" rows="5" name="txtYc2"><?php if(isset($bannerinfo['home_sec2_content'])){echo $bannerinfo['home_sec2_content'];} ?></textarea>
                   </div>
                   <div class="col-sm-4">
                   <input type="text" class="form-control" name="txtZt3" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_sec3_title'])){echo $bannerinfo['home_sec3_title'];} ?>" ><br/>
                   <textarea class="form-control" rows="5" name="txtZc3"><?php if(isset($bannerinfo['home_sec3_content'])){echo $bannerinfo['home_sec3_content'];} ?></textarea>
                   </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Section</label>
                  <input type="text" class="form-control" name="txtLTitle" placeholder="Enter Title" value="<?php if(isset($bannerinfo['home_fsec_title'])){echo $bannerinfo['home_fsec_title'];} ?>" >
                </div>
                <div class="form-group">
                  
                 <textarea class="form-control" rows="7" name="txtLContent"><?php if(isset($bannerinfo['home_fsec_content'])){echo $bannerinfo['home_fsec_content'];} ?></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              
              
              <div class="box-footer">
              
                 <button type="submit" class="btn btn-primary" value="list" name="btnSave">Save</button>
                
           
              </div>
            </form>
            <!-- /.box-body -->
         
          </div>
          <!-- /.box -->

       
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("include/footer.php"); ?>
  

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="assets/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<!-- jQuery 2.2.0 -->
<script src="assets/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/admin/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>

	 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
    $("#prfbtn").change(function(){
        readURL(this);
    });
	});
</script>
<script>

	 function readTURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#tprofile').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
    $("#tprfbtn").change(function(){
        readTURL(this);
    });
	});
</script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1',{
     
    removeButtons: 'Source,Image,Table',

});
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
