 <section class="footer-wrapper" style="background-color:<?php echo $companyinfo['theme_color']; ?>;">
            <!-- .footer start -->
            <footer id="footer">
                <!-- .container start -->
                <div class="container">
                    <!-- .row start -->
                    <div class="row">

                        <!-- animated fadeInTop -->
                        <section class="triggerAnimation animated" data-animate="fadeIn">

                            <!-- .footer-widget-container start -->
                            <?php /*?><ul class="grid_3 footer-widget-container">                             
                                <!-- .widget.widget_text start -->
                                <li class="widget widget_text clearfix">
                                    <img src="assets/images/footerlogo.png" style="width" alt="elvyre professional corporate html5 template"/>

                                    <br /> <br />

                                    <p>
                                        Welcome to Elvyre. Fully responsive, clean
                                        multipurpose template. Create amazing
                                        website in minutes. 
                                    </p>

                                    <br /><br />

                                 
                                </li><!-- .widget.widget-text end -->
                            </ul> <?php */?><!-- .footer-widget-container end -->

                            <!-- .footer-widget-container start -->
                            <ul class="grid_9 footer-widget-container">
                                <!-- .widget_tag_cloud start -->
                                <li class="widget widget_tag_cloud">
                                    <h6>tag cloud</h6>

                                    <div class="tagcloud">
                                    <?php
									foreach($picturecatlist as $pclistdata)
									{
									?>
                                        <a href="<?php echo BASE_URI.'school-visit/category/'.$pclistdata['school_visit_slug']; ?>"><?php echo $pclistdata['school_visit_title'] ?></a>
                                        
                                        <?php
									}
									?>
                                    </div>
                                </li><!-- .widget_tag_cloud end -->

                                <!-- .widget_categories start --><!-- .widget_categories end -->
                            </ul><!-- .footer-widget-container end -->

                            <!-- .footer-widget-container start -->
                            <?php /*?><ul class="grid_3 footer-widget-container">

                                <!-- .widget.widget_text start -->
                                <li id="tweet-sroll-wrapper" class="widget clearfix">
                                    <h6>Recent blogs</h6>
                                      <ul class="contact-info-list">
                                      <?php
									  foreach($bloglist as $bloglistdata)
									  {
										 ?>
                                         <li>
                                            <p>
                                             <a href="<?php echo BASE_URI.'school-visit/details/'.$bloglistdata['gschool_visit_blog_slug']; ?>"><?php echo $bloglistdata['gschool_visit_blog_title']; ?>  </a> 
                                            </p>
                                        </li>

                                         <?php 
									  }
									  ?>
                                        
                                        

                                       <!-- <li>
                                            <p>
                                                <i class="flaticon-telephone66"></i>
                                                <span class="strong">Fax: </span>
                                                +41 589 7843
                                            </p>
                                        </li>-->
                                    </ul>
                                    <div class="tweets-list-container"></div>
                                </li><!-- #tweet-sroll-wrapper .widget -->

                            </ul><?php */?><!-- .footer-widget-container end -->

                            <!-- .footer-widget-container start -->
                            <ul class="grid_3 footer-widget-container">

                                <!-- .widget.widget_text start -->
                                <li class="widget widget_text">
                                    <h6>CONTACT INFO</h6>
                                    <ul class="contact-info-list">
                                        <li>
                                            <p>
                                                <!--<i class="icon-home"></i>-->
                                                <span class="strong">Address: </span>
                                                <?php echo $companyinfo['company_address']; ?>
                                            </p>
                                        </li>

                                        <li>
                                            <p>
                                                <i class="flaticon-telephone66"></i>
                                                <span class="strong">Telephone: </span>
                                                <?php echo $companyinfo['contact_no2']; ?>
                                            </p>
                                        </li>

                                       <!-- <li>
                                            <p>
                                                <i class="flaticon-telephone66"></i>
                                                <span class="strong">Fax: </span>
                                                +41 589 7843
                                            </p>
                                        </li>-->
                                    </ul>

                                    <br /><br />

                                    <a class="underlined" href="<?php echo BASE_URI; ?>contact">FIND MORE ABOUT US</a>
                                </li><!-- .widget.widget_text end -->
                            </ul>
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
                        <section class="grid_4">
                            <p>Copyright Mikespoor 2016. All Rights Reserved.</p>
                        </section>

                        <section class="grid_8">
                            <div class="footer-breadcrumbs">
                                <a href="<?php echo BASE_URI; ?>" class="footer">HOME</a>
                                <a href="<?php echo BASE_URI; ?>about-us" class="footer">ABOUT MIKE</a>
                                <a href="<?php echo BASE_URI; ?>picture-gallery" class="footer">PICTURE GALLERY</a>
                                <a href="<?php echo BASE_URI; ?>video-gallery" class="footer">VIDEO GALLERY</a>
                                <a href="<?php echo BASE_URI; ?>links-news" class="footer">LINKS & NEWS</a>
                                
                                <a href="<?php echo BASE_URI; ?>school-visit" class="footer">SCHOOL VISIT</a>
                               
                                <a href="<?php echo BASE_URI; ?>contact" class="footer">CONTACT</a>
                            </div>
                        </section>
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div><!-- .copyright-container end -->

            <a href="#" class="scroll-up">Scroll</a>
        </section>