<?php if($current_page=='about-us'  || $current_page=='school-visit'  || $current_page=='links-news' || check_page('school-visit/page') >0 || check_page('school-visit/category') >0) {?>
    <section class="video-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 no-margin hidden-xs">
                    <?php if($banner[0]['banner_type']=='2'){ ?>
                        <div class="vdo vdo-top">
                            <?php 
                            $url1=explode("?v=",(trim($banner[0]['banner_image'])));
                            $videoname1=$url1[1];
                            $thumbURL1 = 'http://img.youtube.com/vi/'.$videoname1.'/0.jpg'; ?>
                            <img src="<?php echo $thumbURL1 ; ?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname1;?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                            <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>

                    <?php } else{ ?>
                        <div class="vdo vdo-top image-box">
                            <img src="<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[0]['banner_image'];?>">
                        </div>
                    <?php } ?>

                    <?php if($banner[1]['banner_type']=='2'){ ?>}
                    <div class="vdo vdo-bottom">
                        <?php 
                        $url2=explode("?v=",(trim($banner[1]['banner_image'])));
                        $videoname2=$url2[1];
                        $thumbURL2 = 'http://img.youtube.com/vi/'.$videoname2.'/0.jpg'; ?>
                        <img src="<?php echo $thumbURL2 ; ?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname2; ?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                        <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>

                    <?php } else{ ?>
                        <div class="vdo vdo-top image-box">
                            <img src="<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[1]['banner_image'];?>">
                        </div>
                    <?php } ?>
                </div> 
                 <div class="col-md-6 no-margin" style="padding: 5px 0;">
                  <?php if($focus_banner['banner_type']=='2'){ ?>
                     <div class="middle-vdo">
                       <?php 
                            $url=explode("?v=",(trim($focus_banner['banner_image'])));
                            $videoname=$url[1];
                        ?>
                        <iframe class="playerBox" frameborder="0" arginwidth="0" marginheight="0" hspace="0" vspace="0" scrolling="no" allowfullscreen="1" title="YouTube video player" src="https://www.youtube.com/embed/<?php echo $videoname; ?>"></iframe>
                     </div>
                     <?php } else{ ?>
                             <div class="middle-vdo middle-img image-box">
                                <img src="<?php echo BASE_URI;?>/uploads/banner/<?php echo $focus_banner['banner_image'];?>" class="img-responsive" alt="middle-img">
                             </div>
                     <?php } ?>
                </div> 
                <div class="col-md-3 no-margin hidden-xs">
                    <div class="side-vdo">
                        <?php if($banner[2]['banner_type']=='2'){ ?>
                        <div class="vdo vdo-top">
                            <?php 
                            $url3=explode("?v=",(trim($banner[2]['banner_image'])));
                            $videoname3=$url3[1];
                            $thumbURL3 = 'http://img.youtube.com/vi/'.$videoname3.'/0.jpg';
                            ?>
                            <img src="<?php echo $thumbURL2 ; ?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname3; ?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                            <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                        <?php } else{ ?>
                            <div class="vdo vdo-top image-box">
                               <img src="<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[2]['banner_image'];?>" >
                            </div>
                        <?php } ?>

                        <?php if($banner[3]['banner_type']=='2'){ ?>
                        <div class="vdo vdo-bottom">
                            <?php 
                            $url4=explode("?v=",(trim($banner[3]['banner_image'])));
                            $videoname4=$url4[1];
                            $thumbURL4 = 'http://img.youtube.com/vi/'.$videoname4.'/0.jpg';
                        ?>
                            <img src="<?php echo $thumbURL4 ;?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname4; ?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                            <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                        <?php } else { ?>
                            <div class="vdo vdo-bottom image-box">
                                <img src="<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[3]['banner_image'];?>">
                            </div>
                        <?php } ?>
                    </div>
                </div> 
            </div>
        </div>
    </section>
<?php } else if($current_page=='video-gallery' || check_page('video-gallery/page') >0){ ?>
    <section class="video-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 no-margin hidden-xs">
                    <?php if($banner[0]['banner_type']=='2'){ ?>
                    <div class="vdo vdo-top">
                        <?php 
                        $url1=explode("?v=",(trim($banner[0]['banner_image'])));
                        $videoname1=$url1[1];
                        $thumbURL1 = 'http://img.youtube.com/vi/'.$videoname1.'/0.jpg';
                        ?>
                        <img src="<?php echo $thumbURL1 ; ?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname1;?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                        <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <?php } else{ 
                        $ext=substr($banner[0]['banner_image'], strrpos($banner[0]['banner_image'], '.') + 1);?>
                    <div class="vdo vdo-top">
                        <img src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[0]['banner_image'];?>.jpg" class="img-responsive" data-video-src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[0]['banner_image'];?>" data-video-extention="video/<?php echo $ext; ?>">
                        <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <?php } ?>

                    <?php if($banner[1]['banner_type']=='2'){ ?>}
                    <div class="vdo vdo-bottom">
                        <?php 
                        $url2=explode("?v=",(trim($banner[1]['banner_image'])));
                        $videoname2=$url2[1];
                        $thumbURL2 = 'http://img.youtube.com/vi/'.$videoname2.'/0.jpg';?>
                        <img src="<?php echo $thumbURL2 ; ?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname2; ?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                        <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <?php } else{ 
                        $ext=substr($banner[1]['banner_image'], strrpos($banner[1]['banner_image'], '.') + 1); ?>
                    <div class="vdo vdo-bottom">
                        <img src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[1]['banner_image'];?>.jpg" class="img-responsive" data-video-src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[1]['banner_image'];?>" data-video-extention="video/<?php echo $ext; ?>">
                        <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                    </div>
                    <?php } ?>
                </div> 
                <div class="col-md-6 no-margin" style="padding: 5px 0;">
                  <?php if($focus_banner['banner_type']=='2'){ ?>
                     <div class="middle-vdo">
                       <?php 
                            $url=explode("?v=",(trim($focus_banner['banner_image'])));
                            $videoname=$url[1];
                        ?>
                        <iframe class="playerBox" frameborder="0" arginwidth="0" marginheight="0" hspace="0" vspace="0" scrolling="no" allowfullscreen="1" title="YouTube video player" src="https://www.youtube.com/embed/<?php echo $videoname; ?>"></iframe>
                     </div>
                     <?php } else{ 
                         $ext=substr($focus_banner['banner_image'], strrpos($focus_banner['banner_image'], '.') + 1);
                        ?>
                        <div class="middle-vdo">
                            <video id="vjs-video" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="" height="360" data-setup="" style="width:100%">
                                <source src="<?php echo BASE_URI?>uploads/banner/<?php echo $focus_banner['banner_image'];?>" type="video/<?php echo $ext; ?>">
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                            </video>
                        </div>
                     <?php } ?>
                </div> 
                <div class="col-md-3 no-margin hidden-xs">
                    <div class="side-vdo">
                        <?php if($banner[2]['banner_type']=='2'){ ?>
                        <div class="vdo vdo-top">
                            <?php 
                            $url3=explode("?v=",(trim($banner[2]['banner_image'])));
                            $videoname3=$url3[1];
                            $thumbURL3 = 'http://img.youtube.com/vi/'.$videoname3.'/0.jpg';?>
                            <img src="<?php echo $thumbURL2 ; ?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname3; ?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                            <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                        <?php } else {
                            $ext=substr($banner[2]['banner_image'], strrpos($banner[2]['banner_image'], '.') + 1); ?>
                        <div class="vdo vdo-top">
                            <img src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[2]['banner_image'];?>.jpg" class="img-responsive" data-video-src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[2]['banner_image'];?>" data-video-extention="video/<?php echo $ext; ?>">
                            <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                        <?php } ?>
                        <?php if($banner[3]['banner_type']=='2'){ ?>
                        <div class="vdo vdo-bottom">
                            <?php 
                            $url4=explode("?v=",(trim($banner[3]['banner_image'])));
                            $videoname4=$url4[1];
                            $thumbURL4 = 'http://img.youtube.com/vi/'.$videoname4.'/0.jpg';?>
                            <img src="<?php echo $thumbURL4 ;?>" class="img-responsive" data-video-src="https://www.youtube.com/embed/<?php echo $videoname4; ?>?autoplay=1&amp;controls=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;allowfullscreen=true">
                            <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                        <?php } else { 
                            $ext=substr($banner[3]['banner_image'], strrpos($banner[3]['banner_image'], '.') + 1);?>
                        <div class="vdo vdo-bottom">
                            <img src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[3]['banner_image'];?>.jpg" class="img-responsive" data-video-src="<?php echo BASE_URI?>uploads/banner/<?php echo $banner[3]['banner_image'];?>" data-video-extention="video/<?php echo $ext; ?>">
                            <a href="#" class="vdo-start"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </div>
                        <?php } ?>
                     </div>
                </div> 
            </div>
        </div>
    </section>
<?php }else { ?>
<?php if((isset($banner['banner_type']) && ($banner['banner_type']=='1') && (isset($banner['banner_image'])))){  ?>
    <section id="page-title" class="page-title-1" style="background: url('<?php echo BASE_URI;?>assets/images/banner/thumb/<?php echo $banner['banner_image'];?>') center center; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="breadcrumbs triggerAnimation animated" data-animate="fadeInUp">
                        
                    </div>
                </div><!-- .grid_8 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- #page-title end -->
<?php } } ?>

<style type="text/css">
    video { 
      object-fit: fill;
    }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $('.vdo-start').click(function(){
            var vdoSrc = $(this).parent().find('img').attr("data-video-src");
            $(".middle-vdo iframe").attr("src",vdoSrc);
        });

        videojs('vjs-video').ready(function () {
            var vjsPlayer = this;
            $(".vdo-start").on('click', function () {
                var vdoSrc = $(this).parent().find('img').attr("data-video-src");
                var vdoExt = $(this).parent().find('img').attr("data-video-extention");
                vjsPlayer.src({type: vdoExt, src: vdoSrc});
                vjsPlayer.play();
            });
        });

        var shuffleList = [
          '<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[0]['banner_image'];?>',
          '<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[1]['banner_image'];?>',
          '<?php echo BASE_URI;?>/uploads/banner/<?php echo $focus_banner['banner_image'];?>',
          '<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[2]['banner_image'];?>',
          '<?php echo BASE_URI;?>/uploads/banner/<?php echo $banner[3]['banner_image'];?>'
        ];

        var $imgBox = $(".image-box");
        function shuffle() {
            for(var i=0;i<=$imgBox.length;i++) {
                var $img = $imgBox.eq(i).children('img');
                if(i == 2){
                    $($img).fadeOut(function(){
                        $img.attr('src', shuffleList[i]);
                        $($img).fadeIn(200);
                    });
                } else {
                    $img.attr('src', shuffleList[i]);
                }

                if($imgBox.length-1 == i){
                    setTimeout(function() {
                       shuffle();
                    }, 2000);
                }
            }
            shuffleList.push(shuffleList.shift());
        }
        shuffle();
    });
</script>
		 