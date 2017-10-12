 <section class="footer-wrapper" style="background-color:<?php echo $theme_color['color']; ?> ">
            <!-- .footer start -->
            <footer id="footer">
                <!-- .container start -->
                <div class="container">
                    <!-- .row start -->
                    <div class="row">

                        <!-- animated fadeInTop -->
                        <section class="triggerAnimation animated" data-animate="fadeIn">

                            <!-- .footer-widget-container start -->
                            <div class="grid_4 footer-widget-container footer-menu">
                                <h6 style="color:<?php echo $font_color['color']; ?> !important;">Menu</h6>
                                <ul>
                                    <li><a href="<?php echo BASE_URI; ?>" class="footer" style="color:<?php echo $font_color['color']; ?> !important;">HOME</a></li>
                                    <li><a href="<?php echo BASE_URI; ?>about-us" class="footer" style="color:<?php echo $font_color['color']; ?> !important;">ABOUT MIKE</a></li>
                                    <li><a href="<?php echo BASE_URI; ?>picture-gallery" class="footer" style="color:<?php echo $font_color['color']; ?>!important;">PICTURE GALLERY</a></li>
                                    <li><a href="<?php echo BASE_URI; ?>video-gallery" class="footer" style="color:<?php echo $font_color['color']; ?> !important;">VIDEO GALLERY</a></li>
                                    <li><a href="<?php echo BASE_URI; ?>links-news" class="footer" style="color:<?php echo $font_color['color']; ?> !important;">LINKS & NEWS</a></li>
                                    <li><a href="<?php echo BASE_URI; ?>school-visit" class="footer" style="color:<?php echo $font_color['color']; ?> !important;">SCHOOL VISIT</a></li>
                                    <li><a href="<?php echo BASE_URI; ?>contact" class="footer" style="color:<?php echo $font_color['color']; ?> !important;">CONTACT</a></li>
                                </ul>
                            </div><!-- .footer-widget-container end -->

                            <!-- .footer-widget-container start -->
                            <div class="grid_4 footer-widget-container" >
                                <h6 style="color:<?php echo $font_color['color']; ?> !important;">follow us</h6>
                               <!--  <p style="color:<?php echo $font_color['color']; ?> !important;" >Keep up to date with Mike Spoor Illustrations</p> -->
                                <!--- .social-links start -->



                                <div class="social-btns">
                                    <a target="_blank" class="btn facebook" href="<?php echo $companyinfo['facebook_link']; ?>"><i class="fa fa-facebook"></i></a>
                                    <a target="_blank" class="btn instagram" href="<?php echo $companyinfo['instagram_link']; ?>" class="fa fa-instagram"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a target="_blank" class="btn flickr" href="<?php echo $companyinfo['flicker_link']; ?>" class="fa fa-flickr"> <i class="fa fa-flickr" aria-hidden="true"></i></a>
                                     <a target="_blank" class="btn linkedin" href="<?php echo $companyinfo['linkdin_link']; ?>" class="fa fa-linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a target="_blank" class="btn google" href="<?php echo $companyinfo['youtube_link']; ?>" class="fa fa-google">
                                    <i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                                    <a target="_blank" class="btn skype" href="<?php echo $companyinfo['skype_link']; ?>" class="fa fa-skype">
                                    <i class="fa fa-skype" aria-hidden="true"></i></a>
                                </div>



                                <h6 style="color:<?php echo $font_color['color']; ?> !important;">Newsletter</h6>

                                <div class="newsletter">
                                    <span id="subscribe-msg" style="color:red"></span>
                                     <div class="form-group">   
                                     <input type="email" id="subscribe" name="subscribe" required="required">
                                     <input type="submit" value="Subscribe" class="Subscriber">
                                     </div>   
                                

                                </div>
                            


                               <!--  <ul class="social-links">
                                    <li>
                                        <a target="_blank" href="<?php echo $companyinfo['twitter_link']; ?>" class="flaticon-twitter16" ></a>
                                    </li>

                                    <li>
                                        <a target="_blank" href="<?php echo $companyinfo['facebook_link']; ?>" class="flaticon-facebook25" ></a>
                                    </li>

                                    <li>
                                        <a target="_blank" href="<?php echo $companyinfo['youtube_link']; ?>" class="flaticon-youtube15" ></a>
                                    </li>

                            </div><!-- .footer-widget-container end -->
                          </div>
                            <!-- .footer-widget-container start -->
                            <div class="grid_4 footer-widget-container">
                            <h6 style="color:<?php echo $font_color['color']; ?> !important;">Contact info</h6>
                                <!-- .widget.widget_text start -->
                                <li class="widget widget_text">
                                    <ul class="contact-info-list">
                                        <li>
                                            <p style="color:<?php echo $font_color['color']; ?> !important;">
                                                <!-- <i class="flaticon-building8"></i> -->
                                                <span class="strong" >Address:</span>
                                                <?php echo $companyinfo['company_address']; ?>
                                            </p>
                                        </li>

                                        <li>
                                            <p style="color:<?php echo $font_color['color']; ?> !important;">
                                                <!-- <i class="flaticon-telephone66"></i> -->
                                                <span class="strong">Telephone:</span>
                                                <a href="tel:01234567890" class="cont-info"><?php echo $companyinfo['contact_no2']; ?></a>
                                            </p>
                                        </li>
                                        <!-- <li>
                                            <p style="color:<?php echo $font_color['color']; ?> !important;">
                                                
                                                <a class="underlined" href="<?php echo BASE_URI; ?>contact" style="color:<?php echo $font_color['color']; ?> !important;">FIND MORE ABOUT US</a>
                                                <i class="flaticon-arrow465"></i>
                                            </p>
                                        </li> -->
                                        <li>
                                            <p style="color:<?php echo $font_color['color']; ?> !important;">
                                                <span class="strong" style="display: block;">Powered by :</span>
                                                <a href="https://tier5.us" target="_blank"><img src="<?php echo BASE_URI; ?>assets/user/img/logotr5.png" class="tr5logo" alt="tier5logo"></a>
                                            </p>
                                        </li>
                                    </ul>

                                    
                                </li><!-- .widget.widget_text end -->
                            </div>
                        </section>
                    </div><!-- .row end -->
                </div><!-- .container end -->                
            </footer><!-- .footer-end -->

            <!-- .copyright-container start -->
            <div class="copyright-container">
                <!-- .container start -->
                <div class="container">
                    <!-- .row start -->
                    <div class="row">
                        <section class="grid_12">
                            <p><?php echo $companyinfo['footer_message']; ?></p>
                        </section>
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div><!-- .copyright-container end -->

            <a href="#" class="scroll-up">Scroll</a>
        </section>
    <script src="<?php echo BASE_URI; ?>assets/user/js/js/jquery.flexslider-min.js" type="text/javascript"></script>
    
    <script src="<?php echo BASE_URI; ?>assets/user/js/js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
    
    <script src="<?php echo BASE_URI; ?>assets/user/js/js/mynewscript.js" type="text/javascript"></script>
        <script>
            /* <![CDATA[ */
            $(document).ready(function() {
                $('.Subscriber').click(function(){
                    var subscriber=$('#subscribe').val();
                    if(subscriber){
                        if(validateEmail(subscriber)){
                            
                            $.ajax({
                                url: 'links_news/subscribe',
                                type: "post",
                                data:{subscribe:subscriber},
                                success: function(data){
                                    $("#subscribe-msg").text(data).delay(10000).fadeOut();
                                }
                            });
                        }else{
                            $("#subscribe-msg").text('This Is Not A Valied Email!').delay(10000).fadeOut();
                        }
                    }
                });
                // 'use strict';

                // PRETTYPHOTO LIGHTBOX START
                // if(jQuery().prettyPhoto) {
                //     piPrettyphoto(); 
                // }
    
                // function piPrettyphoto(){
                //     $("a[data-gal^='prettyPhoto']").prettyPhoto({
                //         social_tools: false,
                //         hook: 'data-gal'
                //     });
                // }  

               
                // $('.sharre-facebook').sharrre({
                //     share: {
                //         facebook: true
                //     },
                //     enableHover: false,
                //     enableTracking: true,
                //     click: function(api, options) {
                //         api.simulateClick();
                //         api.openPopup('facebook');
                //     }
                // });

                $('.dl-trigger').click(function(){
                    $('.dl-menu').toggleClass("dl-menuopen");
                });

            });
            function validateEmail(email) {
                    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email);
            }
            /* ]]> */
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#gallery").unitegallery();
            });
        </script>