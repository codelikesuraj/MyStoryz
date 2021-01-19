<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/login_signup.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login | MyStoryz</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Login form -->
		<form method="post" class="myform" autocomplete="off">
			<h2>Login</h2>
			<?php include(ROOT_PATH.'/includes/error.php'); ?>
			<label>
				<input type="text" name="username" placeholder="username or email" value="<?php echo htmlentities($username); ?>" required />
			</label><br/>
			<label>
				<input type="password" name="password" placeholder="password" required />
			</label><br/>
			<input class="login-btn" type="submit" name="login" value="Sign In" />
			<p>Don't have an account yet ? <a href="<?php echo BASE_URL.'/signup.php?ref='.$source; ?>">Create one</a></p>
		</form>
		<!-- // Login form -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->

	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>