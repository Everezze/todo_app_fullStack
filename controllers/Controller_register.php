<?php

const NUM_OF_INPUTS = 4;
//$valid_user = true;
$valid_inputs = 4;

echo "</br>";
echo "value of register_try : " . $_SESSION["register_try"];
echo "</br>";
echo "</br>";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST)){

		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		$fields = [];

		foreach($_POST as $data_key => $data_value){
			$fields[$data_key] = [] ;
			$fields[$data_key]["value"] = $data_value ;
			$fields[$data_key]["error_content"] = "Invalid input, please retry.";
			check_inputs($data_key);
			echo "</br>";
			echo "inside loop just after input checked : " . $$data_key;
			echo "</br>";
		}

		//using the guest session to retrieve and dipslay error when re-routing using
		//the header func
		$_SESSION["guest_data"] = &$fields;
		if(!$_SESSION["register_try"]){
			$_SESSION["register_try"] = 1;
		}

		if($fields["email"]["state"] == "valid"){
			$db = new PDO("mysql:host=127.0.0.1;dbname=todo_app","root");
			$user_data = retrieve_by_email($_POST["email"]);
			var_dump($user_data);
		}

		if(isset($user_data) && $user_data){
			if($user_data["first_name"] == $fields["first_name"]
			&& $user_data["last_name"] == $fields["last_name"]){
				$fields["first_name"]["error_content"] = "First/Last name pair already exists.";
				$fields["last_name"]["error_content"] = "First/Last name pair already exists.";
			}
			$fields["email"]["error_content"] = "Email already taken. Choose another one.";
			//return the view with error message that email already
			//exists.
			//echo "mail already exists, re-try again.";

			//return "views/register.php";
			header("Location: " . $proj_name . "/register");
			exit();
		}
		else{

			if($valid_inputs < NUM_OF_INPUTS){
				header("Location: " . $proj_name . "/register");
				exit();
				//require "views/register.php";
			}
			else{
				register_user($fields);
				header("Location: " . $proj_name . "/connect");
				exit();
			}
		}
	}
	else{
		echo "blank form, nothing here to process";
	}
}
elseif($_SERVER["REQUEST_METHOD"] == "GET"){
	//if($_SESSION["register_try"]){
	//	$_SESSION["register_try"] = 0;
	//}
	require "views/register.php";
	//header("Location: " . $proj_name . "/register");
	//exit();
}

//require dirname(__DIR__) . "/views/register.php";
