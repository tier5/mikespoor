<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
      
     
    </head>

    <body>
        <!-- style switcher start --><!-- style switcher end -->
        
        <!-- .header-wrapper start -->
         <?php include('include/header.php'); ?><!-- .header-wrapper end -->

        <!-- #page-title start -->
        <section id="page-title" class="page-title-3" style="background: url('<?php echo BASE_URI;?>assets/images/banner/thumb/<?php echo $banner['banner_image'];?>') center center; background-size: cover;">
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
