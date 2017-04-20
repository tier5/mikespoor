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
         <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
       <!-- jQuery 2.2.0 -->
        <script src="assets/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
       
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


        <script type="text/javascript">
           $(document).ready(function(){
                
                $("#background_image").change(function(){
                                   
                 readURL(this);
               });

           });

           function readURL(input) {

              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function (e) {
                      $('#blah').attr('src', e.target.result);
                  }

                  reader.readAsDataURL(input.files[0]);
              }
          }

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
                                <?php if($feature=='Edit'){ ?>
                                  <form action="<?php echo BASE_URI?>/backend/home_page/background_edit" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="background_id" value="<?php echo $home_background['id']; ?>"/>
                                <?php } else { ?>
                                  <form action="" method="post" enctype="multipart/form-data">
                                <?php }?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Background Title</label>
                                            <input type="text" class="form-control" name="background_title" placeholder="Enter Offer Title" value="<?php if(isset($home_background['background_name'])){ echo $home_background['background_name'];}?>" required readonly>
                                        </div>

                                        <div class="form-group">
                                         
                                            <label for="exampleInputEmail1">Background Image</label>
                                            <input type="file" class="form-control" name="background_image" id='background_image' required>
                                             <p class="help-block" style="font-size:12px;"><i>Prefferable Maximum Image Size Less Than 2MB(1400 X 500).</i></p>
                                           <br>
                                            <img id="blah" src="<?php echo BASE_URI.'uploads/home_page/home_background/'.$home_background['background_image']; ?>" alt="Selected Background Image" style="width: 400px; height: 200px;"/>
                                        </div>
                                        
                                        <?php if($feature=='Edit'){ ?>
                                          <button class="btn btn-primary" id="update">Update</button>
                                        <?php } else { ?>
                                          <button class="btn btn-primary" id="edit">Add</button>
                                        <?php }?>
                                </form>
                                <div>

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

        
        
    </body>
</html>
