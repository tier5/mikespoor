<?php
function checkuserlogin()
{
	if(!isset($_SESSION['usersession']))
	{
		header('location:'.DOMAIN.'backend/login');
		exit;
	}
}
function checklogin()
{
	if(isset($_SESSION['usersession']))
	{
		header('location:'.DOMAIN.'backend/dashboard');
		exit;
	}
}
?>