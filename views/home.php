<?php
require "partials/head.php";
require "partials/header.php";
?>

<?php if(!isset($_SESSION["user"])): ?>
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
<?php else: ?>
	<main>
		<h1 class="tac">Dashboard</h1>
		<h2> Your todo lists: </h2>
		<p class="list-container">
			<?php foreach($list_data as $list):?>
			<span class="list">
				<?= $list[0]["type"] ?>
			</span>
			<?php endforeach; ?>
		</p>
		<article>
			<?php foreach($list_data[0] as $task): ?>
			<div class="task-container">
				<div class="task df">
					<div class="task-circle"></div>
					<div class="task-content"> <?= $task["description"] ?> </div>
				</div>
				<div class="bin">
					<img class="cross-img" src="assets/snd-cross.jpg" alt="">
				</div>
			</div>
			<?php endforeach;  ?>
		</article>
	</main>
<?php endif; ?>

<?php require "partials/footer.php"; ?>
