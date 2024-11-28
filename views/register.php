<?php
require "partials/head.php";
require "partials/header.php";
?>

<section>
	<form action="controllers/registerController.php" method="post">
		<div>
			<label for="">First Name</label>
			<div class="input-container"><input type="text"></div>
		</div>
		<div>
			<label for="">Last Name</label>
			<div class="input-container"><input type="text"></div>
		</div>
		<div>
			<label for="">Email</label>
			<div class="input-container"><input type="text"></div>
		</div>
		<div>
			<label for="">Password</label>
			<div class="input-container"><input type="text"></div>
		</div>

		<button>Register</button>
	</form>
</section>

<?php require "partials/footer.php"; ?>
