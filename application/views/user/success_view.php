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

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="assets/user/css/flexslider.css" type="text/css" media="screen" />
<link href="assets/user/css_1/slider.css" rel="stylesheet" type="text/css"  media="all" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
  <script type="text/javascript" src="assets/user//jquery.easing.1.3.js"></script> 
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
        <h6><a href="index.html">HOME</a> <span><font color="#CCC">|  PAYMENT RESULT</font></span></h6>
			
		</div>
	</div>
</div>
<!--start-booking-->
<!---728x90--->
<div style="text-align: center;"><script async src="../../../../pagead2.googlesyndication.com/pagead/js/f.txt"></script>
<ins class="adsbygoogle"
     style="display:inline-block;width:100%;height:0px"
     data-ad-client="ca-pub-9153409599391170"
     data-ad-slot="6850850687"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
	<div class="booking">
		<div class="container">
         <form method="post" action="<?php echo BASE_URI.'packages/packagepayment'; ?>">
       
        
        <h3 style="margin-top:-20PX; margin-left:12PX;">BOOKING - PAYMENT RESULT</h3>
       
			<div class="booking-main">
				<div class="booking-top">
					
              
						<div class="col-md-12 contact-grid">
					     <h3>
                         <?php
						 if($result=="success")
						 {
							 echo "Payment Successfull";
						 }
						 else if($result=="sessionerror")
						 {
							 echo "Session Expired. Payment Failed";
						 }
						 else
						 {
							 echo "Payment Failed";
						 }
						 ?>
                         </h3><BR />
									
						
						
					
				</div>

						<div class="b-bottom">
						
							
							<div class="clearfix"></div>
						</div>
                        </form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
            
		</div>
	</div>
	<!--end-booking-->
	<!--strat-date-piker-->
					<link rel="stylesheet" href="assets/user/css/jquery-ui.css" />
					<script src="assets/user/js/jquery-ui.js"></script>
							  <script>
									  $(function() {
										$( "#datepicker,#datepicker1" ).datepicker();
									  });
							  </script>
					<!--//End-date-piker-->
					

<?php include('include/footer.php'); ?>
</body>
</html>