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

        <!-- Nivo slider stylesheer -->
        <link rel="stylesheet" href="assets/user/css/nivo-slider.css"/>

        <!-- jPlayer (audio player css) -->
        <link rel="stylesheet" href="assets/user/js/jplayer/skin/pixel-industry/pixel-industry.css"/>

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
<link href="assets/user/css/flaticon.css" rel="stylesheet" type="text/css" media="screen">
    </head>

    <body>
    
        <!-- style switcher start --><!-- style switcher end -->
        
        <!-- .header-wrapper start -->
         <?php include('include/header.php'); ?><!-- .header-wrapper end -->

        <!-- #page-title start -->
        <section id="page-title" class="page-title-3">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <div class="breadcrumbs triggerAnimation animated" data-animate="fadeInUp">
                            
                        </div>
                    </div><!-- .grid_8 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- #page-title end -->

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

                                <!-- .share-post start --><!-- share-post end -->

                                <!-- .post-author start --><!-- .post-author end -->

                                <!-- .post-comments start --><!-- .post-comments end -->

                                <!-- .comment-form start --><!-- .comment-form end -->
                            </article><!-- .post-body end -->
                        </li><!-- .blog-post.format-standard end -->
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
        <script  src="assets/user/js/jquery.tweetscroll.js"></script> <!-- jQuery tweetscroll plugin -->
        <script  src="assets/user/js/modernizr.custom.js"></script> <!-- jQuery modernizr -->
        <script  src="assets/user/js/jquery.dlmenu.js"></script><!-- responsive navigation -->
        <script  src="assets/user/js/waypoints.min.js"></script><!-- js for animating content -->
        <script  src="assets/user/js/retina-1.1.0.min.js"></script><!-- retina ready script -->
        <script  src="assets/user/js/jquery.stellar.min.js"></script><!-- parallax scrolling -->
        <script  src="assets/user/js/socialstream.jquery.js"></script> <!-- Social Networks Feeds -->
        <script  src="assets/user/sharre/jquery.sharrre-1.3.4.min.js"></script><!-- Sharre post plugin -->
        <script  src="assets/user/style-switcher/styleSwitcher.js"></script>
		<script  src="assets/user/js/nicescroll.min.js"></script> <!-- Nice scroll Plugin -->
        <script  src="assets/user/js/include.js"></script> <!-- jQuery custom options -->

        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function($) {
                'use strict';

                // FLICKR FEED START
                $('.flickr-feed').socialstream({
                    socialnetwork: 'flickr',
                    limit: 8,
                    username: 'pixel-industry'
                }); // FLICKR FEED END

                //JQUERY SHARRE PLUGIN END
                $('#shareme').sharrre({
                    share: {
                        twitter: true,
                        facebook: true,
                        googlePlus: true
                    },
                    template: '<div class="box"><div class="left">Share</div><div class="middle"><a href="#" class="facebook">f</a><a href="#" class="twitter">t</a><a href="#" class="googleplus">+1</a></div><div class="right">{total}</div></div>',
                    enableHover: false,
                    enableTracking: true,
                    render: function(api, options) {
                        $(api.element).on('click', '.twitter', function() {
                            api.openPopup('twitter');
                        });
                        $(api.element).on('click', '.facebook', function() {
                            api.openPopup('facebook');
                        });
                        $(api.element).on('click', '.googleplus', function() {
                            api.openPopup('googlePlus');
                        });
                    }
                }); //JQUERY SHARRE PLUGIN END

                // COMMENT FORM AJAX SUBMIT
                $('#commentform #comment-reply').on('click', function(event) {
                    event.preventDefault();
                    var name = $('#comment-name').val();
                    var email = $('#comment-email').val();
                    var message = $('#comment-message').val();
                    var form_data = new Array({'Name': name, 'Email': email, 'Message': message});
                    $.ajax({
                        type: 'POST',
                        url: "contact.php",
                        data: ({'action': 'comment', 'form_data': form_data})
                    }).done(function(data) {
                        alert(data);
                    });
                });

            });

            /* ]]> */
        </script>
    </body>
</html>
