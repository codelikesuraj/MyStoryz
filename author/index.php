<?php include('../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php include(ROOT_PATH.'/author/includes/author_functions.php'); ?>
<?php checkAuthor(); ?>
<?php $storyz_count = getPublishedCount($_SESSION['user']['id']);?>
<?php $comment_count = getTotalCommentCount($_SESSION['user']['id']);?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Author</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/author/author_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display any success message -->
		<?php include(ROOT_PATH.'/includes/message.php'); ?>

		<div class="author-body">
			
			<!-- Display sidebar -->
			<?php include(ROOT_PATH.'/author/author_sidebar.php'); ?>
			<!-- // Display sidebar -->

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
				</div>
				<!-- // Display account information -->
			</div>
		</div>

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
