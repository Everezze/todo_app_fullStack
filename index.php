<?php

if(!isset($_SESSION)){
	session_start();
}

if(!isset($_SESSION["register_try"])){
	$_SESSION["register_try"] = 0;
}


require "utils.php";
require "router.php";

