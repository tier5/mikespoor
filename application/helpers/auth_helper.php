<?php
function checkuserlogin()
{
	if(!isset($_SESSION['usersession']))
	{
		header('location:'.BASE_URI.'backend/login');
		exit;
	}
}
function checklogin()
{
	if(isset($_SESSION['usersession']))
	{
		header('location:'.BASE_URI.'backend/dashboard');
		exit;
	}
}
?>