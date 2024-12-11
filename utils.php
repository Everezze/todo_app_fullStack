<?php

function Log_Instyle($value){
	echo("<pre>");
	var_dump($value);
	echo("</pre>");

	die();
}

function secure_password(string $plain_pwd): string {
	return password_hash($plain_pwd,PASSWORD_ARGON2ID);
}

function retrieve_by_email(string $email): array|bool { 

	global $db;

	$retrieve_query = "select * from users where email = ?";
	$stmt = $db->prepare($retrieve_query);
	$stmt->bindValue(1,$email);
	$stmt->execute();
	$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

	return $user_data;
}

function register_user(array $fields){
	global $db;

	$hashed_pwd = secure_password($fields["password"]["value"]);
	$register_query = 
		"insert into users (first_name,last_name,email,password,isAdmin)
		values (:first_name,:last_name,:email,:password,0)";
	$stmt = $db->prepare($register_query);
	$stmt->bindValue(":first_name",$fields["first_name"]["value"]);
	$stmt->bindValue(":last_name",$fields["last_name"]["value"]);
	$stmt->bindValue(":email",$fields["email"]["value"]);
	$stmt->bindValue(":password",$hashed_pwd);
	$stmt->execute();
	echo "user registered";
}

function check_inputs(string $type){
	global $valid_inputs;
	global $fields;
	echo "</br>";
	echo "the global \$type : " . $type;
	echo "</br>";
	//global $$type;

	$regex  = [
		"first_name" =>"#^(?=[a-zA-Z]{3,})[a-zA-z\d_-]{3,20}$#", 
		"last_name" =>"#^(?=[a-zA-Z]{3,})[a-zA-z\d_-]{3,20}$#", 
		"email" =>"#^[a-zA-z_.-]{1,64}@(?=.{1,254}$)([a-zA-z_.-]+\..+)$#", 
		"password" =>"#^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[\#?!@$%^&*-])[a-zA-z\d\#?!@$%^&*-]{8,16}$#" 
	];

	if(!preg_match($regex[$type],$fields[$type]["value"])){
		$fields[$type]["state"] = "invalid";
		$fields[$type]["class"] = "active-error";
		$valid_inputs -= 1;
		//$$type = "active-error";
	}
	else{
		$fields[$type]["state"] = "valid";
		$fields[$type]["class"] = "";
	}

	echo "valid inputs still : " . $valid_inputs;

}

function Is_error(string $field){
	//global $fields;
	//return $fields[$field]["class"];
	//return $_SESSION["guest_data"][$field]["class"];

	if($_SESSION["register_try"]){
		return $_SESSION["guest_data"][$field]["class"];
	}
	else{
		return "";
	}


	//if($_SERVER["REQUEST_METHOD"] == "GET"){
	//	return "";
	//}
	//else{
	//	return $_SESSION["guest_data"][$field]["class"];
	//}
}

function display_error_msg($field){
	//global $fields;
	//return $fields[$field]["error_content"];
	//return $_SESSION["guest_data"][$field]["error_content"];
	
	//var_dump($_SESSION["register_try"]);
	if($_SESSION["register_try"]){
		return $_SESSION["guest_data"][$field]["error_content"];
	}
	else{
		return "";
	}

	//if($_SERVER["REQUEST_METHOD"] == "GET"){
	//	return "";
	//}
	//else{
	//	return $_SESSION["guest_data"][$field]["error_content"];
	//}

}

function reset_try(){
	$_SESSION["register_try"] = 0;
}
