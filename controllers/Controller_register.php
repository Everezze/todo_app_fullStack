<?php

//require "utils.php";

//echo("</br>");
//echo(__FILE__);
//echo("</br>");
//echo(getcwd());
//
//echo("</br>");
//echo("</br>");
//echo("</br>");
//die();

const NUM_OF_INPUTS = 4;
$valid_user = true;
$valid_inputs = 4;

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST)){

		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		$db = new PDO("mysql:host=127.0.0.1;dbname=todo_app","root");
		$user_data = retrieve_by_email($_POST["email"]);

		if($user_data){
			//return the view with error message that email already
			//exists.
			echo "mail already exists, re-try again.";
		}
		else{

			foreach($_POST as $data_key => $data_value){
				check_inputs($data_key,$data_value);
				echo "</br>";
				echo "inside loop just after input checked : " . $$data_key;
				echo "</br>";
			}

			if($valid_inputs < NUM_OF_INPUTS){
				require "views/register.php";
			}
			else{
				$hashed_pwd = secure_password($password);
				$register_query = 
					"insert into users (first_name,last_name,email,password,isAdmin)
					values (:first_name,:last_name,:email,:password,0)";
				$stmt = $db->prepare($register_query);
				$stmt->bindValue(":first_name",$first_name);
				$stmt->bindValue(":last_name",$last_name);
				$stmt->bindValue(":email",$email);
				$stmt->bindValue(":password",$hashed_pwd);
				$stmt->execute();
				echo "user registered";
			}
		}
	}
	else{
		echo "blank form, nothing here to process";
	}
}
elseif($_SERVER["REQUEST_METHOD"] == "GET"){
	require "views/register.php";
}

//require dirname(__DIR__) . "/views/register.php";
