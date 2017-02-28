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
    <link rel="stylesheet" href="assets/user/pixons/style.css" />
    <link rel="stylesheet" href="assets/user/iconsfont/iconsfont.css" />
    <link rel="stylesheet" href="assets/user/style-switcher/styleSwitcher.css"/>
    <link href="assets/user/css/flexslider.css" rel="stylesheet" type="text/css" />
    <link href="assets/user/css/flaticon.css" rel="stylesheet" type="text/css" media="screen">
    <!--/stylesheets -->

    <!-- prettyPhoto lightbox stylesheer -->
    <link rel="stylesheet" href="assets/user/css/prettyPhoto.css" media="screen" />
    <!-- /prettyPhoto lightbox stylesheer -->

    <!-- google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900,200,100' rel='stylesheet' type='text/css'>
    <!-- /google web fonts -->

		<!-- Icons -->
	  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- /Icons -->

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="js/selectivizr-min.js"></script>
    <![endif]-->

    <style>
      .apoint{
      	cursor:pointer;
      	cursor:pointer;
      	font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .containerc {
        width: 438px;
        height: 111px;
        position:relative;
      }
      .containera {
        width: 438px;
        height: 134px;
        position:relative;
      }
      .containere {
        width: 438px;
        height: 263px;
        position:relative;
      }
      .containerl {
        width: 438px;
        height: 242px;
        position:relative;
      }
      .containerb {
        width: 438px;
        height: 134px;
        position:relative;
      }
      .containerd {
        width: 438px;
        height: 243px;
        position:relative;
      }
      .nava{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 34%;
        left: 23%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navc{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 16%;
        left: 23%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navf{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 74%;
        left: 23%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navl{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 68%;
        left: 69%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navb{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 29%;
        left: 69%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
    </style>
  </head>
  <body>
    <!-- .header-wrapper start -->
    <?php include('include/header.php'); ?>
    <!-- .header-wrapper end -->
    <?php /*?><section id="home" class="padbot0">
  		<!-- TOP SLIDER -->
  		<div class="flexslider top_slider" >
        <?php if($companyinfo['video_status']){?>
    			<ul class="slides">
            <?php foreach($videobannerlist as $videobannerdata){?>
    					<li class="slide1">
    						<div class="flex_caption1">
    							<p class="title1 captionDelay2 FromTop" style="color:#FFF;"><?php echo $videobannerdata['video_banner_title']; ?></p>
    							<p class="title4 captionDelay7 FromBottom" style="color:#FFF;"><?php echo htmlspecialchars_decode($videobannerdata['video_banner_content']); ?></p>
    						</div>
    					</li>
            <?php } ?>
    			</ul>
    		<?php } ?>
    		<!-- VIDEO BACKGROUND -->
        <a name="P2" class="player" id="P2" data-property="{videoURL:'<?php echo $companyinfo['video_banner']; ?>',containment:'.top_slider',autoPlay:true, mute:true, startAt:0, opacity:1}"></a>
        <!-- /VIDEO BACKGROUND -->
  		</div>
      <!-- //TOP SLIDER -->
		</section><?php */?>
    <!-- #page-title start -->
    <section id="page-title" class="page-title-1">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="breadcrumbs triggerAnimation animated" data-animate="fadeInUp">
                        
                    </div>
                </div><!-- .grid_8 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- #page-title end -->
    <br/>
    <?php if($aboutinfo['cms_choice']=='0'){?>
    <!-- .page-content start -->
    <section class="page-content">
    <!-- .container start -->
      <div class="container">
        <!-- .row start -->
        <div class="row">
          <div class="grid_6">
            <div class="triggerAnimation animated" data-animate="fadeInLeft">
              <ul class="team-alternative">
                <li class="team-member">
                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage1']; ?>" alt="team member image"/>
                  <div class="team-member-hover">
                    <div class="mask"></div>
                    <div class="team-member-info">
                      <h5>Alicia Stewark</h5>
                      <span class="position">Company CEO</span>
                      <a href="#" class="btn-medium empty white">Read more</a>
                    </div>
                  </div>
                </li>
                <li class="team-member">
                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage2']; ?>" alt="team member image"/>
                  <div class="team-member-hover">
                    <div class="mask"></div>
                    <div class="team-member-info">
                        <h5>Peter Brown</h5>
                        <span class="position">Senior web developer</span>
                        <a href="#" class="btn-medium empty white">Read more</a>
                    </div>
                  </div>
                </li>
                <li class="team-member">
                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage3']; ?>" alt="team member image"/>
                  <div class="team-member-hover">
                    <div class="mask"></div>
                    <div class="team-member-info">
                      <h5>Brooke Felther</h5>
                      <span class="position">Customer relations</span>
                      <a href="#" class="btn-medium empty white">Read more</a>
                    </div>
                  </div>
                </li>
                <li class="team-member">
                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage4']; ?>" alt="team member image"/>
                  <div class="team-member-hover">
                    <div class="mask"></div>
                    <div class="team-member-info">
                      <h5>Tom Harting</h5>
                      <span class="position">Senior manager</span>
                      <a href="#" class="btn-medium empty white">Read more</a>
                    </div>
                  </div>
                </li>                                
              </ul>
            </div><!-- .triggerAnimation.animated end -->
          </div><!-- .grid_6 end -->
          <!-- .grid_6 start -->
          <article class="grid_6">
              <div class="triggerAnimation animated" data-animate="fadeInRight">
                  <section class="heading-bordered">
                      <h3><?php echo $aboutinfo['cms_title']; ?> </h3>
                  </section><!-- .heading-bordered end -->
                  <?php echo htmlspecialchars_decode($aboutinfo['cms_content']); ?>
              </div><!-- .triggerAnimation.animated end -->
          </article>
          <!-- .grid_6 end -->
        </div>
        <!-- .row end -->
      </div>
      <!-- .container end -->
    </section>
    <?php } else if($aboutinfo['cms_choice']=='1'){ ?>
    <section class="page-content">
      <!-- .container start -->
      <div class="container">
        <!-- .row start -->
        <div class="row">
          <div class="grid_12" align="center">
            <div id="pdf">
              <object width="90%" height="1425" type="application/pdf" data="assets/images/sample.pdf?#view=FitH&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content">
                <p>It appears your Web browser is not configured to display PDF files.</p>
              </object>
            </div>
          </div>
          <!-- .grid_6 end -->
          <!-- .grid_6 start -->   
        </div><!-- .row end -->
      </div><!-- .container end -->
    </section>
    <?php } ?>
    <!-- .page-content end -->
    <!-- .page-content start -->
    <section class="page-content parallax parallax-1" data-stellar-background-ratio="0.5">

            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <article class="grid_12">
                        <section class="heading-centered triggerAnimation animated" data-animate="bounceIn">
                            <h2 style="margin-bottom:32px;"><?php echo $aboutinfo['cms_title']; ?> </h2>
                           <?php echo htmlspecialchars_decode($aboutinfo['cms_fcontent']); ?>
                                <?php
                           /*foreach($timelinelist as $timedata)
						   {
							   echo $timedata['timeline_title']."<br/>";
						   }*/
						  /* $tlen=count($timelinelist);
for($t=0;$t<$tlen;$t++)
{
	echo $timelinelist[$t]['timeline_title']."<br/>";
}*/
						   ?>
                        <div class="row">
                    <div class="grid_12" align="center">
<?php /*?><div class="containera" style="background-image:url(assets/timeline/24.png); background-repeat:no-repeat;">
</div><?php */?>
<?php
$tlen=count($timelinelist);
 $tcount=$tlen;


for($t=0;$t<$tlen;$t++)
{
	if($tcount==$tlen)
	{
		if($tlen%2!=0)
	{
?>
<div class="containere" style="background-image:url(assets/timeline/41n.png); background-repeat:no-repeat;">
<div class="navf popper" data-popbox="pop<?php echo $tcount; ?>"><a class="apoint" go="pop<?php echo $tcount; ?>" data-geo=""><?php echo $timelinelist[$t]['timeline_title']; ?></a>
<div id="pop<?php echo $tcount; ?>" style="display:none;">
    <h1><?php echo $timelinelist[$t]['timeline_title']; ?></h1>
    <?php echo htmlspecialchars_decode($timelinelist[$t]['timeline_content']); ?>
    </div>
</div>
</div>
<?php
	}
	else
	{
		?>
        <div class="containerl" style="background-image:url(assets/timeline/42n.png); background-repeat:no-repeat;">
        <div class="navl popper" data-popbox="pop<?php echo $tcount; ?>"><a class="apoint" go="pop<?php echo $tcount; ?>" data-geo=""><?php echo $timelinelist[$t]['timeline_title']; ?></a>
<div id="pop<?php echo $tcount; ?>" style="display:none;">
    <h1><?php echo $timelinelist[$t]['timeline_title']; ?></h1>
    <?php echo htmlspecialchars_decode($timelinelist[$t]['timeline_content']); ?>
    </div>
</div>
</div>
        <?php
	}
	?>
<?php
	}
	else if($tcount==1)
	{
		?>
        <div class="containerd" style="background-image:url(assets/timeline/40n.png); background-repeat:no-repeat;">
<div class="navc popper" data-popbox="pop<?php echo $tcount; ?>"><a class="apoint" go="pop<?php echo $tcount; ?>" data-geo=""><?php echo $timelinelist[$t]['timeline_title']; ?></a>
<div id="pop<?php echo $tcount; ?>" style="display:none;">
    <h1><?php echo $timelinelist[$t]['timeline_title']; ?></h1>
    <?php echo htmlspecialchars_decode($timelinelist[$t]['timeline_content']); ?>
    </div>
</div>
</div>
        <?php
	}
	else
	{
		if($tcount%2==0)
	{
?>
<div class="containerc" style="background-image:url(assets/timeline/9n.png); background-repeat:no-repeat;">
<div class="navb popper" data-popbox="pop<?php echo $tcount; ?>"><a class="apoint" go="pop<?php echo $tcount; ?>" data-geo=""><?php echo $timelinelist[$t]['timeline_title']; ?></a>
<div id="pop<?php echo $tcount; ?>" style="display:none;">
    <h1><?php echo $timelinelist[$t]['timeline_title']; ?></h1>
     <?php echo htmlspecialchars_decode($timelinelist[$t]['timeline_content']); ?>
    </div>
</div>
</div>
<?php
	}
	else
	{
		
			?>
            <div class="containerc" style="background-image:url(assets/timeline/7n.png); background-repeat:no-repeat;">
<div class="nava popper" data-popbox="pop<?php echo $tcount; ?>"><a class="apoint" go="pop<?php echo $tcount; ?>" data-geo=""><?php echo $timelinelist[$t]['timeline_title']; ?></a>
<div id="pop<?php echo $tcount; ?>" style="display:none;">
    <h1><?php echo $timelinelist[$t]['timeline_title']; ?></h1>
    <?php echo htmlspecialchars_decode($timelinelist[$t]['timeline_content']); ?>
    </div>
</div>
</div>
            <?php
		
	}

	}
	

$tcount=$tcount-1;
}
?>
<?php /*?><div class="containerc" style="background-image:url(assets/timeline/7.png); background-repeat:no-repeat;">
<div class="nava popper" data-popbox="pop4"><a class="apoint" go="pop4" data-geo="">4</a>
<div id="pop4" style="display:none;">
    <h1>hjjjjkjv</h1>
    </div>
</div>
</div>
<div class="containerc" style="background-image:url(assets/timeline/9.png); background-repeat:no-repeat;">
<div class="navb popper" data-popbox="pop3"><a class="apoint" go="pop3" data-geo="">3</a>
<div id="pop3" style="display:none;">
    <h1>gfjgfjghjj</h1>
    </div>
</div>
</div>

<div class="containerc" style="background-image:url(assets/timeline/7.png); background-repeat:no-repeat;">

<div class="nava popper" data-popbox="pop1"><a class="apoint" go="pop2" data-geo="">2</a>
<div id="pop2" style="display:none;">
    <h1>erterpkiji</h1>
    </div>
</div>
</div>
<div class="containerc" style="background-image:url(assets/timeline/9.png); background-repeat:no-repeat;">
<div class="navb popper" data-popbox="pop1"><a class="apoint" go="pop1" data-geo="">1</a>
<div id="pop1" style="display:none;">
    <h1>bvnbbnmbnm,</h1>
    </div>
</div>
</div><?php */?>

 <?php /*?><div class="containerd" style="background-image:url(assets/timeline/26.png); background-repeat:no-repeat;">
</div><?php */?>


</div>
</div>
                        </section>
                    </article><!-- .grid_12 end -->
                </div><!-- .row end -->

                <!-- .row start -->
                <!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

        <!-- .page-content end -->

        <!-- .page-content.parallax start -->
        <!-- .page-content.parallax.parallax-2 end -->

        <!-- .page-content end -->

        <!-- .footer-wrapper start -->
        <?php include('include/footer.php'); ?><!-- .footer-wrapper end -->

        <!-- scripts -->
        <!-- scripts -->
        <script  src="assets/user/js/jquery-1.9.1.js"></script> <!-- jQuery library -->  
        <script  src="assets/user/js/jquery-migrate-1.2.1.min.js"></script> <!-- jQuery migrate -->
        <script  src="assets/user/js/jquery.placeholder.min.js"></script><!-- jQuery placeholder fix for old browsers -->
        <script  src="assets/user/js/modernizr.custom.js"></script> <!-- jQuery modernizr -->
        <script  src="assets/user/js/jquery.dlmenu.js"></script><!-- responsive navigation -->
        <script  src="assets/user/js/waypoints.min.js"></script><!-- js for animating content -->
        <script  src="assets/user/js/retina-1.1.0.min.js"></script><!-- retina ready script -->
        <script  src="assets/user/js/jquery.stellar.min.js"></script><!-- parallax scrolling -->
        <script  src="assets/user/js/jquery.isotope.min.js"></script><!-- jQuery isotope plugin -->
        <script  src="assets/user/js/portfolio.js"></script> <!-- jQuery portfolio options -->
        <script  src="assets/user/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto lightbox -->
        <script  src="assets/user/js/jquery.tweetscroll.js"></script> <!-- jQuery tweetscroll plugin -->
        <script  src="assets/user/sharre/jquery.sharrre-1.3.4.min.js"></script><!-- Sharre post plugin -->
        <script  src="assets/user/style-switcher/styleSwitcher.js"></script>
		<script  src="assets/user/js/nicescroll.min.js"></script> <!-- Nice scroll Plugin -->
        <script  src="assets/user/js/include.js"></script> <!-- jQuery custom options -->
         
		 
	<script src="assets/user/js/js/jquery.flexslider-min.js" type="text/javascript"></script>
	
	<script src="assets/user/js/js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
	
	<script src="assets/user/js/js/mynewscript.js" type="text/javascript"></script>
        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function($) {
                'use strict';

                // PRETTYPHOTO LIGHTBOX START
                if(jQuery().prettyPhoto) {
					piPrettyphoto(); 
				}
    
				function piPrettyphoto(){
					$("a[data-gal^='prettyPhoto']").prettyPhoto({
						social_tools: false,
						hook: 'data-gal'
					});
				}  

                //JQUERY SHARRE PLUGIN END
                $('.sharre-facebook').sharrre({
                    share: {
                        facebook: true
                    },
                    enableHover: false,
                    enableTracking: true,
                    click: function(api, options) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    }
                });

            });

            /* ]]> */
        </script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( document ).tooltip({
      items: "img, [data-geo], [title]",
      content: function() {
        var element = $( this );
		
		
        if ( element.is( "[data-geo]" ) ) {
          var text = element.text();
		  var tad=element.attr( "go" );
		  var cont=$('#'+tad).html();
          return cont;
        }
       
      }
    });
  } );
  </script>
<style>
  .ui-tooltip {
    padding: 10px 20px;
    color: white;
    border-radius: 10px;
    font-size: 14px;
    text-transform: uppercase;
    box-shadow: 0 0 7px black;
  }
  </style>
    </body>
</html>
