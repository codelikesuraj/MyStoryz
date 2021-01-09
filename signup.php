<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/login_signup.php'); ?>
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

			<!-- Display sign up errors -->
			<?php include(ROOT_PATH.'/includes/error.php'); ?>
			<!-- \\ Display sign up errors -->

			<!-- Display success messages -->
			<?php include(ROOT_PATH.'/includes/message.php'); ?>
			<!-- \\ Display success messages -->

			<!-- Display for Author sign up -->
			<?php if(isset($_GET['type']) && $_GET['type']=='2'): ?>
				<input type="hidden" name="type" value="author">
			<!-- \\ Display for Author sign up -->

			<label>
				<input type="email" name="email" placeholder="email" value="<?php echo htmlentities($email); ?>" required />
			</label><br/>
			<label>
				<input type="text" name="username" placeholder="username" value="<?php echo htmlentities($username); ?>" required />
			</label><br/>
			<label>
				<input type="password" name="password1" placeholder="
				password" value="<?php echo htmlentities($password1); ?>" required />
			</label><br/>
			<label>
				<input type="password" name="password2" placeholder="
				retype password" value="<?php echo htmlentities($password2); ?>" required />
			</label><br/>
			<input type="submit" name="signup" value="Sign Up" />
		    <p>
		    	Already have an account ? 
		    	<?php if(!empty($source)): ?>
		    		<a href="<?php echo BASE_URL.'/login.php?ref='.$source; ?>">Sign In</a>
		    	<?php else: ?>
		    		<a href="login.php">Sign In</a>
		    	<?php endif; ?>
		    </p>
		</form>
		<!-- // Sign-up/Registration Form for new user -->

		<!-- display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // display footer -->

	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>