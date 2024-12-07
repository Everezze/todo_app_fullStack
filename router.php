<?php

echo(__FILE__);
echo("</br>");
echo(getcwd());

echo("</br>");
echo("</br>");

echo "server method is : " . $_SERVER["REQUEST_METHOD"];
echo("</br>");
echo("</br>");

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
	"/" => "controllers/Controller_home.php",
	"/connect" => "controllers/Controller_connect.php",
	"/register" => "controllers/Controller_register.php",
	"/about" => "controllers/Controller_about.php",
	"/contact" => "controllers/Controller_contact.php",
];

if(array_key_exists($uri,$routes)){
	echo("the route chosen is: " . $uri);
	require $routes[$uri];
}else{
	echo "route not found, a 404 should be thrown here.";
	echo "</br>" . $uri;
}

?>
