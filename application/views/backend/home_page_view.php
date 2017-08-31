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
                  <h1><?php echo $title; ?> </h1>
                    <ol class="breadcrumb">
                      <li><a href="<?php echo BASE_URI.'backend/dashboard'; ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                      <li class="active" ><a href="<?php echo BASE_URI.'backend/home-page'; ?>">Home Page > Banner List</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                        <!-- general form elements -->
                            <div class="box box-primary">
                                <?php if(isset($_SESSION['successmsg'])) {?>
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
                                <!-- /.box-header -->
                                <!-- form start -->
                                <!-- /.box-header -->
                                <div class="box-header">
                                    <h3 class="box-title">Banner List</h3>
                                    <div class="box-tools pull-right">
                                        <a class="btn btn-block btn-primary btn-xs" href="<?php echo BASE_URI.'backend/home-page/add'; ?>"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                <!-- /.box-tools -->
                                </div>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Banner Title</th>
                                                <th>Background Image</th>
                                                <th>Foreground Image</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cnt=1;
                  				                  if(count($bannerlist)>0)	{
                  					                foreach($bannerlist as $bannerlistdata){ ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $bannerlistdata['banner_title']; ?></td>
                                                <td><img src="<?php echo 'uploads/home_page/banner/thumb/'.$bannerlistdata['banner_image']; ?>" width="120" height="50"/></td>
                                                <td><img src="<?php echo 'uploads/home_page/banner/'.$bannerlistdata['banner_front_image']; ?>" width="120" height="50"/></td>
                                                <td>  <?php if($bannerlistdata['status']) { ?>
                                                    <a class="btn btn-success btn-xs" title="Change Status" href="<?php echo BASE_URI.'backend/home-page/changestatus/'.$bannerlistdata['banner_id'].'/'.$bannerlistdata['status']; ?>"><i class="fa fa-unlock"></i></a>
                                                    <?php } else { ?>
                                                    <a class="btn btn-warning btn-xs" title="Change Status" href="<?php echo BASE_URI.'backend/home-page/changestatus/'.$bannerlistdata['banner_id'].'/'.$bannerlistdata['status']; ?>"><i class="fa fa-lock"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                  <a class="btn btn-primary btn-xs" title="Edit" href="<?php echo BASE_URI.'backend/home-page/edit/'.$bannerlistdata['banner_id']; ?>"><i class="fa fa-edit"></i></a>
                                                  <a class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('Are you sure you want to delete this banner?');" href="<?php echo BASE_URI.'backend/home-page/delete/'.$bannerlistdata['banner_id']; ?>"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php $cnt=$cnt+1; } }else	{?>
                                            <tr>
                                              <td colspan="5"><i>No Results Found</i></td>
                                            </tr>
                                            <?php	}?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <!--/.col (right) -->
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <?php foreach($bannerlist as $bannerlistdata){ 
                                    $trans=$bannerlistdata['foreground_image_transition'];
                                    break;
                                } ?>
                                <form action="<?php echo BASE_URI.'backend/home_page/saveforeend'; ?>" method="post">
                                    Foreground Transition Time
                                    <input type="radio" name="transition_fore" value="400" <?php if($trans=="400" || $trans==400 ){ echo "checked";}?> > 4 Sec
                                    <input type="radio" name="transition_fore" value="600" <?php if($trans=="600" || $trans==600 ){ echo "checked";}?>> 6 Sec
                                    <input type="radio" name="transition_fore" value="1200" <?php if($trans=="1200" || $trans==1200 ){ echo "checked";}?>> 12 Sec  
                                    <input type="radio" name="transition_fore" value="0" <?php if($trans=="0" || $trans==0 ){ echo "checked";}?>> Constant  
                                    <br><br>
                                    <input class="btn btn-success" type="submit" value="Save Changes">
                                    <br><br>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="box box-primary">
                                <?php foreach($bannerlist as $bannerlistdata){ 
                                    $trans=$bannerlistdata['background_image_transition'];
                                    break;
                                } ?>
                                <form action="<?php echo BASE_URI.'backend/home_page/savebackend'; ?>" method="post">
                                    Background Transition Time
                                    <input type="radio" name="transition_back" value="200" <?php if($trans=="200" || $trans==200 ){ echo "checked";}?> > 2 Sec
                                    <input type="radio" name="transition_back" value="400" <?php if($trans=="400" || $trans==400 ){ echo "checked";}?>> 4 Sec
                                    <input type="radio" name="transition_back" value="600" <?php if($trans=="600" || $trans==600 ){ echo "checked";}?>> 6 Sec
                                    <input type="radio" name="transition_back" value="001" <?php if($trans=="001" || $trans==001 ){ echo "checked";}?>> Constant  
                                    <br><br>
                                    <input class="btn btn-success" type="submit" value="Save Changes">
                                    <br><br>
                                </form>
                            </div>
                        </div>
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
    
    	$("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){
        $("#success-alert").alert('close');
      });   
    </script>
  </body>
</html>
