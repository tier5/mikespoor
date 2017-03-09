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
       <style>
	   .subbtn
	   {
		   border: 0px solid;
    font: 12px 'Open Sans', Arial, sans-serif;
    text-transform: uppercase;
    line-height: 11px;
    color: #fff;
    background-color: #333;
    padding: 10px 17px;
    cursor: pointer;
    float: right;
    -webkit-transition: all 0.2s ease 0s;
    -moz-transition: all 0.2s ease 0s;
    -o-transition: all 0.2s ease 0s;
    -ms-transition: all 0.2s ease 0s;
    transition: all 0.2s ease 0s;
	   }
	   </style>
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
        <section id="page-title" class="page-title-5" style="background: url('<?php echo BASE_URI;?>assets/images/banner/thumb/<?php echo $banner['banner_image'];?>') center center; background-size: cover;">
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
                <!-- .row start --><!-- .row end -->

                <!-- .row start -->
                <div class="row">
                    <!-- .grid_6 start -->
                    <article class="grid_6">
                        <div class="triggerAnimation animated" data-animate="fadeInLeft">
                            <section class="heading-bordered">
                                <h3><?php 
							echo $contactinfo['cms_title'];
							?></h3>
                            </section><!-- .heading-bordered end -->

                            <?php 
							echo htmlspecialchars_decode($contactinfo['cms_content']);
							?>

                            <br /><br />

                            <ul class="contact-info-list">
                                <li>
                                    <p>
                                        <i class="flaticon-envelope4"></i>
                                        <span class="strong">By Email : </span>
                                    <a href="mailto:<?php echo $companyinfo['contact_email']; ?>"><?php echo $companyinfo['contact_email']; ?></a></p>
                                </li>

                                <li>
                                    <p>
                                        <i class="flaticon-telephone66"></i>
                                        <span class="strong">Phone : </span>
                                    <a href="tel:<?php echo $companyinfo['contact_no1']; ?>"><?php echo $companyinfo['contact_no1']; ?></a> / <a href="tel:<?php echo $companyinfo['contact_no2']; ?>"><?php echo $companyinfo['contact_no2']; ?></a></p>
                                </li>

                                <li>
                                    <p>
                                        <i class="flaticon-envelope4"></i>
                                        <span class="strong">Address : </span>
                                    <a><?php echo $companyinfo['company_address']; ?></a></p>
                                </li>
                            </ul>
                        </div><!-- .animated .fadeInRight -->
                    </article><!-- .grid_6 end -->

                    <!-- .grid_6 start -->
                    <article class="grid_6">
                        <div class="triggerAnimation animated" data-animate="fadeInRight">
                            <section class="heading-bordered">
                                <h3>Send us a message</h3>
                            </section><!-- .heading-bordered end -->

                            <!-- wpcf7 start -->
                            <form action="<?php echo BASE_URI.'contact/sendmail'; ?>" method="post" class="wpcf7">
                                <fieldset>
                                    <label><span class="text-color">*</span> Name:</label>
                                    <input name="txtName" type="text" class="wpcf7-text" id="contact-name" required/>
                                </fieldset>

                                <fieldset>
                                    <label><span class="text-color">*</span> Email:</label>
                                    <input name="txtEmail" type="email" id="contact-email" class="wpcf7-text" required/>
                                </fieldset>

                                <fieldset>
                                    <label><span class="text-color">*</span> Message:</label>
                                    <textarea name="txtComment" rows="5" class="wpcf7-textarea" id="contact-message" required></textarea>
                                </fieldset>

                                <input type="submit" class="subbtn" value="Submit" />

                            </form><!-- wpcf7 end -->
                        </div><!-- .animated.fadeInRight end -->
                    </article><!-- .grid_6 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .footer-wrapper start -->
         <?php include('include/footer.php'); ?><!-- .footer-wrapper end -->

        <!-- scripts -->
        <script  src="assets/user/js/jquery-1.9.1.js"></script> <!-- jQuery library -->  
        <script  src="assets/user/js/jquery-migrate-1.2.1.min.js"></script> <!-- jQuery migrate -->
        <script  src="assets/user/js/jquery.placeholder.min.js"></script><!-- jQuery placeholder fix for old browsers -->
        <script  src="http://maps.google.com/maps/api/js?sensor=true"></script> <!-- google maps -->
        <script  src="assets/user/js/jquery.ui.map.full.min.js"></script> <!-- jquery plugin for google maps -->
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

                // GOOGLE MAPS START
                $(function() {
                    //google maps

                    var yourStartLatLng = new google.maps.LatLng(40.74843, -73.985655);
                    $('.map_canvas').gmap({'center': yourStartLatLng, 'zoom': 13, 'disableDefaultUI': true, 'callback': function() {
                            var self = this;
                            self.addMarker({'position': this.get('map').getCenter()});
                        }});
                }); // GOOGLE MAPS END

                // CONTACT FORM AJAX SUBMIT START
                $('.wpcf7 .wpcf7-submit').on('click', function(event) {
                    event.preventDefault();
                    var name = $('#contact-name').val();
                    var email = $('#contact-email').val();
                    var message = $('#contact-message').val();
                    var form_data = new Array({'Name': name, 'Email': email, 'Message': message});
                    $.ajax({
                        type: 'POST',
                        url: "contact.php",
                        data: ({'action': 'contact', 'form_data': form_data})
                    }).done(function(data) {
                        alert(data);
                    });
                }); // CONTACT FORM AJAX SUBMIT END
            });

            /* ]]> */
        </script>
    </body>
</html>
