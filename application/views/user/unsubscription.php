<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
    </head>
    <body>
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
                <div>
                    <span id="unsubscribe-msg"></span>
                    <input type="text" id="unsubscribe" name="unsubscribe" value="<?php if(isset($subscriber['subscriber_email']) || $subscriber['subscriber_email']){ echo $subscriber['subscriber_email'];}?>">
                    <input type="button" value="Unsubscribe" class="unsubscription">
                </div>    
            </div>       
            <!-- .row start --><!-- .row end -->
           <!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .footer-wrapper start -->
        <?php include('include/footer.php'); ?><!-- .footer-wrapper end -->
        <script>

            $(document).ready(function() {

                $('.unsubscription').click(function(){
        
                    var subscriber=$('#unsubscribe').val().trim();
                    if(subscriber){
                        $.ajax({
                            url: 'links_news/removesub',
                            type: "post",
                            data:{subscribe:subscriber},
                            success: function(data)
                            {
                               
                               $("#unsubscribe-msg").text(response).delay(10000).fadeOut();
                            }
                            });
                    }
                  
                });
            });









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
