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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="assets/admin/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="assets/admin/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="assets/admin/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/admin/dist/css/AdminLTE.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/admin/dist/css/skins/_all-skins.min.css">
  <style type="text/css">
   .fa-file-video-o {
    font-size: 50px;
    cursor: pointer;
   }
   
   
   
  </style>
  <script type="text/javascript">
  $(document).ready(function(){
      $('.upload_video').click(function(){
       
        $('.upload-option').show();
      });
      $('.video_upload').click(function(){
           $('#txtURL').hide();
           $('#txtURL').val("");
           $('.help-block').hide();
           $('#txtVideo').show();
           $('#txtVideo').click();
      });
      $('.link_upload').click(function(){
         $('#txtVideo').hide("");
         $('#txtVideo').hide();
           $('#txtURL').show();
           $('.help-block').show();
      });
      
  });
  </script>
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
        <li class="active">Video Gallery</li>
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
    <strong>Success!</strong> <?php print_r($_SESSION['successmsg']); ?>
    </div>
    <?php
  unset($_SESSION['successmsg']);
  }
  else if(isset($_SESSION['errormsg']))
  {
  ?>
    <div class="alert alert-danger" id="success-alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php print_r( $_SESSION['errormsg']); ?>
    </div>
    <?php
  unset($_SESSION['errormsg']);
  }
  ?>
            
            <!-- /.box-header -->
            <!-- form start -->
           
            
            <!-- /.box-header -->
            <?php
      if($feature=='Add')
      {
      ?>
            <form action="<?php echo BASE_URI.'backend/video_gallery/addbanner'; ?>" method="post" enctype="multipart/form-data">
            <?php
      }
      else if($feature=='Edit')
      {
      ?>
            <form action="<?php echo BASE_URI.'backend/video_gallery/editbanner'; ?>" method="post" enctype="multipart/form-data">
            <?php
      }
      ?>
            <input type="hidden" name="txtCid" value="<?php if(isset($bannerinfo['gvideo_id'])){echo $bannerinfo['gvideo_id'];} ?>"/>
            
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Video Name</label>
                  <input type="text" class="form-control" name="txtTitle" placeholder="Enter Video Name" value="<?php if(isset($bannerinfo['gvideo_title'])){echo $bannerinfo['gvideo_title'];} ?>" required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Video Upload</label>
                  
                  <br>
                  <!-- <a class="upload_video"><i class="fa fa-file-video-o " title="Upload Video"></i></a> -->
                  <div class="upload-option" >
                   <!--  <a class="video_upload">Upload From Device</a>
                    <br> -->
                   <!--  <a class="link_upload">Youtube Video </a> -->
                  </div>
                <!--   <input type="file" class="form-control" name="txtVideo" id="txtVideo" >     --> 
                 <input type="text" class="form-control" id="txtURL"  name="txtURL" placeholder="Enter Video URL" value="<?php if(isset($bannerinfo['gvideo_url'])){echo $bannerinfo['gvideo_url'];} ?>" >
                 <?php if(isset($bannerinfo['gvideo_url']) && ($bannerinfo['video_type']==1) ){ ?>
                  <br>
                 <?php $url=(explode("?v=",$bannerinfo['gvideo_url']));  ?>
                  <iframe src="https://www.youtube.com/embed/<?php echo $url['1']; ?>" frameborder="0" width="400" height="200"></iframe>
                <?php } ?>
                 <?php if(isset($bannerinfo['gvideo_url']) && ($bannerinfo['video_type']==2) ){ ?>
                  <br>
                    <?php 
                    $ext=substr($bannerinfo['gvideo_url'], strrpos($bannerinfo['gvideo_url'], '.') + 1);
                    ?>
                    <video width="320" height="240" controls>
                      <source src="<?php echo BASE_URI?>uploads/video/<?php echo $bannerinfo['gvideo_url'];?>" type="video/<?php echo $ext; ?>">
                  
                    </video>
                        
                       
                 
                <?php } ?>
                  
                </div> 
               
                 <div class="form-group">
                  <label for="exampleInputFile">Description</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="120" required>
                                           <?php if(isset($bannerinfo['gvideo_content'])){echo $bannerinfo['gvideo_content'];} ?>
                    </textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <?php
      if($feature=='Add')
      {
      ?>
                <button type="submit" class="btn btn-primary" value="list" name="btnSave">Save</button>
                <button type="submit" class="btn btn-primary" value="new" name="btnAdd">Save and Add New</button>
                 <a class="btn btn-default" href="<?php echo BASE_URI.'backend/video_gallery'; ?>">Back To List</a>
                  <?php
      }
      else if($feature=='Edit')
      {
      ?>
                 <button type="submit" class="btn btn-primary" value="list" name="btnSave">Save</button>
                 <a class="btn btn-default" href="<?php echo BASE_URI.'backend/video_gallery'; ?>">Back To List</a>
            <?php
      }
      ?>
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
<script src="assets/admin/plugins/select2/select2.full.min.js"></script>
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
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script>
  $("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){
               $("#success-alert").alert('close');
                });   
  </script>
    <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
  </script>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>