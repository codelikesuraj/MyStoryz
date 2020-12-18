<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>Sign Up | MyStoryz</title>
</head>
<body>
	<div class="container">
		
		<!-- display navigation -->
		<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
		<!-- //display navigation -->


		<!-- Sign-up/Registration Form for new user -->
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
		    <p>Already have an account ? <a href="login.php">Sign In</a></p>
		</form>
		<!-- // Sign-up/Registration Form for new user -->

		<!-- display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // display footer -->

	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>