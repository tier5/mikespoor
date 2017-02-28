<html >
<head>
<?php
	$this->load->view('user/include/headsection');
?>
</head>
<body>
<?php	
    $this->load->view('user/include/header');
	$this->load->view($template);
	$this->load->view('user/include/footer');
?>
</body>
</html>