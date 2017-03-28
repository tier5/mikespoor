<?php
	  
	 $actual_link = basename($_SERVER["REQUEST_URI"]);
	 //$acarr=explode("backend/",$actual_link);
	 
	 if(isset($actual_link))
	 {
		 $current_page=$actual_link;
		
	 }
	 else
	 {
		  $current_page='home';
	 }
	
	 //echo "<h1>".$current_page."</h1>";
	 ?>
<div id="header-wrapper" class="clearfix" >
            <!-- .top-bar start -->
            <section id="top-bar-wrapper" style="background-color:<?php echo $theme_color['color']; ?>;">
                <div id="top-bar" class="clearfix">
                    <ul class="contact-info">
                        <li>
                            <i class="flaticon-telephone66" style="color:<?php echo $font_color['color']; ?> !important;"></i>
                            <span><a href="tel:<?php echo $companyinfo['contact_no1']; ?>" style="color:<?php echo $font_color['color']; ?> !important;"><?php echo $companyinfo['contact_no1']; ?></a></span>
                        </li>

                        <li>
                            <i class="flaticon-envelope4" style="color:<?php echo $font_color['color']; ?> !important;"></i>
                            <span><a href="mailto:<?php echo $companyinfo['contact_email']; ?>" style="color:<?php echo $font_color['color']; ?> !important;"><?php echo $companyinfo['contact_email']; ?></a></span>
                        </li>
                    </ul><!-- .contact-info end -->

                    <!--- .social-links start -->
                    <ul class="social-links">
                        <li>
                            <a target="_blank" href="<?php echo $companyinfo['twitter_link']; ?>"  class="flaticon-twitter16">
                                

                            </a>
                        </li>

                        <li>
                            <a target="_blank" href="<?php echo $companyinfo['facebook_link']; ?>" class="flaticon-facebook25" ></a>
                        </li>

                        <li>
                            <a target="_blank" href="<?php echo $companyinfo['youtube_link']; ?>" class="flaticon-youtube15" ></a>
                        </li>

                        <!--<li>
                            <a href="#" class="pixons-skype"></a>
                        </li>-->
                    </ul><!-- .social-links end -->
                </div><!-- .top-bar end -->
            </section><!-- .top-bar-wrapper end -->

            <!-- #header start -->
            <header id="header" class="clearfix">
                <section id="logo">
                    <a href="index.html">
                        <img src="<?php echo BASE_URI.'uploads/'.$companyinfo['company_logo']; ?>" title="<?php echo $companyinfo['company_name']; ?>" alt="company logo"/>
                    </a>
                </section>

                <section id="nav-container">
                    <nav id="nav">
                        <ul>
                            <li>
                                <a href="<?php echo BASE_URI; ?>">HOME</a>
                              
                            </li>

                            <li <?php if($current_page == 'about-us') { ?>class="current-menu-item"<?php } ?>>
                                <a href="<?php echo BASE_URI; ?>about-us">ABOUT MIKE</a>
                               
                            </li>

                            <li <?php if($current_page == 'picture-gallery') { ?>class="current-menu-item"<?php } ?>>
                                <a href="<?php echo BASE_URI; ?>picture-gallery">PICTURE GALLERY</a>
                                <!--<ul>
                                    <li><a href="static_website.html">Static Website</a></li>
                                    <li><a href="#">Dynamic Website</a></li>
                                    <li><a href="#">Ecommerce Website</a></li>
                                    <li><a href="#">App Development</a></li>
                                    <li><a href="#">Print Media</a></li>
                                    <li><a href="#">Hosting</a></li>
                                    <li><a href="#">Other Top Ups</a></li>
                                    
                                </ul>-->
                            </li>
 <li <?php if($current_page == 'video-gallery') { ?>class="current-menu-item"<?php } ?>>
                                <a href="<?php echo BASE_URI; ?>video-gallery">VIDEO GALLERY</a>
                                <!--<ul>
                                    <li><a href="#">Google Local Listing</a></li>
                                    <li><a href="#">SEO</a></li>
                                    <li><a href="#">SMO</a></li>
                                    <li><a href="#">Reputation Management</a></li>
                                    <li><a href="#">Digital Marketing</a></li>
                                   
                                </ul>-->
                            </li>
                            <li <?php if($current_page == 'links-news') { ?>class="current-menu-item"<?php } ?>>
                                <a href="<?php echo BASE_URI; ?>links-news">LINKS & NEWS</a>
                              </li>
                               
                               <li <?php if($current_page == 'school-visit') { ?>class="current-menu-item"<?php } ?>>
                                <a href="<?php echo BASE_URI; ?>school-visit">SCHOOL VISIT</a>
                              </li>
                              
                              
								<li <?php if($current_page == 'contact') { ?>class="current-menu-item"<?php } ?> class="no-sub">
                                <a href="<?php echo BASE_URI; ?>contact">CONTACT</a>
                            </li>
                            <!-- <li class="no-sub">
                                <a href="http://www.a2zonlinesolution.org/demo/mikespoor/">Extras</a>
                            </li> -->
                        </ul>
                    </nav><!-- #nav end -->                  
                </section><!-- #nav-container end -->

                <!-- #dl-menu.dl-menuwrapper start -->
                <div class='dl-menuwrapper'>
                    <button class="dl-trigger">Open Menu</button>
                    <ul class="dl-menu">
                        <li>
                            <a href="<?php echo BASE_URI; ?>">HOME</a>
                        </li>

                        <li>
                            <a href="<?php echo BASE_URI; ?>about-us">ABOUT MIKE</a>
                        </li>

                        <li>
                             <a href="<?php echo BASE_URI; ?>picture-gallery">PICTURE GALLERY</a>
                        </li>

                        <li>
                           <a href="<?php echo BASE_URI; ?>video-gallery">VIDEO GALLERY</a>
                        </li>

                        <li>
                             <a href="<?php echo BASE_URI; ?>links-news">LINKS & NEWS</a>
                        </li>

                        <li>
                            <a href="<?php echo BASE_URI; ?>school-visit">SCHOOL VISIT</a>
                        </li>

                        <li> <a href="<?php echo BASE_URI; ?>contact">CONTACT</a></li>
                    </ul><!-- .dl-menu end -->
                </div><!-- #dl-menu.dl-menuwrapper end -->

                <!-- #search-box start -->
                <!--<section id="search">
                    <form action="#" method="get">
                        <input class="search-submit" type="submit" />
                        <input id="m_search" name="s" type="text" placeholder="Type and hit enter..." />                        
                    </form>
                </section>--><!-- #search-box end -->
            </header>
            <!-- .header end -->        
        </div>

