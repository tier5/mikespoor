<?php
	$actual_link = basename($_SERVER["REQUEST_URI"]);

	if(isset($actual_link)){
		$current_page=$actual_link;
	} else {
		$current_page='home';
	}
?>
    <div id="header-wrapper" class="clearfix" >
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
                </ul>

                <ul class="social-links">
                    <li>
                        <a target="_blank" href="<?php echo $companyinfo['twitter_link']; ?>"  class="flaticon-twitter16"></a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo $companyinfo['facebook_link']; ?>" class="flaticon-facebook25" ></a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo $companyinfo['youtube_link']; ?>" class="flaticon-youtube15" ></a>
                    </li>
                </ul>
            </div>
        </section>
        <header id="header" class="clearfix">
            <section id="logo">
                <a href="<?php echo BASE_URI; ?>">
                    <img src="<?php echo BASE_URI.'uploads/'.$companyinfo['company_logo']; ?>" title="<?php echo $companyinfo['company_name']; ?>" alt="company logo"/>
                </a>
            </section>

            <section id="nav-container">
                <nav id="nav">
                    <ul>
                        <li><a href="<?php echo BASE_URI; ?>">HOME </a></li>
                        <li <?php if($current_page == 'about-us' ) { ?>class="current-menu-item"<?php } ?>><a href="<?php echo BASE_URI; ?>about-us">ABOUT MIKE</a></li>
                        <li <?php if($current_page == 'picture-gallery' || check_page('picture-gallery/page') >0 ) { ?>class="current-menu-item"<?php } ?>><a href="<?php echo BASE_URI; ?>picture-gallery">PICTURE GALLERY</a></li>
                        <li <?php if($current_page == 'video-gallery' || check_page('video-gallery/page') >0 ) { ?>class="current-menu-item"<?php } ?>> <a href="<?php echo BASE_URI; ?>video-gallery">VIDEO GALLERY</a> </li>
                        <li <?php if($current_page == 'links-news') { ?>class="current-menu-item"<?php } ?>> <a href="<?php echo BASE_URI; ?>links-news">LINKS & NEWS</a></li>
                        <li <?php if($current_page == 'school-visit' || check_page('school-visit/page') >0 || check_page('school-visit/category') >0) { ?>class="current-menu-item"<?php } ?>><a href="<?php echo BASE_URI; ?>school-visit">SCHOOL VISIT</a></li>
                        <li <?php if($current_page == 'contact') { ?>class="current-menu-item"<?php } ?> class="no-sub"> <a href="<?php echo BASE_URI; ?>contact">CONTACT</a></li>
                    </ul>
                </nav>                 
            </section>

            <div class='dl-menuwrapper'>
                <button class="dl-trigger">Open Menu</button>
                <ul class="dl-menu">
                    <li><a href="<?php echo BASE_URI; ?>">HOME</a></li>
                    <li><a href="<?php echo BASE_URI; ?>about-us">ABOUT MIKE</a> </li>
                    <li><a href="<?php echo BASE_URI; ?>picture-gallery">PICTURE GALLERY</a></li>
                    <li><a href="<?php echo BASE_URI; ?>video-gallery">VIDEO GALLERY</a></li>
                    <li><a href="<?php echo BASE_URI; ?>links-news">LINKS & NEWS</a></li>
                    <li><a href="<?php echo BASE_URI; ?>school-visit">SCHOOL VISIT</a> </li>
                    <li> <a href="<?php echo BASE_URI; ?>contact">CONTACT</a></li>
                </ul>
            </div>   
        </header>              
    </div>

