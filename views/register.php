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
			<p class="error-msg <?= Is_error("first_name") ?>">Invalid input, please retry.</p>
		</div>
		<div>
			<label for="last_name">Last Name</label>
			<div class="input-container">
				<input type="text" name="last_name" id="last_name">
			</div>
			<p class="error-msg <?= Is_error("last_name") ?>">Invalid input, please retry.</p>
		</div>
		<div>
			<label for="email">Email</label>
			<div class="input-container">
				<input type="email" name="email" id="email">
			</div>
			<p class="error-msg <?= Is_error("email") ?>">Invalid input, please retry.</p>
		</div>
		<div>
			<label for="password">Password</label>
			<div class="input-container">
				<input type="password" name="password" id="password">
			</div>
			<p class="error-msg <?= Is_error("password") ?>">Invalid input, please retry.</p>
		</div>

		<button type="submit">Register</button>
	</form>
</section>

<?php 
//require "partials/footer.php"; 
require "partials/footer.php";
?>
