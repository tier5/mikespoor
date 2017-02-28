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
		</section>
        <br/>
        <!-- #page-title start -->
       <?php /*?> <section id="page-title" class="page-title-4">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="breadcrumbs triggerAnimation animated" data-animate="fadeInUp">
                            
                        </div>
                    </div><!-- .grid_8 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><?php */?><!-- #page-title end -->
<?php
	 $df=$companyinfo['date_format'];
	date_default_timezone_set($companyinfo['time_zone']);
	?>
        <!-- .page-content start -->
        <section class="page-content">

            <!-- .container start -->
            <div class="container">

                <!-- .row start -->
                <div class="row">

                    <!-- .grid_9.blog-posts start -->
                    <ul class="grid_9 blog-posts blog-post-small-image triggerAnimation animated" data-animate="fadeInLeft">
                      
                      <?php
					  if(count($gallerylist)>0)
					  {
					  foreach($gallerylist as $gallerylistdata)
					  {
					  ?>
                        <!-- .blog-post.format-standard start -->
                        <li class="blog-post format-standard">
                            <div class="post-media-container">
                                <a href="<?php echo BASE_URI.'school-visit/details/'.$gallerylistdata['gschool_visit_blog_slug']; ?>">
                                    <img src="<?php echo BASE_URI.'uploads/'.$gallerylistdata['gschool_visit_blog_image']; ?>" alt="standard blog post with image" />
                                </a>

                                <div class="post-media-hover">
                                    <a href="<?php echo BASE_URI.'school-visit/details/'.$gallerylistdata['gschool_visit_blog_slug']; ?>" class="mask"></a>
                                </div>
                            </div><!-- .post-media-container -->

                            <!-- .post-body start -->
                            <article class="post-body">

                                <!-- .post-info start -->
                                <div class="post-info-container">
                                    <ul class="date-category">
                                        <li class="post-date">
                                            <span class="day"><?php echo date('d',strtotime($gallerylistdata['addedOn']. " GMT")) ?></span>
                                            <span class="month"><?php echo date('M',strtotime($gallerylistdata['addedOn']. " GMT")) ?></span>
                                        </li>

                                        <li class="post-category">
                                            <i class="flaticon-camera46"></i>
                                        </li>
                                    </ul>

                                    <div class="post-info">
                                        <a href="<?php echo BASE_URI.'school-visit/details/'.$gallerylistdata['gschool_visit_blog_slug']; ?>">
                                            <h3><?php echo $gallerylistdata['gschool_visit_blog_title']; ?></h3>
                                        </a>

                                        <ul class="post-meta">
                                            <li class="flaticon-calendar52">
                                                <span><?php echo date('M d, Y',strtotime($gallerylistdata['addedOn'])) ?></span>
                                            </li>
                                            

                                            <!-- .post-tags end -->
                                        </ul><!-- .post-meta end -->
                                    </div><!-- .post-info end -->

                                </div><!-- .post-info-container end -->

                                <?php echo htmlspecialchars_decode($gallerylistdata['gschool_visit_blog_content']); ?>

                                <a class="read-more" href="<?php echo BASE_URI.'school-visit/details/'.$gallerylistdata['gschool_visit_blog_slug']; ?>">
                                    Read more
                                    <span class="flaticon-arrow461"></span>
                                </a>
                            </article><!-- .post-body end -->
                        </li><!-- .blog-post.format-standard end -->
                         <?php
					  }
					  }
					  else
					  {
						  ?>
                          <h3>No Results Found</h3>
                          <?php
					  }
					  ?>
                      

                        <li class="pagination">

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


$linkto = BASE_URI."school-visit/page/%s";

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
                        </li>
                    </ul><!-- .grid_9.blog-posts end -->

                    <!-- .grid_3.aside-right start -->
                    <aside class="grid_3 aside-right triggerAnimation animated" data-animate="fadeInRight">

                        <!-- .aside_widgets start -->
                        <ul class="aside_widgets">

                            <!-- .widget.widget_search start --><!-- .widget.widget_search end -->

                            <!-- .widget.pi_recent_posts start --><!-- .pi_recent_posts end -->

                            <!-- .widget_categories start -->
                            <li class="widget widget_categories">
                                <h6>blog categories</h6>

                                <ul>
                                <li><a href="<?php echo BASE_URI.'school-visit'; ?>">All</a></li>
                                <?php
								foreach($categorylist as $category_listdata)
								{
								?>
                                    <li><a href="<?php echo BASE_URI.'school-visit/category/'.$category_listdata['school_visit_slug']; ?>"><?php echo $category_listdata['school_visit_title']; ?></a></li>
                                    <?php
								}
								?>
                                    
                                </ul>  
                            </li><!-- .widget_categories end -->

                            <!-- .widget.widget_recent_comments start --><!-- .widget.widget_recent_comments end -->

                            <!-- .social-feed start --><!-- .social-feed end -->

                        </ul><!-- .aside_widgets end -->
                  </aside><!-- .grid_3.aside-right end -->
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
