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
        <li class="active">About Us</li>
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
    <div class="alert alert-success" id="success-alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
    </div>
    <?php
	unset($_SESSION['successmsg']);
	}
	else if(isset($_SESSION['errormsg']))
	{
	?>
    <div class="alert alert-danger" id="success-alert">
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
           
            <form action="<?php echo BASE_URI.'backend/about-us/editcms'; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="txtCid" value="<?php if(isset($bannerinfo['cms_id'])){echo $bannerinfo['cms_id'];} ?>"/>
            <input type="hidden" name="hid_gallery_pdf1" id="hid_gallery_pdf1" value="<?php if(isset($bannerinfo['cms_aimage1'])){echo $bannerinfo['cms_aimage1'];} ?>" />
            <input type="hidden" name="hid_gallery_pdf2" id="hid_gallery_pdf2" value="<?php if(isset($bannerinfo['cms_aimage2'])){echo $bannerinfo['cms_aimage2'];} ?>" />
            <input type="hidden" name="hid_gallery_pdf3" id="hid_gallery_pdf3" value="<?php if(isset($bannerinfo['cms_aimage3'])){echo $bannerinfo['cms_aimage3'];} ?>" />
            <input type="hidden" name="hid_gallery_pdf4" id="hid_gallery_pdf4" value="<?php if(isset($bannerinfo['cms_aimage4'])){echo $bannerinfo['cms_aimage4'];} ?>" />
            <input type="hidden" name="hid_gallery_pdf5" id="hid_gallery_pdf5" value="<?php if(isset($bannerinfo['cms_pdf'])){echo $bannerinfo['cms_pdf'];} ?>" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Type</label><br/>
                   <input type="radio" name="txtType" value="1" <?php if($bannerinfo['cms_choice']=='1')echo"checked"; ?>> PDF Format   <input type="radio" name="txtType" value="0" <?php if($bannerinfo['cms_choice']=='0')echo"checked"; ?>> Page Format 
                </div>
                <div class="row">
                  <div class="col-sm-6">
                  <h3><u>Page Format</u></h3>
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Title</label>
                  <input type="text" class="form-control" name="txtTitle" placeholder="Enter Banner Title" value="<?php if(isset($bannerinfo['cms_title'])){echo $bannerinfo['cms_title'];} ?>" required>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                  <label for="exampleInputFile">Image 1</label>
                  <input type="file" id="prfxbtn" name="imgXBanner"><br/>
                  <img src="<?php if(!empty($bannerinfo['cms_aimage1'])){echo BASE_URI.'uploads/'.$bannerinfo['cms_aimage1'];} ?>" id="xprofile" width="200" height="80"/>
                  <p class="help-block" style="font-size:12px;"><i>Image should be of size 248 X 216 px.</i></p>
                </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="exampleInputFile">Image 2</label>
                  <input type="file" id="prfybtn" name="imgYBanner"><br/>
                  <img src="<?php if(!empty($bannerinfo['cms_aimage2'])){echo BASE_URI.'uploads/'.$bannerinfo['cms_aimage2'];} ?>" id="yprofile" width="200" height="80"/>
                  <p class="help-block" style="font-size:12px;"><i>Image should be of size 248 X 216 px.</i></p>
                </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                  <label for="exampleInputFile">Image 3</label>
                  <input type="file" id="prfzbtn" name="imgZBanner"><br/>
                  <img src="<?php if(!empty($bannerinfo['cms_aimage3'])){echo BASE_URI.'uploads/'.$bannerinfo['cms_aimage3'];} ?>" id="zprofile" width="200" height="80"/>
                   <p class="help-block" style="font-size:12px;"><i>Image should be of size 248 X 216 px.</i></p>
                </div>
                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="exampleInputFile">Image 4</label>
                  <input type="file" id="prfwbtn" name="imgWBanner"><br/>
                  <img src="<?php if(!empty($bannerinfo['cms_aimage4'])){echo BASE_URI.'uploads/'.$bannerinfo['cms_aimage4'];} ?>" id="wprofile" width="200" height="80"/>
                  <p class="help-block" style="font-size:12px;"><i>Image should be of size 248 X 216 px.</i></p>
                </div>
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="exampleInputFile">Page Content</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="120">
                                           <?php if(isset($bannerinfo['cms_content'])){echo $bannerinfo['cms_content'];} ?>
                    </textarea>
                </div>
                  </div>
                  <div class="col-sm-6">
                   <h3><u>PDF Format</u></h3>
                   <div class="form-group">
                  <label for="exampleInputFile">Select Your PDF File</label>
                  <input type="file" id="pdfFile" name="pdfFile"><br/>
                  <?php if(!empty($bannerinfo['cms_pdf'])){ ?><a target="_blank" href="<?php echo BASE_URI.'uploads/'.$bannerinfo['cms_pdf']; ?>">Click to Download</a><?php } ?>
                 
                   </div>
                  </div>
                </div>
                
                <h3><u>Footer Text</u></h3>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="txtFTitle" placeholder="Enter Footer Title" value="<?php if(isset($bannerinfo['cms_ftitle'])){echo $bannerinfo['cms_ftitle'];} ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Content</label>
                   <textarea id="feditor1" name="feditor1" rows="10" cols="120">
                                           <?php if(isset($bannerinfo['cms_fcontent'])){echo $bannerinfo['cms_fcontent'];} ?>
                    </textarea>
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

	 function readXURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#xprofile').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
    $("#prfxbtn").change(function(){
        readXURL(this);
    });
	});
</script>
<script>

	 function readYURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#yprofile').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
    $("#prfybtn").change(function(){
        readYURL(this);
    });
	});
</script>
<script>

	 function readZURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#zprofile').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
    $("#prfzbtn").change(function(){
        readZURL(this);
    });
	});
</script>
<script>

	 function readWURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#wprofile').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
    $("#prfwbtn").change(function(){
        readWURL(this);
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
    CKEDITOR.replace('editor1');
	CKEDITOR.replace('feditor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script>
	$("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){
               $("#success-alert").alert('close');
                });   
	</script>
</body>
</html>
