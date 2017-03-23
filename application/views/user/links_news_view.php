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
       <?php include('include/headerbanner.php'); ?>
       <br><br>
        <!-- .page-content start -->
        <section class="page-content">

            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                
                    <?php foreach ($all_link as $link ) { ?>
                    <div class="row">
                        <div class="col-md-12">
                           <section class="heading-bordered">
                                <h3><?php echo $link['link_name'];?></h3>
                            </section>
                        </div>
                        <article class="grid_4">
                           <div class="triggerAnimation animated" data-animate='fadeInLeft'>
                            <img src='<?php echo BASE_URI;?>uploads/link_news/<?php echo $link["link_logo"];?>' alt='Link Logo'/>
                        </div>
                        </article>

                        <article class="grid_8">
                           
                        <div class="triggerAnimation animated" data-animate='fadeInRight'>
                          
                           
                            <?php echo htmlspecialchars_decode($link['link_content']); ?>

                            
                        </div>
                        </article>
                         </div>
                    <?php } ?>
                   
                <!-- .row start --><!-- .row end -->
           <!-- .container end -->
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
