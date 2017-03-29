<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
    </head>

    <body>
    <!-- .header-wrapper start -->
    <?php include('include/header.php'); ?><!-- .header-wrapper end -->
    <?php include('include/headerbanner.php'); ?>
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
        </section><?php */?>
    <!-- #page-title end -->
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
                                            <span class="day"><?php echo date('d',strtotime($gallerylistdata['gschool_visit_date']. " GMT")) ?></span>
                                            <span class="month"><?php echo date('M',strtotime($gallerylistdata['gschool_visit_date']. " GMT")) ?></span>
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
                                                <span><?php echo date('M d, Y',strtotime($gallerylistdata['gschool_visit_date'])) ?></span>
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

if(isset($catagory) && $catagory)
{ 
    $linkto = BASE_URI."school-visit/category/".$catagory."/%s";
} else {
    $linkto = BASE_URI."school-visit/page/%s";
}


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
                            <!-- .widget_categories start -->
                            <li class="widget widget_categories">
                                <h6>School Categories</h6>

                                <ul>
                                <li><a href="<?php echo BASE_URI.'school-visit'; ?>">All Schools</a></li>
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
                        </ul><!-- .aside_widgets end -->
                  </aside><!-- .grid_3.aside-right end -->
              </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .footer-wrapper start -->
        <?php include('include/footer.php'); ?><!-- .footer-wrapper end -->

    </body>
</html>
