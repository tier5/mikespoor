<?php if($current_page=='picture-gallery') { ?>
    <section>


    </section>
<?php }  else if($current_page=='video-gallery') {?>
<section>


    </section>
<?php }  else if($current_page=='links-news') {?>
<section>


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
<?php } ?>

<?php if((isset($banner['banner_type'])) && ($banner['banner_type']=='2') ){  
    if((isset($banner['banner_ext'])) && ($banner['banner_ext']=='1') ){
    $ext=substr($banner['banner_image'], strrpos($banner['banner_image'], '.') + 1); ?>
    <section>
         <div class="flexslider top_slider" style="background-image: url('<?php echo BASE_URI?>assets/images/banner/1477050259.jpg'); ">
            <video height="300px" width="100%" autoplay>
                <source src="<?php echo BASE_URI?>assets/images/banner/<?php echo $banner['banner_image'];?>" type="video/<?php echo $ext; ?>">
            </video>
        </div>
    </section>
    <?php }
    if((isset($banner['banner_ext']))&& ($banner['banner_ext']=='2') ){
	    $url=explode("?v=",(trim($banner['banner_image'])));
		$videname=$url[1]; ?>
        <section id="home" class="padbot0">
            <div class="flexslider top_slider" style="background-image: url('<?php echo BASE_URI?>assets/images/banner/1477050259.jpg'); ">
               <!--  <a name="P2" class="player" id="P2" data-property="{videoURL:'<?php echo $videname; ?>',containment:'.top_slider',autoPlay:true, mute:true, startAt:0, opacity:1}"></a> -->
               <iframe id="mbYTP_P2" class="playerBox" frameborder="0" allowfullscreen="1" title="YouTube video player" src="https://www.youtube.com/embed/<?php echo $videname; ?>?autoplay=1&amp;modestbranding=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;version=3&amp;playerapiid=mbYTP_P2&amp;origin=http%3A%2F%2Flocalhost&amp;allowfullscreen=true&amp;wmode=transparent&amp;iv_load_policy=3&amp;html5=1&amp;widgetid=1"></iframe>
            </div>
        </section>			                                             
	<?php }
}  }?>


<style type="text/css">
video { 
  
  object-fit: fill;
}

</style>
     
		 