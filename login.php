<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>Login | MyStoryz</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Login form -->
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
			<p>Don't have an account yet ? <a href="signup.php">Create one</a></p>
		</form>
		<!-- // Login form -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->

	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>