<!DOCTYPE html>
<html>
<head>
<base href="<?php echo BASE_URI; ?>">
<title><?php echo $title; ?></title>
<link href="assets/user/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="assets/user/js/jquery.min.js"></script>
<link href="assets/user/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $metainfo['meta_description'];?>" />
<meta name="keywords" content="<?php echo $metainfo['meta_keywords'];?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/user/css/flexslider.css" type="text/css" media="screen" />
<link href="assets/user/css_1/slider.css" rel="stylesheet" type="text/css"  media="all" />
</head>

<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', 'w3layouts.com');
  ga('send', 'pageview');
</script>
<script async type='text/javascript' src='../../../../cdn.fancybar.net/ac/fancybar6a2f.js?zoneid=1502&amp;serve=C6ADVKE&amp;placement=w3layouts' id='_fancybar_js'></script>

  <script src="assets/user/js_1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="assets/user/js_1/jquery.easing.1.3.js"></script> 
  <script type="text/javascript" src="assets/user/js_1/camera.min.js"></script>
	<script type="text/javascript">
			   jQuery(function(){
				
				jQuery('#camera_wrap_1').camera({
					thumbnails: true
				});
			});
		  </script>

 
	<!--header-->	
<?php include('include/header.php'); ?>
<div class="banner-in">
		<div class="container">
		<div class="banner-top">
				<h6><a href="<?php echo BASE_URI.'home'; ?>">HOME</a> <span><font color="#CCC">|  <?php echo $headtitle; ?></font></span></h6>
           
		</div>
	</div>
</div>
<!---728x90--->

<div class="container">	

		<div class="four" >		
<h3 align="left" style="margin-top:-20PX;"><b><?php echo $headtitle; ?></b></h3><HR style="border: dashed  #CCCCCC 1px;">
		   <span style="text-align:justify; font-size:10px;"><?php echo htmlspecialchars_decode($aboutinfo['cms_content']); ?>  </span>      
           
           
           
             
		    </div>
		</div>

<?php include('include/footer.php'); ?>
</body>
</html>