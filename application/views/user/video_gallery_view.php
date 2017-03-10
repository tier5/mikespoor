<!DOCTYPE html>
<html>
    <head>
         <?php include('include/headsection.php'); ?>
       
     

		

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
