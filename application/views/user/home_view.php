<!DOCTYPE html>
<html>
    <head>
         <?php include('include/headsection.php'); ?>
         <script>
            /* <![CDATA[ */
            jQuery(document).ready(function($) {
                'use strict';

                //REVOLUTION SLIDE
                var revapi;
                revapi = jQuery('.tp-banner').revolution(
                        {
                            delay: 5000,
                            startwidth: 1170,
                            startheight: 500,
                            hideThumbs: 10,
                            fullWidth: "on",
                            forceFullWidth: "on",
                            navigationType: "none" // bullet, thumb, none
                        });

                $('.numbers-counter').waypoint(function() {
                    // NUMBERS COUNTER START
                    $('.numbers').data('countToOptions', {
                        formatter: function(value, options) {
                            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                        }
                    });
                    // start timer
                    $('.timer').each(count);

                    function count(options) {
                        var $this = $(this);
                        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                        $this.countTo(options);
                    } // NUMBERS COUNTER END
                },
                        {offset: '70%'}
                );

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

                //PORTFOLIO CAROUSEL
                //  Responsive layout, resizing the items
                $('#portfolio-carousel').carouFredSel({
                    responsive: true,
                    width: '100%',
                    height: '100%',
                    auto: false,
                    scroll: 1,
                    prev: '.c_prev_2',
                    next: '.c_next_2',
                    items: {
                        width: 400,
                        height: '100%',
                        visible: {
                            min: 1,
                            max: 4
                        }
                    }

                });

                //  Testimonial carousel Responsive layout, resizing the items
                $('#services-carousel').carouFredSel({
                    responsive: true,
                    width: '100%',
                    auto: false,
                    scroll: 1,
                    prev: '.c_prev',
                    next: '.c_next',
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    items: {
                        width: 370,
                        height: 'auto',
                        visible: {
                            min: 1,
                            max: 3
                        }
                    }
                });

                //  Responsive layout, resizing the items
               $('#testimonial-carousel-2').carouFredSel({
                    responsive: true,
                    width: '100%',
                    auto: true,
                    scroll: 1,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    items: {
                        width: '370',
                        height: 'variable',
                        visible: {
                            min: 1,
                            max: 1
                        }
                    }
                });


            });

            /* ]]> */
        </script> 
    </head>

    <body>
        <!-- style switcher start -->
        <!--<section id="style-switcher" class="">
            <section id="styles-container">
                <section>
                    <h6>Layout Style</h6>
                    <ul class="layout-list">
                        <li class="elvyre-boxed"><a href="../boxed/index.html">Boxed Layout</a></li>
                        <li class="elvyre-stretched active"><a href="#">Wide Layout</a></li>
                    </ul>
                </section>

            </section>
            <a href="#" id="styles-button"><div id="switcher-logo"></div></a>
        </section>--><!-- style switcher end -->
        
        <!-- .header-wrapper start -->
        <?php include('include/header.php'); ?><!-- .header-wrapper end -->

        <!-- .tp-wrapper start -->
        <div class="tp-wrapper no-bottom-margin">
            <!-- .tp-banner-container start -->
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <!-- slide 2 start -->
                        <?php
							foreach($bannerlist as $bannerlistdata)
							{
							?>
                        <li data-transition="fade" data-slotamount="15" data-masterspeed="1500">
                            <!-- main image -->
                            
                            <img src="<?php echo BASE_URI.'uploads/'.$bannerlistdata['banner_image']; ?>" alt="slidebg3" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat" />
                         
                            <!-- layer 2 -->
                            <div class="tp-caption regular sfl"
                                 data-x="200"
                                 data-y="50"
                                 data-speed="600"
                                 data-start="1500"
                                 data-easing="Back.easeOut"
                                 data-endspeed="300"><img src="<?php echo BASE_URI.'uploads/'.$bannerlistdata['banner_front_image']; ?>" alt='mobile devices'/>
                            </div>

                            <!-- layer 3 -->
                            <div class="tp-caption list-right sfl"
                                 data-x="160"
                                 data-y="40"
                                 data-speed="600"
                                 data-start="2000"
                                 data-easing="Back.easeOut"
                                 data-endspeed="200"><?php echo stripslashes($bannerlistdata['banner_comment']); ?>
                            </div>

                           
                        </li>
                         <?php
							}
							?>
                        <!-- slide 2 start -->
                        

                        <!-- slide 3 start -->
                        
                    </ul>
                </div><!-- .tp-banner end -->
            </div><!-- .tp-banner end -->
        </div><!-- .tp-wrapper end -->

        <!-- .page-content start -->
        <section class="page-content background-black" style="background-color:<?php echo $companyinfo['theme_color']; ?>;">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <article class="grid_12">
                        <div class="triggerAnimation animated" data-animate="fadeInUp">
                            <div class="note no-bottom-margin">
                                <h4><?php echo $welcome_title['title']; ?></h4>
                                
                            </div>
                        </div><!-- .triggerAnimation.animated end -->
                    </article><!-- .grid_12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .page-content start -->
        <section class="page-content parallax parallax-1" data-stellar-background-ratio="0.5">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <article class="grid_12">
                        <div class="triggerAnimation animated" data-animate="fadeInLeft">
                            <ul id='services-carousel' class='carousel-li'>
                            <?php
							foreach($featurelist as $featurelistdata)
							{
							?>
                                <li class="service-box-1">
                                    <div class="flaticon-mobile29" style="width:30px; float:left"></div>

                                    <a href='#'>
                                        <h5><?php echo $featurelistdata['feat_title']; ?></h5>
                                    </a>

                                    <?php echo htmlspecialchars_decode($featurelistdata['feat_content']); ?>
                                </li>
                           <?php
							}
							?>
                                


                                
                            </ul><!-- #services-carousel end -->

                            <div class="clearfix"></div>
                            <ul class="carousel-nav">
                                <li>
                                    <a class="c_prev" href="#"></a> 
                                </li>
                                <li>
                                    <a class="c_next" href="#"></a>
                                </li>
                            </ul>
                        </div><!-- .triggerAnimation animated end -->
                    </article><!-- .grid_12 end -->                    
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <section class='page-content'>
            <div class="container">
                <div class="row services-row">
                    <article class="grid_2 hidden-xs">
                    </article>
                    <article class="grid_7">
                        <section class="heading-bordered">
                                <h3>What we <b>Offer</b></h3>
                            </section>
                    </article>
                    <article class="grid_3 hidden-xs">
                    </article>
                </div>
                <div class="row">
                    <!-- <article class="grid_3">
                        <img class="triggerAnimation animated" src="assets/user/img/pictures/woman-ceo.png" alt="ceo" data-animate="fadeInLeft"/>
                    </article> -->

                    <article class="grid_9">
                        <div class="triggerAnimation animated" data-animate="fadeInLeft">
                            <ul class="services-overview">
                                <li>
                                    <img class="triggerAnimation animated" src="assets/user/img/pictures/woman-ceo.png" alt="ceo" data-animate="fadeInLeft"/>
                                    <div class="overview-txt">
                                        <h5><?php echo $homeinfo['home_offer1_title']; ?> </h5>
                                        <?php echo htmlspecialchars_decode($homeinfo['home_offer1_content']); ?>
                                    </div>
                                </li>

                                <li>
                                    <img class="triggerAnimation animated" src="assets/user/img/pictures/woman-ceo.png" alt="ceo" data-animate="fadeInLeft"/>
                                    <div class="overview-txt">
                                        <h5><?php echo $homeinfo['home_offer2_title']; ?> </h5>
                                         <?php echo htmlspecialchars_decode($homeinfo['home_offer2_content']); ?>
                                    </div>
                                </li>

                                <li>
                                    <img class="triggerAnimation animated" src="assets/user/img/pictures/woman-ceo.png" alt="ceo" data-animate="fadeInLeft"/>
                                    <div class="overview-txt">
                                        <h5><?php echo $homeinfo['home_offer3_title']; ?> </h5>
                                        <?php echo htmlspecialchars_decode($homeinfo['home_offer3_content']); ?>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- .triggeranimation.animated end -->
                    </article><!-- .grid_6 -->

                    <article class='grid_3' >
                        <div class="triggerAnimation animated" data-animate='fadeInRight'>
                            <!-- .heading-bordered start -->
                            <section class="heading-bordered">
                                <h3>My <b>stats</b></h3>
                            </section><!-- .heading-bordered end -->

                            <ul class='numbers-counter' >
                                <li style="background-color:<?php echo $companyinfo['theme_color']; ?>;">
                                    <span class='timer number' data-to='<?php echo $homeinfo['home_stat1_content']; ?>' data-speed='2000'><?php echo $homeinfo['home_stat1_content']; ?></span>
                                    <p><?php echo $homeinfo['home_stat1_title']; ?></p>
                                </li style="background-color:><?php echo $companyinfo['theme_color']; ?>;">

                                <li style="background-color:<?php echo $companyinfo['theme_color']; ?>;">
                                    <span class='timer number' data-to='<?php echo $homeinfo['home_stat2_content']; ?>' data-speed='2000'><?php echo $homeinfo['home_stat2_content']; ?></span>
                                    <p><?php echo $homeinfo['home_stat2_title']; ?></p>
                                </li >

                                <li style="background-color:<?php echo $companyinfo['theme_color']; ?>;">
                                    <span class='timer number' data-to='<?php echo $homeinfo['home_stat3_content']; ?>' data-speed='2000'><?php echo $homeinfo['home_stat3_content']; ?></span>
                                    <p><?php echo $homeinfo['home_stat3_title']; ?></p>
                                </li>

                                <li style="background-color:<?php echo $companyinfo['theme_color']; ?>;">
                                    <span class='timer number' data-to='<?php echo $homeinfo['home_stat4_content']; ?>' data-speed='2000'><?php echo $homeinfo['home_stat4_content']; ?></span>
                                    <p><?php echo $homeinfo['home_stat4_title']; ?></p>
                                </li>
                            </ul>
                        </div><!-- .triggerAnimation.animated end -->
                    </article><!-- .grid_3 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .page-content.parallax start -->
        <section class="page-content parallax parallax-2">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <section class="grid_12">
                        <section class="heading-centered triggerAnimation animated" data-animate="bounceIn">
                            <h2> <b>Current Information</b></h2>
                            
                        </section>
                    </section>
                </div><!-- .row end -->

                <!-- .row start -->
                <div class="row">
                    <!-- .grid_4 start -->
                    <article class="grid_4">
                        <div class="triggerAnimation animated" data-animate="fadeInLeft">
                            <section class="process-box">
                                <div class="img-container">
                                    <img src="assets/user/img/pictures/development-1.png" alt="creative thinking"/>
                                </div>

                                <h5><?php echo $homeinfo['home_sec1_title']; ?> </h5>
                                <?php echo htmlspecialchars_decode($homeinfo['home_sec1_content']); ?>
                            </section>
                        </div><!-- .triggerAnimation animated end -->
                    </article><!-- .GRID_4 END -->

                    <!-- .grid_4 start -->
                    <article class="grid_4">
                        <div class="triggerAnimation animated" data-animate="fadeInUp">
                            <section class="process-box">
                                <div class="img-container">
                                    <img src="assets/user/img/pictures/development-2.png" alt="creative thinking"/>
                                </div>

                                <h5><?php echo $homeinfo['home_sec2_title']; ?> </h5>
                                 <?php echo htmlspecialchars_decode($homeinfo['home_sec2_content']); ?>
                            </section>
                        </div><!-- .triggerAnimation animated end -->
                    </article><!-- .GRID_4 END -->

                    <!-- .grid_4 start -->
                    <article class="grid_4">
                        <div class="triggerAnimation animated" data-animate="fadeInRight">
                            <section class="process-box">
                                <div class="img-container">
                                    <img src="assets/user/img/pictures/development-3.png" alt="creative thinking"/>
                                </div>

                                <h5><?php echo $homeinfo['home_sec3_title']; ?> </h5>
                                  <?php echo htmlspecialchars_decode($homeinfo['home_sec3_content']); ?>
                            </section>
                        </div><!-- .triggerAnimation animated end -->
                    </article><!-- .GRID_4 END -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content.parallax.parallax-2 end -->

        <section class="page-content">
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <article class="grid_12">
                        <section class="heading-centered triggerAnimation animated" data-animate="bounceIn">
                            <h2>Latest <b>portfolio</b> projects</h2>
                            <p>Check our latest portfolio projects. Sure you'll find something interesting.</p>
                        </section>
                    </article><!-- .grid_12 end -->

                </div><!-- .roe end -->

                <!-- .row start -->
                <div class='row'> 
                    <article class="grid_12">
                        <article class="portfolio-carousel triggerAnimation animated" data-animate="fadeInUp">
                            <ul id="portfolio-carousel" class="carousel-li">
                            <?php
							foreach($gallerylist as $gallerylistdata)
							{
							?>
                                <li class="isotope-item">

                                    <figure class="portfolio-img-container">
                                        <div class="portfolio-img">

                                            <img src="<?php echo BASE_URI.'uploads/'.$gallerylistdata['gpicture_image']; ?>" alt="portfolio image"/>


                                            <div class="portfolio-img-hover">
                                                <div class="mask"></div>

                                                <ul>
                                                    <li class="portfolio-zoom">
                                                        <a href="<?php echo BASE_URI.'picture-gallery'; ?>" 
                                                           data-gal="prettyPhoto[pp_gallery]" class="flaticon-zoom27"></a>
                                                    </li>

                                                    <li class="portfolio-single">
                                                        <a href="<?php echo BASE_URI.'picture-gallery'; ?>" class="flaticon-external2"></a>
                                                    </li>
                                                </ul>
                                            </div><!-- .portfolio-img-hover end -->

                                        </div>

                                        <figcaption>
                                            <a class="title" href="<?php echo BASE_URI.'picture-gallery'; ?>"><?php echo $gallerylistdata['gpicture_title']; ?></a>
                                            <div class="sharre-facebook portfolio-item-like flaticon-heart75" data-url="http://www.pixel-industry.com/" data-text="Just an example of sharing your portfolio image"></div>
                                        </figcaption>
                                    </figure>
                                </li><!-- .isotope-item end -->
                            <?php
							}
							?>
                               
                            </ul>

                            <div class="clearfix"></div>
                            <ul class="carousel-nav">
                                <li>
                                    <a class="c_prev_2" href="#"></a> 
                                </li>
                                <li>
                                    <a class="c_next_2" href="#"></a>
                                </li>
                            </ul>
                        </article><!-- .portfolio-carousel end -->
                    </article><!-- .grid_12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .page-content.parallax start -->
        <section class="page-content parallax parallax-4">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <article class="grid_8">
                        <div class="triggerAnimation animated" data-animate='fadeInDown'>
                            <h1>  <?php echo $homeinfo['home_fsec_title']; ?> </h1>

                             <?php echo htmlspecialchars_decode($homeinfo['home_fsec_content']); ?>

                            <br />

                            
                        </div><!-- .triggerAnimation.animated end -->
                    </article><!-- .grid_8 end -->

                    <article class="grid_4">
                        <div class="triggerAnimation animated" data-animate='fadeInUp'>
                            <img src='assets/user/img/pictures/services-retina.png' alt='iphone'/>
                        </div><!-- .triggerAnimation.animated end -->
                    </article><!-- .grid_4 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content.parallax end -->

        <!-- .page-content end -->
        
        <section class="page-content">
 <div class="container">
            <!-- .container start -->
                <!-- .row start -->
                <div class="row">
                    <!-- .grid_12 start -->
                    <article class="grid_12">
                        <section class="heading-centered triggerAnimation animated" data-animate="bounceIn">
                            <h2><b>Testimonials</b></h2>
                         
                        </section>                                                                     
                    </article><!-- .grid_12 end -->
            </div><!-- .row end -->

                <!-- .row start -->
            <div class="row"><!-- .GRID_4 END -->

                    <div class="grid_12">
                        <div class="triggerAnimation animated" data-animate="fadeInDown">
                            <ul id="testimonial-carousel-2" class="carousel-li">
                              <?php
							  foreach($reviewlist as $reviewlistdata)
							  {
							  ?>
                                <li class="testimonial">
                                    <div class="testimonial-text">
                                        <?php echo htmlspecialchars_decode($reviewlistdata['review_content']); ?>
                                    </div>

                                    <div class="testimonial-author clearfix">
                                        <div class="testimonial-image-container">
                                            <img src="<?php echo BASE_URI.'uploads/'.$reviewlistdata['review_image']; ?>" alt="testimonial image"/>
                                        </div>

                                        <h6 class="testimonial-author-name"><?php echo $reviewlistdata['review_user']; ?>,</h6>
                                        <span class="testimonial-author-company"><?php echo $reviewlistdata['review_occupation']; ?></span>
                                    </div>
                                </li>
                             <?php
							  }
							  ?>
                                
                            </ul>
                        </div><!-- .triggerAnimation.animated end -->
              </div><!-- .grid_8 end -->
                </div><!-- .row end -->

               </div>
            </div><!-- .container end -->
        </section>

        <!-- .footer-wrapper start -->
       <?php include('include/footer.php'); ?>
       <!-- .footer-wrapper end -->

      
       
    </body>
</html>

