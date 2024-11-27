<?php
require "partials/head.php";
require "partials/header.php";
?>

<main>
	<h1 class="tac">Welcome to homepage</h1>
	<div class="container">
		<h2 class="tac">Connect or register ?</h2>
		<p class="options">
			<a href=<?= $proj_name . "/connect"?> >I want to connect</a>
			<a href=<?= $proj_name . "/register"?> >I want to register</a>
		</p>
	</div>
</main>

<?php require "partials/footer.php"; ?>
