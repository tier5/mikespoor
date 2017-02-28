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
        <section class="page-content">

            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <!-- .grid_6 start -->
                    <article class="grid_6">
                        <div class="triggerAnimation animated" data-animate='fadeInLeft'>
                            <img src='<?php echo BASE_URI.'uploads/'.$cmsinfo['cms_image']; ?>' alt='team member single image'/>
                        </div>
                    </article><!-- .grid_6 end -->

                    <!-- .grid_6 start -->
                    <article class="grid_6">

                        <div class="triggerAnimation animated" data-animate='fadeInRight'>
                            <!-- .heading-bordered start -->
                            <section class="heading-bordered">
                                <h3>Link & News</h3>
                            </section><!-- .heading-bordered end -->

                            <?php echo htmlspecialchars_decode($cmsinfo['cms_content']); ?>

                            <!-- .team-social-links end -->
                        </div><!-- .triggerAnimation.animated end -->
                    </article><!-- .grid_6 end --> 
                </div><!-- .row end -->

                <!-- .row start --><!-- .row end -->
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
        <script  src="assets/user/js/jquery.tweetscroll.js"></script> <!-- jQuery tweetscroll plugin -->
        <script  src="assets/user/style-switcher/styleSwitcher.js"></script>
		<script  src="assets/user/js/nicescroll.min.js"></script> <!-- Nice scroll Plugin -->
        <script  src="assets/user/js/include.js"></script> <!-- jQuery custom options -->


        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function($) {
                'use strict';

                $('.skills-bar').waypoint(function() {
                    $('.skills li span').addClass('expand');
                },
                        {offset: '70%'}
                );
            });

            /* ]]> */
        </script>
    </body>
</html>
