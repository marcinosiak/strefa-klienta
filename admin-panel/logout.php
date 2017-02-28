<?php
	error_reporting(E_ALL - E_WARNING);

	require_once('../class/class.session.php');

  $session->logout();

  header("Location: login");
