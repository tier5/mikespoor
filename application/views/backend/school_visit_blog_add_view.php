<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo BASE_URI; ?>">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $headtitle; ?></title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="assets/admin/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/admin/plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="assets/admin/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" href="assets/admin/plugins/iCheck/all.css">
        <link rel="stylesheet" href="assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="assets/admin/plugins/timepicker/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="assets/admin/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="assets/admin/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="assets/admin/dist/css/skins/_all-skins.min.css">
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
                  <li class="active">School Visit Blog </li>
                </ol>
              </section>

              <!-- Main content -->
              <section class="content">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                    <?php if(isset($_SESSION['successmsg'])) { ?>
                        <div class="alert alert-success" id="success-alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
                        </div>
                    <?php unset($_SESSION['successmsg']); } else if(isset($_SESSION['errormsg'])) { ?>
                        <div class="alert alert-danger" id="success-alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> <?php echo $_SESSION['errormsg']; ?>
                        </div>
                    <?php unset($_SESSION['errormsg']); } ?>
            <?php
			if($feature=='Add')
			{
			?>
            <form action="<?php echo BASE_URI.'backend/school_visit_blog/addbanner'; ?>" method="post" enctype="multipart/form-data">
            <?php
			}
			else if($feature=='Edit')
			{
			?>
            <form action="<?php echo BASE_URI.'backend/school_visit_blog/editbanner'; ?>" method="post" enctype="multipart/form-data">
            <?php
			}
			?>
            <input type="hidden" name="txtCid" value="<?php if(isset($bannerinfo['gschool_visit_blog_id'])){echo $bannerinfo['gschool_visit_blog_id'];} ?>"/>
            <input type="hidden" name="hid_destination_pdf1" id="hid_destination_pdf1" value="<?php if(isset($bannerinfo['gschool_visit_blog_image'])){echo $bannerinfo['gschool_visit_blog_image'];} ?>" />
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Blog Name</label>
                  <input type="text" class="form-control" name="txtTitle" placeholder="Enter Blog Name" value="<?php if(isset($bannerinfo['gschool_visit_blog_title'])){echo $bannerinfo['gschool_visit_blog_title'];} ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                 <select class="form-control select2" name="selCategory" id="selCategory">
                    <option value="">Select Category</option>
                    <?php
					if(count($categorylist)>0)
					{
						foreach($categorylist as $dlistdata)
						{
							?>
                            <option value="<?php echo $dlistdata['school_visit_id']; ?>" <?php if(isset($bannerinfo['school_visit_id']) && $dlistdata['school_visit_id']==$bannerinfo['school_visit_id']){echo "selected";}?>><?php echo $dlistdata['school_visit_title']; ?></option>
                            <?php
						}
					}
					 ?>
                  </select>
                  <p class="help-block" style="font-size:12px;"><i><a href="<?php echo BASE_URI.'backend/school_visit_blog/add'; ?>">Click here</a> to add new category.</i></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="prfbtn" name="imgBanner"><br/>
                  <img src="<?php if(isset($bannerinfo['gschool_visit_blog_image'])){echo BASE_URI.'uploads/'.$bannerinfo['gschool_visit_blog_image'];} ?>" id="profile" width="200" height="80"/>
                  <p class="help-block" style="font-size:12px;"><i>Image should be of size 870 X 372 px.</i></p>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Date Of Visit</label>
                  <input type="test" class="form-control" id="datepicker" name="datepicker" value="<?php if(isset($bannerinfo['gschool_visit_date'])){  $date = explode('-', $bannerinfo['gschool_visit_date']);    echo $date[1]."/".$date[2]."/".$date[0]; } ?>" required> 
                </div>
               
                 <div class="form-group">
                  <label for="exampleInputFile">Short Description</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="120" required>
                                           <?php if(isset($bannerinfo['gschool_visit_blog_content'])){echo $bannerinfo['gschool_visit_blog_content'];} ?>
                    </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Description Section 1</label>
                   <textarea id="editor2" name="editor2" rows="10" cols="120" required>
                                           <?php if(isset($bannerinfo['gschool_visit_blog_content2'])){echo $bannerinfo['gschool_visit_blog_content2'];} ?>
                    </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Highlighted Content</label>
                   <textarea id="editor4" name="editor4" rows="10" cols="120" required>
                                           <?php if(isset($bannerinfo['gschool_visit_blog_main'])){echo $bannerinfo['gschool_visit_blog_main'];} ?>
                    </textarea>
                </div>
                 <div class="form-group">
                  <label for="exampleInputFile">Description Section 2</label>
                   <textarea id="editor3" name="editor3" rows="10" cols="120" required>
                                           <?php if(isset($bannerinfo['gschool_visit_blog_content3'])){echo $bannerinfo['gschool_visit_blog_content3'];} ?>
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
                 <a class="btn btn-default" href="<?php echo BASE_URI.'backend/school_visit_blog'; ?>">Back To List</a>
                  <?php
			}
			else if($feature=='Edit')
			{
			?>
                 <button type="submit" class="btn btn-primary" value="list" name="btnSave">Save</button>
                 <a class="btn btn-default" href="<?php echo BASE_URI.'backend/school_visit_blog'; ?>">Back To List</a>
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
  

  <div class="control-sidebar-bg"></div>
</div>

      <script src="assets/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="assets/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="assets/admin/plugins/fastclick/fastclick.js"></script>
<script src="assets/admin/dist/js/app.min.js"></script>
<script src="assets/admin/dist/js/demo.js"></script>
<script src="assets/admin/plugins/select2/select2.full.min.js"></script>
<script src="assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
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
	CKEDITOR.replace('editor2');
	CKEDITOR.replace('editor3');
	CKEDITOR.replace('editor4');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
     $("#datepicker").datepicker();
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
