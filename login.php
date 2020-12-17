<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>Login | MyStoryz</title>
</head>
<body>
	<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
	<div class="container">
		<form method="post">
			<h2>Login</h2>
			<label>
				<input type="text" name="username" placeholder="username or email" required />
			</label><br/>
			<label>
				<input type="password" name="password" placeholder="
				password" required />
			</label><br/>
			<input type="submit" name="login" value="Sign In" />
		</form>
		<p>Don't have an account yet ? <a href="signup.php">Create one</a></p>
	</div>
	<?php include(ROOT_PATH.'/includes/footer.php'); ?>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>