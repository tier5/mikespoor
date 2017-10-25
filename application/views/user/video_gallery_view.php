<!DOCTYPE html>
<html>
    <head>
        <?php include('include/headsection.php'); ?>
        <link href="http://vjs.zencdn.net/6.2.7/video-js.css" rel="stylesheet">
        <style>
            .vjs-icon-placeholder {
                top: 10px;
            }
        </style>
        <!--[if lt IE 9]>
            <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- style switcher start --><!-- style switcher end -->
        <!-- .header-wrapper start -->
        <?php include('include/header.php'); ?><!-- .header-wrapper end -->
		<!-- HOME -->
        <?php include('include/headerbanner.php'); ?>
        <!-- #page-title start -->
        <br/>

        <!-- .page-content start -->
        <section class="page-content">
            <!-- .container start -->
            <div class="container">
                <!-- .row.portfolio-items-holder start -->
                <div class="row portfolio-items-holder" data-animate="fadeInUp">
                    <!-- #portfolioitems.isotope start -->
                    <ul id="portfolioitems" class="isotope">
                        <?php foreach($gallerylist as $gallerylistdata)  {?>
                        <li class="grid_4 isotope-item photography">
                            <?php /*?><iframe width="100%" height="100%" src="https://www.youtube.com/embed/Ctugo5EJuns" frameborder="0" allowfullscreen></iframe><?php */?>
                            <figure class="portfolio-img-container">
                                <div class="portfolio-img" style="margin-bottom: 30px;">
                                <?php if(isset($gallerylistdata['gvideo_url']) && ($gallerylistdata['video_type']=='1') ){ ?>
                                    <?php $url=(explode("?v=",$gallerylistdata['gvideo_url']));  ?>
                                        <iframe width="100%" height="260" src="https://www.youtube.com/embed/<?php echo $url[1]; ?>" frameborder="0" allowfullscreen></iframe>
                                    <?php } ?>

                                    <?php if(isset($gallerylistdata['gvideo_url']) && ($gallerylistdata['video_type']=='2') ){ ?>
                                        <?php  $ext=substr($gallerylistdata['gvideo_url'], strrpos($gallerylistdata['gvideo_url'], '.') + 1);?>
                                        <video id="my-video" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="" height="260" data-setup="" style="width: 100%">
                                            <source src="<?= BASE_URI ?>uploads/video/<?= $gallerylistdata['gvideo_url'];?>" type='video/<?php echo $ext; ?>'>
                                            <p class="vjs-no-js">
                                              To view this video please enable JavaScript, and consider upgrading to a web browser that
                                              <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                            </p>
                                        </video>

                                    <?php } ?>
                                </div>
                                <figcaption>
                                    <?php  echo $gallerylistdata['gvideo_title'];?>                                    
                                </figcaption>
                            </figure>
                        </li><!-- .grid_4.isotope-item.design end -->
                        <?php } ?>
                    </ul><!-- #portfolioitems.isotope end -->
                </div><!-- .row.portfolio-items-holder start -->

                <!-- .roe start -->
                <div class="row">
                    <div class="grid_12 pagination">
                        <?php if($totalrec!=0) { ?>
                            <!--pagination class-->
                            <div class="page_no_area">
                                <?php include ("include/pagination.php");
                                $total_records = $totalrec;
                                $page_req=ceil($total_records / 6);
                                $page = 1;
                                $size = 6;
                                if ($nowpage){
                                	$start = ($nowpage - 1) * 6;
                                    $page = (int) $nowpage;
                                } else{
                                	$start=0;
                                }
                                $pagination = new Pagination();
                                $linkto = BASE_URI."video-gallery/page/%s";
                                $pagination->setLink($linkto);
                                $pagination->setPage($page);
                                $pagination->setSize($size);
                                $pagination->setTotalRecords($total_records);
                                ?>
                                <?php
                                		  $navigation = $pagination->create_links();
                                		  echo $navigation; // will draw our page navigation
                                ?>
                            </div>
                        <?php } ?>
                    </div><!-- .grid_12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .footer-wrapper start -->
         <?php include('include/footer.php'); ?><!-- .footer-wrapper end -->
        <script src="http://vjs.zencdn.net/6.2.7/video.js"></script>
    </body>
</html>
