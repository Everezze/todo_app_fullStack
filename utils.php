<?php

function Log_Instyle($value){
	echo("<pre>");
	var_dump($value);
	echo("</pre>");

	die();
}

function post_to_array($post_data){
	$post_array = [];
	foreach($post_data as $key => $value){
		$post_array[$key] = $value;
	}

	return $post_array;
};

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

function check_inputs(string $type , string $user_input){
	global $$type;
	global $valid_inputs;
	echo "</br>";
	echo "the global \$type : " . $type;
	echo "</br>";

	$regex  = [
		"first_name" =>"#^(?=[a-zA-Z]{3,})[a-zA-z\d_-]{3,20}$#", 
		"last_name" =>"#^(?=[a-zA-Z]{3,})[a-zA-z\d_-]{3,20}$#", 
		"email" =>"#^[a-zA-z_.-]{1,64}@(?=.{1,254}$)([a-zA-z_.-]+\..+)$#", 
		"password" =>"#^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[\#?!@$%^&*-])[a-zA-z\d\#?!@$%^&*-]{8,16}$#" 
	];

	if(!preg_match($regex[$type],$user_input)){
		$$type = "active-error";
		$valid_inputs -= 1;
	}

	echo "valid inputs still : " . $valid_inputs;

}

function Is_error(string $field){
	global $$field;
	//isset($$field) ? "active-error" : "";
	if(isset($$field) && $$field == "active-error"){
		return "active-error";
	}else{
		return "";
	}
}
