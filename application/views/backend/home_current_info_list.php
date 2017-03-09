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
        <link href="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.min.css"; rel="stylesheet" />
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
                        <li><a href="#"><i class="fa fa-home"></i> Home Page</a></li>
                        <li class="active">Current Information</li>
                
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
                               <h2> Information Details</h2>
                            <!-- <div >
                                <br>
                                <a class="btn btn-primary" href="<?php echo BASE_URI.'backend/home-page/add_edit_current_info'; ?>"><i class="fa fa-plus">Add Current Info </i></a>
                                <br>
                              </div>  -->
                              <br>
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Logo</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  $cnt=1;
                                    foreach ($current_info as $info ) {?>
                                      <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $info['current_info_title'];?></td>
                                            <td><img src="<?php echo BASE_URI.'uploads/home_page/current_info/'.$info['current_info_logo']; ?>" width="200" height="80" ></td>
                                            <td><?php if($info['status']==0) { ?> <a class="btn btn-success btn-md" title="Change Status" href="<?php echo BASE_URI.'backend/home-page/status_current_info/'.$info['current_info_id']; ?>"><i class="fa fa-unlock"> Active</i></a><?php } else { ?> <a class="btn btn-warning btn-md" title="Change Status" href="<?php echo BASE_URI.'backend/home-page/status_current_info/'.$info['current_info_id']; ?>"><i class="fa fa-lock"> Inctive</i></a> <?php }  ?> </td>
                                            <td> <a class="btn btn-primary btn-md" title="Edit" href="<?php echo BASE_URI.'backend/home-page/add_edit_current_info/'.$info['current_info_id']; ?>"><i class="fa fa-edit"> Edit</i></a> <!-- <a class="btn btn-danger btn-md" title="Delete" id="delete_current_info" onclick="delete_current_info(<?php echo $info['current_info_id']; ?>)" ><i class="fa fa-trash"> Delete</i></a> --></td>
                                      </tr>

                                    <?php  $cnt=$cnt+1; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                             <div class="box box-primary">
                                <h2>Background</h3>
                                    <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            
                                            <th>Background Name</th>
                                            <th>Background Title</th>
                                            <th>Background Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                    
                                      <tr>
                                            <td><?php echo $current_info_background['background_name'];?></td>
                                            <td><?php echo $current_info_background['background_title'];?></td>
                                            <td><img src="<?php echo BASE_URI.'uploads/home_page/home_background/'.$current_info_background['background_image']; ?>" width="200" height="80" ></td>
                                            <td><a class="btn btn-primary" href="<?php echo BASE_URI;?>backend/home_page/backend_image_edit/<?php echo $current_info_background['id']; ?>"><i class="fa fa-edit"> Edit</i></a></td>
                                      </tr>

                                    
                                    </tbody>
                                </table>
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
        <script src="https://cdn.jsdelivr.net/sweetalert2/6.1.1/sweetalert2.min.js"></script>

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

            function delete_current_info(info_id)
            {
                swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then(function (isConfirm) {
                    if(isConfirm)
                    {
                        $.ajax({
                              url: 'backend/ajax/delete_current_info',
                              type: "post",
                              data:{info_id:info_id},
                              success: function(response)
                              {

                                 window.location.reload();
                              }
                        });
                    }
                 
                })
            }
        </script>
        
    </body>
</html>
