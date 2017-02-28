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
            <link href="assets/user/css/flexslider.css" rel="stylesheet" type="text/css" />
        <!-- prettyPhoto lightbox stylesheer -->
        <link rel="stylesheet" href="assets/user/css/prettyPhoto.css" media="screen" />

        <!-- google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900,200,100' rel='stylesheet' type='text/css'>

		
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
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
<link href="assets/user/css/flaticon.css" rel="stylesheet" type="text/css" media="screen">
    </head>

    <body>
        <!-- style switcher start --><!-- style switcher end -->
        
        <!-- .header-wrapper start -->
         <?php include('include/header.php'); ?><!-- .header-wrapper end -->

		
		<!-- HOME -->
		<section id="home" class="padbot0">
				
			<!-- TOP SLIDER -->
			<div class="flexslider top_slider" >
             <?php
			 if($companyinfo['video_status'])
			 {
			 ?>
				<ul class="slides">
                   <?php
				   foreach($videobannerlist as $videobannerdata)
				   {
				   ?>
					<li class="slide1">
						<div class="flex_caption1">
							<p class="title1 captionDelay2 FromTop" style="color:#FFF;"><?php echo $videobannerdata['video_banner_title']; ?></p>
							
							<p class="title4 captionDelay7 FromBottom" style="color:#FFF;"><?php echo htmlspecialchars_decode($videobannerdata['video_banner_content']); ?></p>
						</div>
					</li>
                    <?php
				   }
				   ?>
					
				</ul>
				<?php
			 }
			 ?>
				<!-- VIDEO BACKGROUND -->
              <a name="P2" class="player" id="P2" data-property="{videoURL:'<?php echo $companyinfo['video_banner']; ?>',containment:'.top_slider',autoPlay:true, mute:true, startAt:0, opacity:1}"></a>
              <!-- //VIDEO BACKGROUND -->
			</div><!-- //TOP SLIDER -->
		</section><!-- //HOME -->
		
		
        <!-- #page-title start -->
		
        <br/>

        <!-- .page-content start -->
        <section class="page-content">

            <!-- .container start -->
            <div class="container">

                <!-- .row start --><!-- .row.portfolio-filters end  end -->

                <!-- .row.portfolio-items-holder start -->
                <div class="row portfolio-items-holder triggerAnimation animated" data-animate="fadeInUp">

                    <!-- #portfolioitems.isotope start -->
                    <ul id="portfolioitems" class="isotope">

                       <?php
					   foreach($gallerylist as $gallerylistdata)
					   {
					   ?>
                        <li class="grid_4 isotope-item photography">

                            <?php /*?><iframe width="100%" height="100%" src="https://www.youtube.com/embed/Ctugo5EJuns" frameborder="0" allowfullscreen></iframe><?php */?>
                            <figure class="portfolio-img-container">
                                <div class="portfolio-img">
                                    <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?php echo $gallerylistdata['gvideo_url']; ?>" frameborder="0" allowfullscreen></iframe>

                                    <!-- .portfolio-img-hover end -->

                                </div>

                                <figcaption>
                                    <a class="title" href="portfoliosingle.html">On the top of the world</a>
                                    
                                </figcaption>
                            </figure>
                        </li><!-- .grid_4.isotope-item.design end -->
                      <?php
					   }
					   ?>
                       

                      
                      
                        
                    </ul><!-- #portfolioitems.isotope end -->

                </div><!-- .row.portfolio-items-holder start -->

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
$page_req=ceil($total_records / 6);
$page = 1;

// how many records per page

$size = 6;

// we get the current page from $_GET

if ($nowpage){
	$start = ($nowpage - 1) * 6;
    $page = (int) $nowpage;

}
else
{
	$start=0;
}

$pagination = new Pagination();


$linkto = BASE_URI."video-gallery/page/%s";

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
         <?php include('include/footer.php'); ?><!-- .footer-wrapper end -->
        
        
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
         
		 
	<script src="assets/user/js/js/jquery.flexslider-min.js" type="text/javascript"></script>
	
	<script src="assets/user/js/js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
	
	<script src="assets/user/js/js/mynewscript.js" type="text/javascript"></script>
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
        
        
        
    </body>
</html>
