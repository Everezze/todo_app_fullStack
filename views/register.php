<?php
//require "partials/head.php";
//require "partials/header.php";
require "partials/head.php";
require "partials/header.php";

?>

<section class="register-section">
	<form action= <?= $proj_name . "/register" ?> method="post">
		<div>
			<label for="first_name">First Name</label>
			<div class="input-container">
				<input type="text" name="first_name" id="first_name">
			</div>
			<p class="error-msg <?= Is_error("first_name") ?>"> <?= display_error_msg("first_name") ?> </p>
		</div>
		<div>
			<label for="last_name">Last Name</label>
			<div class="input-container">
				<input type="text" name="last_name" id="last_name">
			</div>
			<p class="error-msg <?= Is_error("last_name") ?>" ><?= display_error_msg("last_name") ?></p>
		</div>
		<div>
			<label for="email">Email</label>
			<div class="input-container">
				<input type="email" name="email" id="email">
			</div>
			<p class="error-msg <?= Is_error("email") ?>"><?= display_error_msg("email") ?></p>
		</div>
		<div>
			<label for="password">Password</label>
			<div class="input-container">
				<input type="password" name="password" id="password">
			</div>
			<p class="error-msg <?= Is_error("password") ?>"><?= display_error_msg("password") ?></p>
		</div>

		<button type="submit">Register</button>
		<p><?php reset_try() ?></p>
	</form>
</section>

<?php 
//require "partials/footer.php"; 
require "partials/footer.php";
?>
