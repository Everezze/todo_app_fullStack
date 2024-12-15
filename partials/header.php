<header>
	<nav>
		<ul>
			<li>
			<a href=<?=$proj_name?> >Home</a>
			</li>
			<li>
			<a href=<?= $proj_name . "/about"?> >About Us</a>
			</li>
			<li>
				<a href=<?= $proj_name . "/contact"?> >Contact Us</a>
			</li>
		</ul>
	<?php if($_SESSION["user"]): ?>
		<div class="profile-container">
			<span></span>
			<img src="" alt="">
			<span class="board"></span>
		</div>
	<?php endif; ?>
	</nav>
</header>
