<?php

const NUM_OF_INPUTS = 2;
$valid_inputs = 2;

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST)){
		$fields = [];
		foreach($_POST as $data_key => $data_value){
			$fields[$data_key] = [] ;
			$fields[$data_key]["value"] = $data_value ;
			$fields[$data_key]["error_content"] = "Invalid input, please retry.";
			check_inputs($data_key);
		}

		if($fields["email"]["state"] == "valid"){
			$db = new PDO("mysql:host=127.0.0.1;dbname=todo_app","root");
			$user_data = retrieve_by_email($_POST["email"]);
		}

		if(isset($user_data) && $user_data){
			$correct_pwd = password_verify($_POST["password"], $user_data["password"]);
			if($correct_pwd){
				//var_dump($user_data);
				$_SESSION["user"] = [
					"id" => $user_data["id"],
					"first_name" => $user_data["first_name"],
					"last_name" => $user_data["last_name"],
					"email" => $user_data["email"],
					"isAdmin" => $user_data["isAdmin"],
				];
				header("Location: " . $proj_name);
			}
		}
	}

}
else{
	require "views/connect.php";
}

