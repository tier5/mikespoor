<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
       

       
      
	   
	    
    </head>
   
    <body>
        <!-- .header-wrapper start -->
        <?php include('include/header.php'); ?>
        <!-- .header-wrapper end -->

        <!-- #page-title start -->
        <section id="page-titlep" class="page-title-1" style="background: url('<?php echo BASE_URI;?>assets/images/banner/thumb/<?php echo $banner['banner_image'];?>') center center; background-size: cover;" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">              
                </div>
            </div>
        </section>
        <!-- #page-title end -->

        <!-- .page-content start -->
        <section class="page-content">
            <div class="container">
                <div class="row portfolio-filters triggerAnimation animated" data-animate="fadeInDown">
                    <section class="grid_12">
                        <ul id="filters">
                            <li class="active"><a href="<?php echo BASE_URI.'picture-gallery/'; ?>" data-filter="*">All </a></li>
                            <?php foreach($categorylist as $categorylistdata) { ?>
                                <li><a href="<?php echo BASE_URI.'picture-gallery/category/'.$categorylistdata['picture_slug']; ?>" data-filter="*"><?php echo $categorylistdata['picture_title']; ?> </a></li>
                            <?php } ?>
                        </ul>
                    </section>               
                </div>
			    <?php if(count($gallerylist)>0) {?>	
    				<div id="gallery" style="display:none;">
                    <?php foreach($gallerylist as $gallerylistdata) { ?>
                    <a href="http://unitegallery.net">
            		    <img alt="<?php echo $gallerylistdata['gpicture_title']; ?>"
            		     src="<?php echo BASE_URI.'uploads/'.$gallerylistdata['gpicture_image']; ?>"
            		     data-image="<?php echo BASE_URI.'uploads/'.$gallerylistdata['gpicture_image']; ?>"
            		     data-description="This is a Lemon Slice"
            		     style="display:none">
            		</a>
                    <?php } ?>
                    </div>
			    <?php } else { ?>
				    <h3>No Picures Found</h3>
                <?php } ?>
				
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
                        <?php if($totalrec!=0) { ?>
                            <!--pagination class-->
                            <div class="page_no_area">
                                    <?php 
                                    include ("include/pagination.php");
                                    $total_records = $totalrec;
                                    $page_req=ceil($total_records / 20);
                                    $page = 1;// how many records per page
                                    $size = 20; // we get the current page from $_GET
                                    if ($nowpage){
                                    	$start = ($nowpage - 1) * 20;
                                        $page = (int) $nowpage;
                                    }
                                    else {
                                        $start=0;
                                    }

                                    $pagination = new Pagination();


                                    $linkto = BASE_URI."picture-gallery/page/%s";

                                    $pagination->setLink($linkto);

                                    $pagination->setPage($page);

                                    $pagination->setSize($size);

                                    $pagination->setTotalRecords($total_records); ?>
                                    <?php
                                	  $navigation = $pagination->create_links();
                                	  echo $navigation; // will draw our page navigation
                                    ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- .footer-wrapper start -->
        <?php include('include/footer.php'); ?>
        <!-- .footer-wrapper end -->

       

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
