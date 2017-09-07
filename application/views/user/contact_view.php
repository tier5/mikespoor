<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
        
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
       .custom-alert-success {
            background: #98FB98;
            border: 1px solid #98FB98;
            font-size: 15px;
            padding-left: 10px;
            text-align: center;
            border-radius: 5px;
            padding-right: 6px;
            color: black;
       }
       .custom-alert-danger {
            background: #d9534f;
            color: #fff;
            border: 1px solid #d9534f;
            font-weight: bold;
            font-size: 15px;
            padding-left: 10px;
            text-align: center;
            border-radius: 5px;
            padding-right: 6px;
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
        <?php include('include/headerbanner.php'); ?>
          <br><br>
        <!-- .page-content start -->
        <section class="page-content">
            <!-- .container start -->
            <div class="container">
                <!-- .row start --><!-- .row end -->
                <!-- .row start -->
                <div class="row">
                    <article class="grid_6">
                        
                    </article>
                    <article class="grid_6">
                        <?php
                            if (isset($_SESSION['successmsg']) && !empty($_SESSION['successmsg'])) {
                                echo "<div class='custom-alert-success triggerAnimation animated' data-animate='fadeInLeft'>".$_SESSION['successmsg']."<div>";
                                unset($_SESSION['successmsg']);

                            } 
                            if (isset($_SESSION['errormsg']) && !empty($_SESSION['errormsg'])) {
                                echo "<div class='custom-alert-danger triggerAnimation animated' data-animate='fadeInLeft'>".$_SESSION['errormsg']."<div>";
                                unset($_SESSION['errormsg']);
                            } 
                        ?>
                    </article>
                </div>
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

      
        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function($) {
                'use strict';

                // GOOGLE MAPS START
                $(function() {
                    //google maps

                   /* var yourStartLatLng = new google.maps.LatLng(40.74843, -73.985655);
                    $('.map_canvas').gmap({'center': yourStartLatLng, 'zoom': 13, 'disableDefaultUI': true, 'callback': function() {
                            var self = this;
                            self.addMarker({'position': this.get('map').getCenter()});
                        }});*/
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
