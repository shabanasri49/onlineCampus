<?php
	session_start();
	mysql_connect('localhost','root','') or die("Database  not connect");
	mysql_select_db('placement') or die("No database selected");
	error_reporting(0);

	$keyword ='';
	if(!isset($_SESSION['cat_id']) || $_SESSION['cat_id']!='')
		{$_SESSION['cat_id'] = '';}
	if(!isset($_SESSION['sub_id']) || $_SESSION['sub_id']='')
		{$_SESSION['sub_id']='';}
	if(!isset($_SESSION['message']))
		{$_SESSION['message']='';}
	if(!isset($_SESSION['login_type']))
		{$_SESSION['login_type']='';}
	
	function isLoggedIn(){
		if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!=''){
			return true;
		}
		else{
			return false;
		}
	}
	function isUserLoggedIn(){
		if(isLoggedIn()){
			return  true;
		}
		else{
			$_SESSION['message'] ='<span class="fail">Please Login Again To Continue</span>';
			header("Location:login.php");
			exit;
		}
	}
	function isAdminLoggedIn(){
		if(isLoggedIn()){
			if(isset($_SESSION['login_type']) && $_SESSION['login_type']=='A'){
				return true;
			}
			else{
				header("Location:adminhome.php");
				exit;
			}
		}
		else{
			$_SESSION['message'] ='Please Login Again';
			header("Location:adminlogin.php");
			exit;
		}
	}
	
?>
