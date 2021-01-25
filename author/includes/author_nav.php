<nav class="author_nav">
	<div class="logo">
		<h1><a href="<?php echo BASE_URL; ?>">Mystoryz</a></h1>
	</div>
	<div class="nav-links">
		<a class="home" href="<?php echo BASE_URL.'/author/'; ?>">Panel Home</a>
		<div class="name">
			<?php echo htmlentities(
				$_SESSION['user']['first_name']
				.' '
				.$_SESSION['user']['last_name']
				.' ('
				.$_SESSION['user']['username']
				.') | '
			);?>
			<a href="<?php echo BASE_URL.'/logout.php'; ?>">Logout</a>
		</div>
	</div>
</nav>