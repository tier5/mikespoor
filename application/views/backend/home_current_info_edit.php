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
                    <h1><?php echo $title; ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li class="active">Home Page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="">
                              <?php if(isset($_SESSION['successmsg'])) {?>
                                  <div class="alert alert-success" id="success-alert">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Success!</strong> <?php echo $_SESSION['successmsg']; ?>
                                  </div>
                              <?php unset($_SESSION['successmsg']);}
                          	  else if(isset($_SESSION['errormsg'])) {?>
                                  <div class="alert alert-danger" id="success-alert">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Error!</strong> <?php echo $_SESSION['errormsg']; ?>
                                  </div>
                              <?php unset($_SESSION['errormsg']); } ?>
                            </div>
                            <!-- /.box-body -->
                   
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <?php if($feature=='Add') {?>
                                <form action="<?php echo BASE_URI.'backend/home_page/add_current_info'; ?>" method="post" enctype="multipart/form-data">
                                <?php } else if($feature=='Edit') { ?>
                                <form action="<?php echo BASE_URI.'backend/home_page/edit_current_info'; ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="info_id" value="<?php echo $current_info['current_info_id']; ?>"/>
                                    <?php } ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Current Information Title</label>
                                            <input type="text" class="form-control" name="info_title" placeholder="Enter Offer Title" value="<?php if(isset($current_info['current_info_title'])){echo $current_info['current_info_title']; }?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Current Information Content</label>
                                            <textarea class="form-control" name="info_content" rows="4" placeholder="Enter Content Title" required> <?php if(isset($current_info['current_info_content'])){ echo $current_info['current_info_content']; }?></textarea>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Current Information Logo</label>
                                            <input type="file" class="form-control" name="info_logo" id="info_logo" placeholder="Enter Feature Title" value="" <?php if($feature=='Add') { echo "required";}?>>
                                            Image size should less than 5 MB & 3500 X 3500 px.
                                            <br><br>
                                            
                                            <img src="<?php if(!empty($current_info['current_info_logo'])){echo BASE_URI.'uploads/home_page/current_info/'.$current_info['current_info_logo'];} ?>" id="logo_preview" width="200" height="80" style="<?php if(empty($current_info['current_info_logo'])){ echo "display:none";} ?>"/>
                                            
                                        </div>
                                        <div class="form-group">
                                          <?php if($feature=='Add'){ ?>
                                              <button type="submit" class="btn btn-success" value="list" name="btnAdd">Add</button>
                                          <?php } else if($feature=='Edit') { ?>
                                              <button type="submit" class="btn btn-success" value="new" name="btnEdit">Save Changes</button>
                                          <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include("include/footer.php"); ?>
            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
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
        $(document).ready(function(){
                
                $("#info_logo").change(function(){
                                  
                 readURL(this);
               });

           });

           function readURL(input) {

              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#logo_preview').attr('src', e.target.result);
                      $('#logo_preview').show();
                  }

                  reader.readAsDataURL(input.files[0]);
              }
          }
     
        </script>
    </body>
</html>
