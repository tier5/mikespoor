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
      <h1>
        <?php echo $title; ?>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        <li class="active">Link & News</li>
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
           
             <div class="box box-primary">
                              <div >
                                <br>
                                <a class="btn btn-primary" href="<?php echo BASE_URI.'backend/link-news/add_edit_link_news'; ?>"><i class="fa fa-plus">Add Link & News </i></a>
                                <br>
                              </div>
                              <br> 
            <!-- /.box-header --><?php $i=1;?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Link Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($all_link as $key ) { ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $key['link_name'];?></td>
                        <td><a class="btn btn-primary btn-md" title="Edit" href="<?php echo BASE_URI.'backend/link-news/add_edit_link_news/'.$key['linkid']; ?>"><i class="fa fa-edit"> Edit</i></a> <a class="btn btn-danger btn-md" title="Delete" id="delete_home_offer" onclick="delete_links(<?php echo $key['linkid']; ?>)" ><i class="fa fa-trash"> Delete</i></a></td>
                    </tr>
                  <?php $i=$i+1; } ?>
                </tbody>
              </table>
              </div>
            <!-- <input type="hidden" name="txtCid" value="<?php if(isset($bannerinfo['cms_id'])){echo $bannerinfo['cms_id'];} ?>"/>
            <input type="hidden" name="hid_gallery_pdf1" id="hid_gallery_pdf1" value="<?php if(isset($bannerinfo['cms_image'])){echo $bannerinfo['cms_image'];} ?>" />
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Page Title</label>
                  <input type="text" class="form-control" name="txtTitle" placeholder="Enter Banner Title" value="<?php if(isset($bannerinfo['cms_title'])){echo $bannerinfo['cms_title'];} ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="prfbtn" name="imgBanner"><br/>
                  <img src="<?php if(!empty($bannerinfo['cms_image'])){echo BASE_URI.'uploads/'.$bannerinfo['cms_image'];} ?>" id="profile" width="200" height="80"/>
                  <p class="help-block" style="font-size:12px;"><i>Image should be of size 570 X 452 px.</i></p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Page Content</label>
                   <textarea id="editor1" name="editor1" rows="10" cols="120">
                                           <?php if(isset($bannerinfo['cms_content'])){echo $bannerinfo['cms_content'];} ?>
                    </textarea>
                </div>
              </div>
              <!-- /.box-body -->

            
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

    function delete_links(link_id)
    {
      swal({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!',
                  cancelButtonText: 'No, cancel!',
                  confirmButtonClass: 'btn btn-success',
                  cancelButtonClass: 'btn btn-danger',
                  buttonsStyling: false
              }).then(function () {
                $.ajax({
                url: 'backend/ajax/delete_link',
                type: "post",
                data:{link_id:link_id},
                success: function(response)
                {
                   window.location.reload();
                }
                });
                  
              $('#myModal').modal('show');
                      }, function (dismiss) {
                          // dismiss can be 'cancel', 'overlay',
                          // 'close', and 'timer'
                          if (dismiss === 'cancel') {
                              swal(
                                      'Cancelled',
                                      'Offer is safe :)',
                                      'error'
                              )
                  }
              });
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
