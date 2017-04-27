<!DOCTYPE html>
<html>
    <head>
         <?php include('include/headsection.php'); ?>

    
    </head>

    <body>
        <!-- style switcher start --><!-- style switcher end -->
        
        <!-- .header-wrapper start -->
         <?php include('include/header.php'); ?><!-- .header-wrapper end -->

		
		<!-- HOME -->
        <?php include('include/headerbanner.php'); ?>
		
		
		
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

                                  

                                <?php if(isset($gallerylistdata['gvideo_url']) && ($gallerylistdata['video_type']=='1') ){ ?>
                                       <?php $url=(explode("?v=",$gallerylistdata['gvideo_url']));  ?>
                                         <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?php echo $url[1]; ?>" frameborder="0" allowfullscreen></iframe>
                                           
                                     
                                    <?php } ?>

                              
                                <?php if(isset($gallerylistdata['gvideo_url']) && ($gallerylistdata['video_type']=='2') ){ ?>
                                      
                                        <?php 
                                        $ext=substr($gallerylistdata['gvideo_url'], strrpos($gallerylistdata['gvideo_url'], '.') + 1);


                                        ?>
                                        <video width="100%" height="280"  controls>
                                          <source src="<?php echo BASE_URI?>uploads/video/<?php echo $gallerylistdata['gvideo_url'];?>" type="video/<?php echo $ext; ?>">
                                      
                            
                                        </video>
                                            
                                           
                                     
                                    <?php } ?>
                                  </div>
                                <figcaption>
                                    <a class="title"><?php  echo $gallerylistdata['gvideo_title'];?></a>
                                    
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
        
        
      
         
		 
	
        
        
    </body>
</html>
