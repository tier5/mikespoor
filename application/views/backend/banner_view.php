<!DOCTYPE html>
<html>
    <head>
      <base href="<?php echo BASE_URI; ?>">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo $headtitle; ?> |  <?php echo $bannerinfo['banner_name']; ?></title>
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
            <?php include("include/sidebar.php"); ?>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1><?php echo $bannerinfo['banner_name']; ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li class="active"><?php echo $bannerinfo['banner_name']; ?></li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <?php if(isset($_SESSION['successmsg'])){?>
                                    <div class="alert alert-success" id="success-alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
                                    </div>
                                <?php unset($_SESSION['successmsg']); } else if(isset($_SESSION['errormsg'])){ ?>
                                    <div class="alert alert-danger" id="success-alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong> <?php echo $_SESSION['errormsg']; ?>
                                    </div>
                                <?php unset($_SESSION['errormsg']); } ?>
                                <form action="<?php echo BASE_URI.'backend/banner/editbanner'; ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="txtCid" value="<?php if(isset($bannerinfo['banner_id'])){echo $bannerinfo['banner_id'];} ?>"/>
                                    <input type="hidden" name="hid_gallery_pdf1" id="hid_gallery_pdf1" value="<?php if(isset($bannerinfo['banner_image'])){echo $bannerinfo['banner_image'];} ?>" />

                                    <div class="box-body">    
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Banner Title</label>
                                            <input type="text" class="form-control" name="txtTitle" placeholder="Enter Banner Title" value="<?php if(isset($bannerinfo['banner_title'])){echo $bannerinfo['banner_title'];} ?>" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Image</label>
                                            <input type="file" id="prfbtn" name="imgBanner"><br/>
                                            <img src="<?php if(!empty($bannerinfo['banner_image'])){echo BASE_URI.'assets/images/banner/thumb/'.$bannerinfo['banner_image'];} ?>" id="profile" width="200" height="80"/>
                                            <p class="help-block" style="font-size:12px;"><i>Image should be of size 570 X 452 px. Only files with JPG and JPEG allowed.</i></p>
                                        </div>
                                    </div>
                                    <div class="box-footer">                           
                                        <button type="submit" class="btn btn-primary" value="list" name="btnSave">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php include("include/footer.php"); ?>

            <div class="control-sidebar-bg"></div>
        </div>

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
    </body>
</html>
