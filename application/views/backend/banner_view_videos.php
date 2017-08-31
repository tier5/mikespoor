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
        <style type="text/css">
        .form-control{
            padding: 0px !important;
        }

        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include("include/header.php"); ?>
            <?php include("include/sidebar.php"); ?>
            <div class="content-wrapper">
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


                                <form action="<?php echo BASE_URI;?>backend/banner/editbanner_video" method="post" enctype="multipart/form-data">
                                    <div class="box-body">    
                                        <!--  <div class="form-group">
                                            <label for="exampleInputEmail1">Banner Title</label>
                                            <input type="text" class="form-control" name="txtTitle" placeholder="Enter Banner Title" value="<?php if(isset($bannerinfo['banner_title'])){echo $bannerinfo['banner_title'];} ?>" required readonly>
                                        </div> -->
                                        <input type="hidden" name="txtCid" value="<?php echo $banner_slug;?>">

                                        <div class="form-group">
                                            <label for="exampleInputFile">Banner Type</label>
                                            <select class="form-control" id="banner_type" name="banner_type" required >  
                                               <option value="1"   <?php if($bannerinfo[0]['banner_type']=='1') { echo "selected"; }?>>Upload Video</option> 
                                                <option value="2" <?php if($bannerinfo[0]['banner_type']=='2') { echo "selected"; }?>>Youtube URL</option>   
                                            </select>
                                        </div>
                                      
                                        <input type="hidden" class="form-control" id="first_id" name="first_id" value="<?php echo $bannerinfo[0]['banner_id'];?>">
                                        <div class="form-group upload-url" style="display:   <?php if($bannerinfo[0]['banner_type']=='2') { echo "block"; } else{ echo "none"; } ?>" >
                                            <label for="exampleInputFile">Video 1.</label><br>
                                            <input type="radio" name="banner_focus" value="1" <?php if($bannerinfo[0]['banner_focus']=='1' && $bannerinfo[0]['banner_type']=='2' )  { echo "checked"; } ?>>Make The Video Middle<br/>
                                            <input type="text" class="form-control" id="first_url" name="first_url" value="<?php  if($bannerinfo[0]['banner_type']=='2' )  { echo $bannerinfo[0]['banner_image'];}?>">
                                            <p class="help-block" style="font-size:12px;"><i>https://www.youtube.com/watch?v=<u>kKXTFJV-S1o</u></i></p> 
                                        </div>
                                        
                                        <div class="form-group upload-pics"  style="display:   <?php if($bannerinfo[0]['banner_type']=='1') { echo "block"; }else{ echo "none"; } ?>"  >
                                            <label for="exampleInputFile">Video 1.</label><br>
                                            <input type="radio" name="banner_focus"  value="1" <?php if($bannerinfo[0]['banner_focus']=='1' && $bannerinfo[0]['banner_type']=='1' )  { echo "checked"; } ?>>Make The Video Middle
                                            <input type="file"  id="first_pic" name="first_pic" >
                                            <input type="hidden" class="form-control" id="first_pic_prev" name="first_pic_prev" value="<?php if($bannerinfo[0]['banner_type']=='1' )  { echo $bannerinfo[0]['banner_image']; } ?>">
                                        </div>
                                       

                                        <input type="hidden" class="form-control" id="second_id" name="second_id" value="<?php echo $bannerinfo[1]['banner_id'];?>">
                                        <div class="form-group upload-url" style="display:   <?php if($bannerinfo[1]['banner_type']=='2') { echo "block"; }else{ echo "none"; } ?>" >
                                            <label for="exampleInputFile">Video 2.</label><br>
                                            <input type="radio" name="banner_focus"  value="2" <?php if($bannerinfo[1]['banner_focus']=='1'  && $bannerinfo[1]['banner_type']=='2' )  { echo "checked"; } ?>>Make The Video Middle<br/>
                                            <input type="text" class="form-control" id="second_url" name="second_url" value="<?php if($bannerinfo[1]['banner_type']=='2' )  { echo $bannerinfo[1]['banner_image'];}?>">
                                            <p class="help-block" style="font-size:12px;"><i>https://www.youtube.com/watch?v=<u>kKXTFJV-S1o</u></i></p> 
                                        </div>
                                         
                                        <div class="form-group upload-pics" style="display:   <?php if($bannerinfo[1]['banner_type']=='1') { echo "block"; }else{ echo "none"; } ?>">
                                            <label for="exampleInputFile">Video 2.</label><br>
                                            <input type="radio" name="banner_focus" value="2" <?php if($bannerinfo[1]['banner_focus']=='1' && $bannerinfo[1]['banner_type']=='1' )  { echo "checked"; } ?>>Make The Video Middle
                                            <input type="file" id="second_pic" name="second_pic">
                                            <input type="hidden" class="form-control" id="second_pic_prev" name="second_pic_prev" value="<?php if($bannerinfo[1]['banner_type']=='1' )  { echo $bannerinfo[1]['banner_image']; } ?>">
                                        </div>
                                         

                                        <input type="hidden" class="form-control" id="third_id" name="third_id" value="<?php echo $bannerinfo[2]['banner_id'];?>">
                                        <div class="form-group upload-url"  style="display:   <?php if($bannerinfo[2]['banner_type']=='2') { echo "block"; } else{ echo "none"; }?>">
                                            <label for="exampleInputFile">Video 3.</label><br>
                                            <input type="radio" name="banner_focus" id="banner_focus" value="3" <?php if($bannerinfo[2]['banner_focus']=='1' && $bannerinfo[2]['banner_type']=='2' )  { echo "checked"; } ?>>Make The Video Middle<br/>
                                            <input type="text" class="form-control" id="third_url" name="third_url" value="<?php if($bannerinfo[2]['banner_type']=='2' )  { echo $bannerinfo[2]['banner_image'];}?>">
                                            <p class="help-block" style="font-size:12px;"><i>https://www.youtube.com/watch?v=<u>kKXTFJV-S1o</u></i></p>
                                        </div>
  
                                        <div class="form-group upload-pics"  style="display:   <?php if($bannerinfo[2]['banner_type']=='1') { echo "block"; }else{ echo "none"; } ?>">
                                            <label for="exampleInputFile">Video 3.</label><br>
                                            <input type="radio" name="banner_focus" value="3" <?php if($bannerinfo[2]['banner_focus']=='1' && $bannerinfo[2]['banner_type']=='1')  { echo "checked"; } ?>>Make The Video Middle
                                            <input type="file"  id="third_pic" name="third_pic">  
                                            <input type="hidden" class="form-control" id="third_pic_prev" name="third_pic_prev" value="<?php if($bannerinfo[2]['banner_type']=='1' )  { echo $bannerinfo[2]['banner_image']; } ?>">
                                        </div>

                                        <input type="hidden" class="form-control" id="fourth_id" name="fourth_id" value="<?php echo $bannerinfo[3]['banner_id'];?>"><br/>
                                        <div class="form-group upload-url" style="display:   <?php if($bannerinfo[3]['banner_type']=='2') { echo "block"; }else{ echo "none"; } ?>">
                                            <label for="exampleInputFile">Video 4.</label><br>
                                            <input type="radio" name="banner_focus"  id="banner_focus" value="4"  <?php if($bannerinfo[3]['banner_focus']=='1' && $bannerinfo[3]['banner_type']=='2' )  { echo "checked"; } ?>>Make The Video Middle<br>
                                            <input type="text" class="form-control" id="fourth_url" name="fourth_url" value="<?php if($bannerinfo[3]['banner_type']=='2' )  {  echo $bannerinfo[3]['banner_image'];}?>">
                                            <p class="help-block" style="font-size:12px;"><i>https://www.youtube.com/watch?v=<u>kKXTFJV-S1o</u></i></p>   
                                        </div>
                                      
                                        <div class="form-group upload-pics" style="display:   <?php if($bannerinfo[3]['banner_type']=='1') { echo "block"; } else{ echo "none"; }?>" >
                                            <label for="exampleInputFile">Video 4.</label><br>
                                            <input type="radio" name="banner_focus" value="4" <?php if($bannerinfo[3]['banner_focus']=='1'  && $bannerinfo[3]['banner_type']=='1' )  { echo "checked"; } ?>>Make The Video Middle
                                            <input type="file" id="fourth_pic" name="fourth_pic" >
                                            <input type="hidden" class="form-control" id="fourth_pic_prev" name="fourth_pic_prev" value="<?php if($bannerinfo[3]['banner_type']=='1' )  { echo $bannerinfo[3]['banner_image']; } ?>"> 
                                        </div>
                                        
                                        <input type="hidden" class="form-control" id="fifth_id" name="fifth_id" value="<?php echo $bannerinfo[4]['banner_id'];?>">
                                        <div class="form-group upload-url " style="display:   <?php if($bannerinfo[4]['banner_type']=='2' ) { echo "block"; }else{ echo "none"; } ?>">
                                            <label for="exampleInputFile">Video 5.</label><br>
                                            <input type="radio" name="banner_focus" id="banner_focus" value="5" <?php if($bannerinfo[4]['banner_focus']=='1'  && $bannerinfo[4]['banner_type']=='2')  { echo "checked"; } ?> >Make The Video Middle<br>
                                            <input type="text" class="form-control" id="fifth_url" name="fifth_url" value="<?php if($bannerinfo[4]['banner_type']=='2' )  {  echo $bannerinfo[4]['banner_image'];}?>">
                                            <p class="help-block" style="font-size:12px;"><i>https://www.youtube.com/watch?v=<u>kKXTFJV-S1o</u></i></p>
                                        </div>

                                        <div class="form-group upload-pics"  style="display:   <?php if($bannerinfo[4]['banner_type']=='1') { echo "block"; }else{ echo "none"; } ?>">
                                            <label for="exampleInputFile">Video 5.</label><br>
                                            <input type="radio" name="banner_focus" value="5" <?php if($bannerinfo[4]['banner_focus']=='1'  && $bannerinfo[4]['banner_type']=='1' )  { echo "checked"; } ?>>Make The Video Middle
                                            <input type="file" id="fifth_pic" name="fifth_pic" >
                                            <input type="hidden" class="form-control" id="fifth_pic_prev" name="fifth_pic_prev" value="<?php if($bannerinfo[4]['banner_type']=='1' )  { echo $bannerinfo[4]['banner_image']; } ?>"> 
                                        </div>
                                             <div class="form-group">
                                        <p>Which Video/Image you will mark as middle, it will come on middle rest of the video/image will come according there number(Left top, Left Buttom, Right Top, Right Buttom).</p>
                                        <p>Suppose You Made Image.4/Video.4 As Middel Then Video.1/Image.1 will be Left top, Video.2/Image.2 will be  Left Buttom, Video.3/Image.3 will be  Right Top, Video.5/Image.5 will be  Right Buttom </p>
                                        <p>Same as You Made Image.2/Video.2 As Middel Then Video.1/Image.1 will be Left top, Video.3/Image.3 will be  Left Buttom, Video.4/Image.4 will be  Right Top, Video.5/Image.5 will be  Right Buttom</p>
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
            
              $('#banner_type').on("change",function(){
            
             var banner_type=$('#banner_type').val();
              if(banner_type==1){
                $('.upload-pics').show();
                $('.upload-url').hide();
              } else if(banner_type==2){
                $('.upload-pics').hide();
                $('.upload-url').show();
              }else{
                $('.upload-pics').hide();
                $('.upload-url').hide();
              }
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
            CKEDITOR.replace('editor1',{
     
    removeButtons: 'Source,Image,Table',

});
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
