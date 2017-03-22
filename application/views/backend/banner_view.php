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
                                        <strong>Error!</strong> <?php print_r( $_SESSION['errormsg']); ?>
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
                                            <label for="exampleInputFile">Banner Type</label>
                                            <select class="form-control" id="banner_type" name="banner_type" onchange="change_upload_option()" required>
                                                <option value="">--Select--</option>
                                                <option value="1" <?php if((isset($bannerinfo['banner_type']) && ($bannerinfo['banner_type']=='1'))){echo "selected";}?>>Image</option>
                                                <option value="2" <?php if((isset($bannerinfo['banner_type']) && ($bannerinfo['banner_type']=='2'))){echo "selected";}?>>Video</option>
                                            </select>
                                        </div>

                                        <div class="form-group"  id="image_upload" style="<?php if((isset($bannerinfo['banner_type']) && ($bannerinfo['banner_type']=='1') && (isset($bannerinfo['banner_image'])))){ echo"display:block";} else {echo"display:none";}?>">
                                           <input type="file" id="prfbtn" name="imgBanner" class="form-control" >
                                            <br/>
                                            <img src="<?php if(!empty($bannerinfo['banner_image'])){echo BASE_URI.'assets/images/banner/thumb/'.$bannerinfo['banner_image'];} ?>" id="profile" width="200" height="80" />
                                        </div>

                                        <div class="form-group"  id="video_upload" style="<?php if((isset($bannerinfo['banner_type']) && ($bannerinfo['banner_type']=='2') && (isset($bannerinfo['banner_image'])))){ echo"display:block";} else {echo"display:none";}?>">
                                           <input type="radio" name="video_type" value="1" <?php if( ($bannerinfo['banner_type']=='2') && ($bannerinfo['banner_ext']=='1')){ echo"checked";}?>>Upload From Device
                                           <input type="radio" name="video_type" value="2" <?php if( ($bannerinfo['banner_type']=='2') && ($bannerinfo['banner_ext']=='2')){ echo"checked";}?>>Yotube url
                                            
                                        </div>
                                        
                                        <div class="form-group" id="video_upload_section" style="<?php if( ($bannerinfo['banner_type']=='2') && ($bannerinfo['banner_ext']=='1')){ echo "display:block";}else {echo "display:none";}?>">
                                            <input type="file" class="form-control" id="upload_video" name="upload_video"><br/>
                                              <?php 
                                                  $ext=substr($bannerinfo['banner_image'], strrpos($bannerinfo['banner_image'], '.') + 1);
                                              ?>
                                             <video width="320" height="240" controls>
                                                  <source src="<?php echo BASE_URI?>assets/images/banner/<?php echo $bannerinfo['banner_image'];?>" type="video/<?php echo $ext; ?>">
                  
                                              </video>

                                        </div>
                                         <div class="form-group"  id="url_section" style="<?php if( ($bannerinfo['banner_type']=='2') && ($bannerinfo['banner_ext']=='2')){ echo "display:block";}else {echo "display:none";}?>">
                                            <input type="text" class="form-control" id="url_upload" name="url_upload" value="<?php if (($bannerinfo['banner_type']=='2') && ($bannerinfo['banner_ext']=='2') && (isset($bannerinfo['banner_image']))){ echo $bannerinfo['banner_image']; } ?>"><br/>
                                            <p class="help-block" style="font-size:12px;"><i>https://www.youtube.com/watch?v=<u>kKXTFJV-S1o</u></i></p>
                                            <?php if (($bannerinfo['banner_type']=='2') && ($bannerinfo['banner_ext']=='2') && (isset($bannerinfo['banner_image']))){ 
                                              
                                              $url=explode("?v=",(trim($bannerinfo['banner_image'])));
              
                                              $videname=$url[1];
                                              ?> 
                                               <iframe src="https://www.youtube.com/embed/<?php echo $videname; ?>" frameborder="0" width="400" height="200"></iframe>
                                            <?php } ?> 
                                              
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

            $(document).on("change","input[type=radio]",function(){
                var video_type=$('[name="video_type"]:checked').val();
                if(video_type==1){
                    $('#video_upload_section').show();
                    $('#upload_video').click();
                    $('#url_section').hide();
                } else if(video_type==2){
                    $('#video_upload_section').hide();
                    $('#url_section').show();
                }else{
                    $('#video_upload_section').hide();
                    $('#url_section').hide();  
                }
            });
        	});

          function change_upload_option()
          {
             var banner_type=$('#banner_type').val();
              if(banner_type==1){
                $('#image_upload').show();
                $('#video_upload').hide();
              } else if(banner_type==2){
                $('#image_upload').hide();
                $('#video_upload').show();
              }else{
                $('#image_upload').hide();
                $('#video_upload').hide();
              }
          }
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
