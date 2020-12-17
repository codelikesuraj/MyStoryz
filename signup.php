<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>Sign Up | MyStoryz</title>
</head>
<body>
	<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
	<div class="container">
		<form method="post">
			<h2>Sign Up</h2>
			<label>
				<input type="text" name="email" placeholder="email" required />
			</label><br/>
			<label>
				<input type="text" name="username" placeholder="username" required />
			</label><br/>
			<label>
				<input type="password" name="password1" placeholder="
				password" required />
			</label><br/>
			<label>
				<input type="password" name="password2" placeholder="
				retype password" required />
			</label><br/>
			<input type="submit" name="login" value="Sign In" />
		</form>
		<p>Already have an account ? <a href="login.php">Sign In</a></p>
	</div>
	<?php include(ROOT_PATH.'/includes/footer.php'); ?>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>