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
        <li class="active">Home Page</li>
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

            <div class="box-header">
              <h3 class="box-title">Welcome Title</h3>
              <br>
              <br>
                 <textarea class="form-control" readonly><?php echo $welcome_title['title'];?></textarea>
               <br>
               <button id="edit_home_welcome_title" class="btn btn-primary" onclick="edit_welcome_title(<?php echo $welcome_title['title_id'] ?>)">Edit</button>
            </div>
           </div>
            <div class="box box-primary">

            <div class="box-header">
              <h3 class="box-title">Feature List</h3>

             <div>
                <a class="btn btn-primary btn-lg" href="<?php echo BASE_URI.'backend/home-page/addfeature'; ?>"><i class="fa fa-plus"></i> Add New Feature</a>
              </div>
              <!-- /.box-tools -->
            </div>



            <div class="box-body">
            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Feature Name</th>
                 
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
				$cnt=1;
				if(count($bannerlist)>0)
				{
					foreach($bannerlist as $bannerlistdata)
					{
				?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $bannerlistdata['feat_title']; ?></td>
                  
                  <td> 
                    <?php
          if($bannerlistdata['status'])
          {
            ?>
                      <a class="btn btn-success btn-md" title="Change Status" href="<?php echo BASE_URI.'backend/home-page/changefeaturestatus/'.$bannerlistdata['feat_id'].'/'.$bannerlistdata['status']; ?>"><i class="fa fa-unlock"> Active</i></a>
                      <?php
          }
          else
          {
            ?>
                      <a class="btn btn-warning btn-md" title="Change Status" href="<?php echo BASE_URI.'backend/home-page/changefeaturestatus/'.$bannerlistdata['feat_id'].'/'.$bannerlistdata['status']; ?>"><i class="fa fa-lock"> Inactive</i></a>
                      <?php
          }
          ?>
                   </td>
                  <td>
                        
                  <a class="btn btn-primary btn-md" title="Edit" href="<?php echo BASE_URI.'backend/home-page/editfeature/'.$bannerlistdata['feat_id']; ?>"><i class="fa fa-edit"> Edit</i></a>
                  <a class="btn btn-danger btn-md" title="Delete" onclick="return confirm('Are you sure you want to delete this banner?');" href="<?php echo BASE_URI.'backend/home-page/deletefeature/'.$bannerlistdata['feat_id']; ?>"><i class="fa fa-trash"> Delete</i></a>
                  </td>
                </tr>
                <?php
				$cnt=$cnt+1;
					}
				}
				else
				{
					?>
                     <tr>
                     <td colspan="5"><i>No Results Found</i></td>
                     </tr>
                    <?php
				}
				?>
                </tbody>
               
              </table>



              
            </div>
             </div>
          <!-- /.box -->
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
                                            <td><?php echo $welcome_background['background_name'];?></td>
                                            <td><?php echo $welcome_background['background_title'];?></td>
                                            <td><img src="<?php echo BASE_URI.'uploads/home_page/home_background/'.$welcome_background['background_image']; ?>" width="200" height="80" ></td>
                                            <td><a class="btn btn-primary" href="<?php echo BASE_URI;?>backend/home_page/backend_image_edit/<?php echo $welcome_background['id']; ?>"><i class="fa fa-edit"> Edit</i></a></td>
                                      </tr>

                                    
                                    </tbody>
                                </table>
                             </div>
            <!-- /.box-body -->
            <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Welcome Title</h4>
        </div>
        <div class="modal-body">
          Welcome Title
          <input type="hidden" id="title_id">
           <br>
           <textarea cols="20" rows="3"  id="welcome_title" class="form-control"></textarea>
           <br>
           <button class="btn btn-success" id="save_welcome_title">Save Changes</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
         
         

       
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
</script><script>
	$("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){
               $("#success-alert").alert('close');
                }); 

  function edit_welcome_title(title_id)  
  {
      $.ajax({
        url: 'backend/ajax/get_welcome_title',
        type: "post",
        data:{title_id:title_id},
        success: function(response)
        {
            console.log(response);
            response = $.parseJSON(response);     
            $('#title_id').val(response.title_id);
            $('#welcome_title').val(response.title);
        }
      });
      $('#myModal').modal('show');
  }

  $('#save_welcome_title').click(function(){
      var title_id=$('#title_id').val();
      var title=$('#welcome_title').val();
      $.ajax({
          url: 'backend/ajax/update_welcome_title',
          type: "post",
          data:{title_id:title_id, title:title},
          success: function(response)
          {
             window.location.reload();
          }
      });
  });
	</script>
</body>
</html>
