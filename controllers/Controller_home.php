<?php


$db = new PDO("mysql:host=127.0.0.1;dbname=todo_app","root");
$query = "select 
	rank,type,user_id, tasks.id as IDtask,
	description,list_id,status
	from lists
	join tasks
	on tasks.list_id = lists.id
	where user_id = ?
	";

$stmt = $db->prepare($query);
$stmt->bindValue(1,$_SESSION["user"]["id"]);
$result = $stmt->execute();
if($result){
	$list_data = $stmt->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);
}

echo "<pre>";
var_dump($list_data);
echo "</pre>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";

require "views/home.php";
