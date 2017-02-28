<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo BASE_URI; ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $metainfo['meta_description'];?>" />
<meta name="keywords" content="<?php echo $metainfo['meta_keywords'];?>" />
<title><?php echo $title; ?></title>
<link href="assets/user/css/global.css" rel="stylesheet" type="text/css" media="screen" />

<!--nav css & js start-->
<link rel="stylesheet" type="text/css" media="screen" href="assets/user/chrometheme/chromestyle.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/user/chromejs/chrome.js"></script>
<!--nav css & js end-->

<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="assets/user/engine1/style.css" />
	<script type="text/javascript" src="assets/user/engine1/jquery.js"></script>
    <script type="text/javascript" src="assets/user/engine1/jquery.js"></script>

            <style>
	.ws_images div a{
		display:none !important;
	}
</style>
	<!-- End WOWSlider.com HEAD section -->
</head>

<body>
<?php include('include/header.php'); ?>

<div class="banner_wapper">
<div id="wowslider-container1">
	<div class="ws_images"><ul>
    <?php
	$cnt=0;
	foreach($bannerlist as $bannerlistdata)
	{
		?>
        <li><img src="<?php echo 'uploads/'.$bannerlistdata['banner_image']; ?>" alt="banner_img<?php echo $cnt+1; ?>" title="banner_img<?php echo $cnt+1; ?>" id="wows1_<?php echo $cnt; ?>"/></li>
        <?php
		$cnt=$cnt+1;
	}
	?>
<?php /*?><li><img src="assets/user/data1/images/banner_img1.jpg" alt="banner_img1" title="banner_img1" id="wows1_0"/></li>
<li><img src="assets/user/data1/images/banner_img2.jpg" alt="banner_img2" title="banner_img2" id="wows1_1"/></li>
<li><img src="assets/user/data1/images/banner_img3.jpg" alt="banner_img3" title="banner_img3" id="wows1_2"/></li>
<li><img src="assets/user/data1/images/banner_img3.jpg" alt="banner_img3" title="banner_img4" id="wows1_3"/></li><?php */?>
</ul></div>
<div class="ws_bullets"><div>
 <?php
	$cnt=1;
	foreach($bannerlist as $bannerlistdata)
	{
		?>
        <a href="#" title="<?php echo $bannerlistdata['banner_title']; ?>"><img src="<?php echo 'uploads/'.$bannerlistdata['banner_thumbnail']; ?>" alt="banner_img<?php echo $cnt; ?>"/><?php echo $cnt; ?></a>
        <?php
		$cnt=$cnt+1;
	}
	?>
<?php /*?><a href="#" title="banner_img1"><img src="assets/user/data1/tooltips/banner_img1.jpg" alt="banner_img1"/>1</a>
<a href="#" title="banner_img2"><img src="assets/user/data1/tooltips/banner_img2.jpg" alt="banner_img2"/>2</a>
<a href="#" title="banner_img3"><img src="assets/user/data1/tooltips/banner_img3.jpg" alt="banner_img3"/>3</a>
<a href="#" title="banner_img4"><img src="assets/user/data1/tooltips/banner_img3.jpg" alt="banner_img4"/>4</a><?php */?>
</div></div>

	<div class="ws_shadow"></div>
	</div>

</div>

<div class="main_body_wrapper">
<div class="main_container">
<div class="main_container2">
<div class="about_header">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="about_header_text"><?php echo $aboutinfo['cms_title']; ?></td>
  </tr>
</table>

</div>

<div class="about_text_container">
<div class="about_text_area">
<?php echo htmlspecialchars_decode($aboutinfo['cms_content']); ?>
</div>

<div class="about_img_area">
  <img src="<?php echo 'uploads/'.$aboutinfo['cms_image']; ?>" width="399" height="231" alt="" /></div>

</div>
</div>
<div class="main_container2">
<div class="about_header">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="about_header_text"><?php echo $cserviceinfo['cms_title']; ?></td>
  </tr>
</table>

</div>

<div class="about_text_container">
<div class="about_text_area">
<?php echo htmlspecialchars_decode($cserviceinfo['cms_content']); ?>
</div>

<div class="about_img_area">
  <img src="<?php echo 'uploads/'.$cserviceinfo['cms_image']; ?>" width="399" height="231" alt="" /></div>

</div>
</div>
</div>
</div>

<?php include('include/footer.php'); ?>


<script type="text/javascript" src="assets/user/engine1/wowslider.js"></script>
	<script type="text/javascript" src="assets/user/engine1/script.js"></script>
</body>
</html>
