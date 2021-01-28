<?php
include('../../mystoryz/conn.php');
include(ROOT_PATH.'/includes/public_function.php');
include(ROOT_PATH.'/author/includes/author_functions.php');
// ensure user is an author
checkAuthor();
// get number of published posts by author
$storyz_count = getPublishedCount($_SESSION['user']['id']);
// get total comments on all posts by author
$comment_count = getTotalCommentCount($_SESSION['user']['id']);
// process password change 
changePassword();
?>

<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Author</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/author/includes/author_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display any success message -->
		<?php include(ROOT_PATH.'/includes/message.php'); ?>
		<!-- // Display any success message -->

		<div class="author-body">
			
			<!-- Display author sidebar -->
			<?php include(ROOT_PATH.'/author/includes/author_sidebar.php'); ?>
			<!-- // Display author sidebar -->

			<div class="author-panel-info">
				<!-- Display account information -->
				<h3>Account Information and Statistics</h3>
				<div class="info">
					<p><strong>First Name:</strong> <?php echo htmlentities($_SESSION['user']['first_name']);?></p>
					<p><strong>Last Name:</strong> <?php echo htmlentities($_SESSION['user']['last_name']);?></p>
					<p><strong>Username:</strong> <?php echo htmlentities($_SESSION['user']['username']);?></p>
					<p><strong>Email:</strong> <?php echo htmlentities($_SESSION['user']['email']);?></p>
					<p><strong>Created on:</strong> <?php echo htmlentities($_SESSION['user']['created']);?></p>
					<p><strong>Published Storyz:</strong> <?php echo $storyz_count; ?></p>
					<p><strong>Total user comments:</strong> <?php echo $comment_count; ?></p>
					<br>

					<!-- Form to change password -->
					<form id="pwd" method="post" action="<?php echo $_SERVER['PHP_SELF'].'#pwd'; ?>">
						<h3>Change password</h3>

						<!-- Display password change errors -->
						<?php include(ROOT_PATH.'/includes/pwderrors.php'); ?>
						<!-- // Display password change errors -->

						<br/>
						<label>
							Old password: <input type="password" name="old_password" />
						</label><br/><br/>
						<label>
							New password: <input type="password" name="new_password1" />
						</label><br/><br/>
						<label>
							Retype new password: <input type="password" name="new_password2" />
						</label><br/><br/>
						<input type="submit" name="pwd_change" value="Click me">
					</form>
					<!-- // Form to change password -->

				</div>
				<!-- // Display account information -->

			</div>
		</div>

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
