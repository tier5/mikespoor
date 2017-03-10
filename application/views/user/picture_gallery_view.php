<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <base href="<?php echo BASE_URI; ?>">
<title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $metainfo['meta_description'];?>" />
<meta name="keywords" content="<?php echo $metainfo['meta_keywords'];?>" />
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">

        <!-- stylesheets -->
        <link rel="stylesheet" href="assets/user/css/grid.css" />
        <link rel="stylesheet" href="assets/user/css/style.css" />
        <link rel="stylesheet" href="assets/user/css/darkblue.css" />
        <link rel="stylesheet" href="assets/user/css/responsive.css" />
        <link rel="stylesheet" href="assets/user/css/animate.css" />
        <link rel="stylesheet" href="assets/user/css/retina.css" />

        <!-- prettyPhoto lightbox stylesheer -->
        <link rel="stylesheet" href="assets/user/css/prettyPhoto.css" media="screen" />

        <!-- google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900,200,100' rel='stylesheet' type='text/css'>

        <!-- Icons -->
        <link rel="stylesheet" href="assets/user/pixons/style.css" />
        <link rel="stylesheet" href="assets/user/iconsfont/iconsfont.css" />

        <link rel="stylesheet" href="assets/user/style-switcher/styleSwitcher.css"/>

        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->

        <!--[if lt IE 9]>
            <script src="js/selectivizr-min.js"></script>
        <![endif]-->
        

    <link rel='stylesheet' href='assets/user/unitegallery/css/unite-gallery.css' type='text/css' />
    
    </head>
<link href="assets/user/css/flaticon.css" rel="stylesheet" type="text/css" media="screen">
    <body>
       
        
        <!-- .header-wrapper start -->
        <?php include('include/header.php'); ?>
        <!-- .header-wrapper end -->

        <!-- #page-title start -->
         <section id="page-titlep" class="page-title-1" style="background: url('<?php echo BASE_URI;?>assets/images/banner/thumb/<?php echo $banner['banner_image'];?>') center center; background-size: cover;">
            <div class="container">
                <div class="row"></div>
            </div>
        </section>

        <!-- .page-content start -->
        <section class="page-content">

            <!-- .container start -->
            <div class="container">

                <!-- .row start -->
                <div class="row portfolio-filters triggerAnimation animated" data-animate="fadeInDown">
                    <section class="grid_12">
                        <ul id="filters">
                        <li class="active"><a href="<?php echo BASE_URI.'picture-gallery/'; ?>" data-filter="*">All </a></li>
                        <?php
                        foreach($categorylist as $categorylistdata)
                        {
                        ?>
                            <li><a href="<?php echo BASE_URI.'picture-gallery/category/'.$categorylistdata['picture_slug']; ?>" data-filter="*"><?php echo $categorylistdata['picture_title']; ?> </a></li>
                            <?php
                        }
                        ?>
                            <?php /*?><li><a href="#" data-filter=".design">BOOK COVERS</a></li>
                            <li><a href="#" data-filter=".photography">ILLUSTRATIONS & SPREADS</a></li>
                            <li><a href="#" data-filter=".graphics">BLACK & WHITE</a></li>
                             <li><a href="#" data-filter=".graphics">CHARACTERS</a></li>
                              <li><a href="#" data-filter=".graphics">ANIMAL CHARACTERS </a></li>
                               <li><a href="#" data-filter=".graphics">PLACES</a></li>
                                <li><a href="#" data-filter=".graphics">SKETCHES </a></li>
                                 <li><a href="#" data-filter=".graphics">EDITORIAL ILLUSTRATIONS</a></li>
                                  <li><a href="#" data-filter=".graphics">STYLES</a></li><?php */?>
                        </ul>
                    </section><!-- .grid_12 end -->                    
                </div><!-- .row.portfolio-filters end  end -->

                
                
                
                
            <?php
            if(count($gallerylist)>0)
            {
            ?>  
                
                <div id="gallery" style="display:none;">

        
        <?php
        
       
        foreach($gallerylist as $gallerylistdata)
        {
        ?>
        <a href="http://unitegallery.net">
        <img alt="<?php echo $gallerylistdata['gpicture_title']; ?>"
             src="<?php echo BASE_URI.'uploads/'.$gallerylistdata['gpicture_image']; ?>"
             data-image="<?php echo BASE_URI.'uploads/'.$gallerylistdata['gpicture_image']; ?>"
             data-description="This is a Lemon Slice"
             style="display:none">
        </a>
        <?php
        }
        ?>
        

             
    </div>
            <?php
            }
            else
            {
                ?>
                <h3>No Picures Found</h3>
                <?php
            }
            ?>
                
                
                
    
                
                
                
                

                <!-- .roe start -->
                <div class="row">
                    <div class="grid_12 pagination">
                        <?php /*?><ul>
                            <li class="current-page">
                                <span>Page 1 of 5</span>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#" class=" icon-double-angle-right"></a></li>
                        </ul><?php */?>
                        <?php
if($totalrec!=0)
{
?>
<!--pagination class-->
<div class="page_no_area">
<?php
include ("include/pagination.php");
$total_records = $totalrec;
$page_req=ceil($total_records / 20);
$page = 1;
// how many records per page
$size = 20;
// we get the current page from $_GET
if ($nowpage){
    $start = ($nowpage - 1) * 20;
    $page = (int) $nowpage;
}
else
{
    $start=0;
}
$pagination = new Pagination();
$linkto = BASE_URI."picture-gallery/page/%s";
$pagination->setLink($linkto);
$pagination->setPage($page);
$pagination->setSize($size);
$pagination->setTotalRecords($total_records);
 
// now use this SQL statement to get records from your table
?>
<?php
          $navigation = $pagination->create_links();
          echo $navigation; // will draw our page navigation
                 ?>
</div>
<!--pagination class ends-->
<?php
}
?>
                    </div><!-- .grid_12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .footer-wrapper start -->
        <?php include('include/footer.php'); ?>
        <!-- .footer-wrapper end -->

        <!-- scripts -->
        <script  src="assets/user/js/jquery-1.9.1.js"></script> <!-- jQuery library -->  
        <script  src="assets/user/js/jquery-migrate-1.2.1.min.js"></script> <!-- jQuery migrate -->
        <script  src="assets/user/js/jquery.placeholder.min.js"></script><!-- jQuery placeholder fix for old browsers -->
        <script  src="assets/user/js/modernizr.custom.js"></script> <!-- jQuery modernizr -->
        <script  src="assets/user/js/jquery.dlmenu.js"></script><!-- responsive navigation -->
        <script  src="assets/user/js/waypoints.min.js"></script><!-- js for animating content -->
        <script  src="assets/user/js/retina-1.1.0.min.js"></script><!-- retina ready script -->
        <script  src="assets/user/js/jquery.stellar.min.js"></script><!-- parallax scrolling -->
        <script  src="assets/user/js/jquery.isotope.min.js"></script><!-- jQuery isotope plugin -->
        <script  src="assets/user/js/portfolio.js"></script> <!-- jQuery portfolio options -->
        <script  src="assets/user/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto lightbox -->
        <script  src="assets/user/js/jquery.tweetscroll.js"></script> <!-- jQuery tweetscroll plugin -->
        <script  src="assets/user/sharre/jquery.sharrre-1.3.4.min.js"></script><!-- Sharre post plugin -->
        <script  src="assets/user/style-switcher/styleSwitcher.js"></script>
        <script  src="assets/user/js/nicescroll.min.js"></script> <!-- Nice scroll Plugin -->
        <script  src="assets/user/js/include.js"></script> <!-- jQuery custom options -->

        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function($) {
                'use strict';
                // PRETTYPHOTO LIGHTBOX START
                if(jQuery().prettyPhoto) {
                    piPrettyphoto(); 
                }
    
                function piPrettyphoto(){
                    $("a[data-gal^='prettyPhoto']").prettyPhoto({
                        social_tools: false,
                        hook: 'data-gal'
                    });
                }  
                //JQUERY SHARRE PLUGIN END
                $('.sharre-facebook').sharrre({
                    share: {
                        facebook: true
                    },
                    enableHover: false,
                    enableTracking: true,
                    click: function(api, options) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    }
                });
            });
            /* ]]> */
        </script>
        <script type='text/javascript' src='assets/user/unitegallery/js/jquery-11.0.min.js'></script>   
    <script type='text/javascript' src='assets/user/unitegallery/js/unitegallery.min.js'></script>  
    <script type='text/javascript' src='assets/user/unitegallery/themes/tiles/ug-theme-tiles.js'></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("#gallery").unitegallery({
                tiles_type:"nested"
            });
        });
        
    </script>
    </body>
</html>