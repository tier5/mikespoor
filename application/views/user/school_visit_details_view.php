<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
    </head>
    <body>
        <!-- .header-wrapper start -->
        <?php include('include/header.php'); ?>
        <!-- .page-content start -->
        <section class="page-content" style="border:none;">

            <!-- .container start -->
            <div class="container">

                <!-- .row start -->
                <div class="row">

                    <!-- .grid_9.blog-posts start -->
                    <ul class="grid_9 blog-posts triggerAnimation animated" data-animate="fadeInLeft">

                        <!-- .blog-post.format-standard start -->
                        <li class="blog-post format-standard">
                            <div class="post-media-container">
                                <a href="blogsingle.html">
                                    <img src="<?php echo BASE_URI.'uploads/'.$bloginfo['gschool_visit_blog_image']; ?>" alt="standard blog post with image" />
                                </a>
<?php
	 $df=$companyinfo['date_format'];
	date_default_timezone_set($companyinfo['time_zone']);
	?>
                                <div class="post-media-hover">
                                    <a class="mask"></a>
                                </div>
                            </div><!-- .post-media-container -->

                            <!-- .post-info start -->
                            <ul class="post-info">
                                <li class="post-date">
                                    <span class="day"><?php echo date('d',strtotime($bloginfo['addedOn']. " GMT")) ?></span>
                                            <span class="month"><?php echo date('M',strtotime($bloginfo['addedOn']. " GMT")) ?></span>
                                </li>

                                <li class="post-category">
                                    <i class="flaticon-camera46"></i>
                                </li>
                            </ul><!-- .post-info end -->

                            <!-- .post-body start -->
                            <article class="post-body">
                                <a>
                                    <h3><?php echo $bloginfo['gschool_visit_blog_title']; ?></h3>
                                </a>

                                <ul class="post-meta">
                                    <li class="flaticon-calendar52">
                                        <span><?php echo date('M d, Y',strtotime($bloginfo['addedOn']. " GMT")); ?></span>
                                    </li>
                                    

                                    

                                  <!-- .post-tags end -->
                                </ul><!-- .post-meta end -->

                                <?php echo htmlspecialchars_decode($bloginfo['gschool_visit_blog_content2']); ?>
                                <blockquote>
                                     <?php echo htmlspecialchars_decode($bloginfo['gschool_visit_blog_main']); ?>
                                </blockquote>

                                 <?php echo htmlspecialchars_decode($bloginfo['gschool_visit_blog_content3']); ?>
                            </article><!-- .post-body end -->
                        </li><!-- .blog-post.format-standard end -->
                    </ul><!-- .grid_9.blog-posts end -->

                    <!-- .grid_3.aside-right start -->
                    <aside class="grid_3 aside-right triggerAnimation animated" data-animate="fadeInRight">

                        <!-- .aside_widgets start -->
                        <ul class="aside_widgets">
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
                            </li>
                        </ul><!-- .aside_widgets end -->
                    </aside><!-- .grid_3.aside-right end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .footer-wrapper start -->
        <?php include('include/footer.php'); ?>
        
    </body>
</html>
