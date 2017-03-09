<?php
	error_reporting(E_ALL - E_WARNING);

	require_once('class/class.session.php');

	session_destroy();
  $session->logout();
	
  header("Location: http://annaosiak.pl");
