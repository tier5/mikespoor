<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
        <script>
            jQuery(document).ready(function($) {
                //slick js library for home page caraousel initialization
                $('.background').slick();
                $('.foreground').slick();
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
        </script>
    </head>

    <body>
        <?php include('include/header.php');?>
        <!--Slider background image start-->
        <!-- check for bg const -->
        <div class="top-banner">
            <?php if (count($filtered_arr)) { ?>
                <section class="center slider background" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": false, "autoplaySpeed" : 0, "arrows": false, "fade" : true}'>
                    <div>
                        <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$filtered_arr['banner_image']; ?>" alt="slidebg3" class="img-responsive"/>
                    </div>
                </section>
            <?php } else {?>
                <section class="center slider background" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": true, "autoplaySpeed" : <?php echo $bannerlist[0]['background_image_transition']*10;?>, "arrows": true, "fade" : true}'>
                    <?php if (count($bannerlist)) { ?>
                        <?php foreach ($bannerlist as $key=>$bannerlistdata) { ?>
                            <div>
                                <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$bannerlistdata['banner_image']; ?>" alt="slidebg3" class="img-responsive"/>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </section>
            <?php } ?>
            <!--Slider background image end-->
            <!--Slider foreground image start-->
            <?php if (count($filtered_arr_fg)) { ?>
                <section class="center slider foreground" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": false, "autoplaySpeed" : 0, "arrows": false, "fade" : true}'>
                    <div>
                        <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$filtered_arr_fg['banner_front_image'];; ?>" alt="slidebg3"/>
                    </div>
                </section>
            <?php } else {?>
                <section class="center slider foreground" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": true, "autoplaySpeed" : <?php echo $bannerlist[0]['foreground_image_transition']*10;?>, "dots": true, "fade" : true}'>
                    <?php if (count($bannerlist)) { ?>
                        <?php foreach ($bannerlist as $key=>$bannerlistdata) { ?>
                            <?php if (array_key_exists('banner_front_image', $bannerlistdata) && $bannerlistdata['banner_front_image']!='') { ?>
                                <div>
                                    <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$bannerlistdata['banner_front_image']; ?>" alt='mobile devices'/>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </section>
            <?php } ?>
            <!--Slider foreground image end-->
        </div>
        <!-- .page-content start -->
        <section class="page-content background-black" style="background:<?php echo $theme_color['color']; ?>">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <article class="grid_12">
                        <div class="triggerAnimation animated" data-animate="fadeInUp">
                            <div class="note no-bottom-margin">
                                <h4 style="color:<?php echo $font_color['color']; ?> !important;" ><?php echo $welcome_title['title']; ?></h4>
                                
                            </div>
                        </div><!-- .triggerAnimation.animated end -->
                    </article><!-- .grid_12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .page-content start -->
        <section class="page-content parallax parallax-1" style="background: url(<?php echo BASE_URI;?>uploads/home_page/home_background/<?php echo $welcome_banner['background_image']; ?> );
    background-size: cover;">
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
                            <?php $feature_info=count($featurelist);?>
                            <div class="clearfix"></div>
                            <ul class="carousel-nav" style="display:<?php if($feature_info < 4){ echo "none"; }?>">
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
                    <article class="grid_3 hidden-xs">
                    </article>
                    <article class="grid_6">
                        <section class="heading-bordered">
                            <h3>What we <b>Offer</b></h3>
                        </section>
                    </article>
                    <article class="grid_3 hidden-xs">
                        <section class="heading-bordered">
                            <h3>My <b>stats</b></h3>
                        </section>
                    </article>
                </div>
                <div class="row">
                    <article class="grid_9">
                        <div class="triggerAnimation animated" data-animate="fadeInLeft">
                            <ul class="services-overview">
                            <?php foreach ($offer_list as $offer ) { ?>
                                <li>
                                    <?php if (isset($offer['home_offer_logo']) && strlen(trim($offer['home_offer_logo']))) { ?>
                                        <img class="triggerAnimation animated" src="uploads/home_page/offer/<?= $offer['home_offer_logo'] ?>" alt="ceo" data-animate="fadeInLeft"/>
                                    <?php } else { ?>
                                        <img class="triggerAnimation animated" alt="ceo" data-animate="fadeInLeft"/>
                                    <?php } ?>
                                    <div class="overview-txt">
                                        <h5><?php echo $offer['home_offer_title']; ?> </h5>
                                        <?php echo htmlspecialchars_decode($offer['home_offer_content']); ?>
                                    </div>
                                </li>
                            <?php  } ?>
                            </ul>
                        </div><!-- .triggeranimation.animated end -->
                    </article><!-- .grid_6 -->

                    <article class='grid_3' >
                        <section class="heading-bordered hidden-sm hidden-lg">
                            <h3>My <b>stats</b></h3>
                        </section>
                        <div class="triggerAnimation animated" data-animate='fadeInRight'>
                            <ul class='numbers-counter' >
                                <?php foreach ($stats_list as $stats) { ?>
                                    <li style="background-color:<?php echo $theme_color['color']; ?>">
                                        <span class='timer number' data-to='<?php echo $stats['home_stats_content']; ?>' data-speed='2000' style="color:<?php echo $font_color['color']; ?>"><?php echo $stats['home_stats_content']; ?></span>
                                        <p style="color:<?php echo $font_color['color']; ?>"><?php echo $stats['home_stats_title']; ?></p>
                                    </li >
                               <?php  } ?>

                            </ul>
                        </div><!-- .triggerAnimation.animated end -->
                    </article><!-- .grid_3 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .page-content.parallax start -->
        <section class="page-content parallax parallax-2" <?php if (isset($current_info_banner['background_image']) && strlen(trim($current_info_banner['background_image']))) { ?> style="background: url(<?php echo BASE_URI;?>uploads/home_page/home_background/<?php echo $current_info_banner['background_image']; ?> <?php } ?> );
    background-size: cover;">
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
                     <?php $count_info=count($current_info);?>
                    <?php foreach ($current_info as $info) { ?>
                    <article class="<?php if($count_info=='1'){ echo 'grid_12';} elseif($count_info=='2'){ echo 'grid_6';} else{echo 'grid_4';}?>">
                        <div class="triggerAnimation animated" data-animate="fadeInLeft">
                            <section class="process-box">
                                <div class="img-container">
                                    <img src="<?= isset($info['current_info_logo']) && strlen(trim($info['current_info_logo'])) ? BASE_URI.'uploads/home_page/current_info/'.$info['current_info_logo'] : BASE_URI."assets/images/no-image.png" ?>" alt="creative thinking"/>
                                </div>

                                <h5><?php echo htmlspecialchars_decode($info['current_info_title']); ?> </h5>
                                <?php echo htmlspecialchars_decode($info['current_info_content']); ?>
                            </section>
                        </div>
                    </article>
                    <?php } ?>
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
                   <?php $gallery_info=count($gallerylist);?>
                    <article class="grid_12">
                        <article class="portfolio-carousel triggerAnimation animated" data-animate="fadeInUp">
                            <ul id="portfolio-carousel" class="carousel-li">
                            <?php
                            $gallerylistcount=count($gallerylist);
							foreach($gallerylist as $gallerylistdata)
							{
							?>
                                <li class="isotope-item"  >

                                    <figure class="portfolio-img-container">
                                        <div class="portfolio-img">

                                            <img src="<?php echo BASE_URI.'uploads/picture/thumb/'.$gallerylistdata['gpicture_image']; ?>" alt="portfolio image"/>


                                            <!-- <div class="portfolio-img-hover">
                                                <div class="mask"></div>

                                                <ul>
                                                    <li class="portfolio-zoom">
                                                        
                                                    </li>

                                                    <li class="portfolio-single">
                                                        
                                                    </li>
                                                </ul>
                                            </div> --><!-- .portfolio-img-hover end -->

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
                            <ul class="carousel-nav" style="display:<?php if($gallerylistcount < 4){ echo "none"; }?>">
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
        <!-- <section class="page-content parallax parallax-4">
            
            <div class="container">
               
                <div class="row">
                    <article class="grid_8">
                        <div class="triggerAnimation animated" data-animate='fadeInDown'>
                            <h1>  <?php echo $homeinfo['home_fsec_title']; ?> </h1>

                             <?php echo htmlspecialchars_decode($homeinfo['home_fsec_content']); ?>

                            <br />

                            
                        </div>
                    </article>

                    <article class="grid_4">
                        <div class="triggerAnimation animated" data-animate='fadeInUp'>
                            <img src='assets/user/img/pictures/services-retina.png' alt='iphone'/>
                        </div>
                    </article>
                </div>
            </div>
        </section> --><!-- .page-content.parallax end -->

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
                                            <img src="<?= isset($reviewlistdata['review_image']) && strlen(trim($reviewlistdata['review_image'])) ? BASE_URI.'uploads/'.$reviewlistdata['review_image'] : BASE_URI."assets/images/no-image.png" ?>" alt="testimonial image"/>
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

