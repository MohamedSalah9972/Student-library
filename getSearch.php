<?php
session_start();
if($_SESSION['role']=='admin')
	include('adminPage.php');
else 
	include('studentpage.php');