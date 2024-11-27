<?php

$proj_name = "/todo_app";
$uri = $_SERVER["REQUEST_URI"];
$uri = str_replace($proj_name,"",$uri);

//echo($uri);
//echo("</br>");

//if($uri === $proj_name . "/"){
//	echo("it's home!");
//}else{
//	echo("/ not alone");
//}

//echo("</br>");
//echo("<pre>");
//var_dump($_SERVER);
//echo("</pre>");

$routes = [
	"/" => "views/home.php",
	"/connect" => "views/connect.php",
	"/register" => "views/register.php",
	"/about" => "views/about.php",
	"/contact" => "views/contact.php",
];

if(array_key_exists($uri,$routes)){
	echo("the route chosen is: " . $uri);
	require $routes[$uri];
}

?>
