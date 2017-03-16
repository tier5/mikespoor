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

        <link id="jquiCSS" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-lightness/jquery-ui.css" type="text/css" media="all">
  <link href="assets/admin/plugins/evol/demo.css" rel="stylesheet" /> 
  <link href="assets/admin/plugins/evol/evol.colorpicker.min.css" rel="stylesheet" />


<!-- jQuery 2.2.0 -->
        <script src="assets/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
  <script src="assets/admin/plugins/evol/evol.colorpicker.min.js" type="text/javascript"></script>

   <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.6 -->
       

<script>

$(document).ready(function(){

    
    
    // Instanciate colorpickers
   
    $('#cpDiv2').colorpicker({ defaultPalette:'web'});
    
      $('#cpDiv1').colorpicker({ defaultPalette:'web'});
    

});

</script>
<style type="text/css">
td{
    width: 10px;
    height: 5px;
}

.current_theme{
    width: 80px;
    height: 80px;
    border: 2px solid #afafaf;
}

.evo-color div{
    height: 40px;
    width: 40px;
}
.evo-more a{
    padding: 0px 20px 20px 20px;
}

.evo-color
{
     padding: 0px 170px 10px 10px;

}

/*.evo-color span{
    display: none;
}*/

</style>
<script type="text/javascript">
$(document).ready(function(){

  $('.change-theme').click(function(){
    var slug='theme-color';
    var color=$('#cpDiv2 div div:nth-child(3) span').text();
     if(color)
    {
    $.ajax({
        url: 'backend/ajax/update_theme',
        type: "post",
        data:{slug:slug, color:color },
        success: function(response)
        {
            
           window.location.reload();
        }
    });
}
    
  });

  $('.change-font').click(function(){
    var slug='font-color';
    var color=$('#cpDiv1 div div:nth-child(3) span').text();
    if(color)
    {
    $.ajax({
        url: 'backend/ajax/update_theme',
        type: "post",
        data:{slug:slug, color:color },
        success: function(response)
        {
           window.location.reload();
        }
    });
    }
  });


});

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
                        <li><a href="<?php echo BASE_URI.'backend/dashboard'; ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li><a href="#"><i class="fa fa-film"></i> Theme Change</a></li>
                        
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <h4>Change The Theme Color<h4>
                                <div class="row box-body">
                                    <div class="col-md-4">
                                       Current Theme Colour
                                        <br><br>
                                        <div class="current_theme" style="background:<?php echo $theme_color['color']; ?>"></div>
                                        <br>
                                        <br>

                                    </div>
                                    <div class="col-md-8">
                                        <div id="cpDiv2" ></div>
                                        <br><br>
                                        <div> <button class="btn btn-success change-theme" >Save Theme Colour</button></div>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <br>
                             <div class="box box-primary">
                                <h4>Change The Theme Color<h4>
                                <div class="row box-body">
                                    <div class="col-md-4">
                                       Current Font Colour
                                        <br><br>
                                        <div class="current_theme" style="background:<?php echo $font_color['color']; ?>"></div>
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <div id="cpDiv1"></div>
                                             <br><br>
                                        <div> <button class="btn btn-success change-font" >Save Font Colour</button></div>
                                    </div>

                                </div>
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

        
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
       
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

        
    </body>
</html>
