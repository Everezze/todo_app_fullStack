<?php
require "partials/head.php";
require "partials/header.php";
?>

<main>
	<h1 class="tac">Welcome to todo_app</h1>
	<section class="register-section">
		<h2>Connect here : </h2>
		<form action= <?= $proj_name . "/connect" ?> method="post">
			<div>
				<label for="email">Your Email: </label>
				<div class="input-container">
					<input type="text" name="email" id="email">
				</div>
			</div>
			<div>
				<label for="password">Your password</label>
				<div class="input-container">
					<input type="text" name="password" id="password">
				</div>
			</div>
			<p class="error-msg <?= check_inputs("password",$password) ?>">Wrong combination, please retry.</p>
			<button>Connect</button>
			<div>
			<p>No account yet ? <a href= <?= $proj_name . "/register" ?> >Register here.</a> </p>
			</div>
		</form>
	</section>
</main>

<?php require "partials/footer.php"; ?>
