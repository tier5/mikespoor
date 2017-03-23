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
    <section  >
        <video height="300px" width="100%" autoplay>
            <source src="<?php echo BASE_URI?>assets/images/banner/<?php echo $banner['banner_image'];?>" type="video/<?php echo $ext; ?>">
        </video>
    </section>
    <?php }
    if((isset($banner['banner_ext']))&& ($banner['banner_ext']=='2') ){
	    $url=explode("?v=",(trim($banner['banner_image'])));
		$videname=$url[1]; ?>
        <section id="home" class="padbot0">
            <div class="flexslider top_slider" >
                <a name="P2" class="player" id="P2" data-property="{videoURL:'<?php echo $videname; ?>',containment:'.top_slider',autoPlay:true, mute:true, startAt:0, opacity:1}"></a>
            </div>
        </section>			                                             
	<?php }
} ?>
<style type="text/css">
video { 
  
  object-fit: fill;
}

</style>
     
		 