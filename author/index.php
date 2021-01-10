<?php include('../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php checkAuthor(); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Author</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/author/author_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display sidebar -->
		<?php include(ROOT_PATH.'/author/author_sidebar.php'); ?>
		<!-- // Display sidebar -->

		<!-- Display account information -->
		<h2>Account Information and Statistics</h2>
		<p><strong>First Name:</strong> <?php echo htmlentities($_SESSION['user']['first_name']);?></p>
		<p><strong>Last Name:</strong> <?php echo htmlentities($_SESSION['user']['last_name']);?></p>
		<p><strong>Username:</strong> <?php echo htmlentities($_SESSION['user']['username']);?></p>
		<p><strong>Email:</strong> <?php echo htmlentities($_SESSION['user']['email']);?></p>
		<p><strong>Created on:</strong> <?php echo htmlentities($_SESSION['user']['created']);?></p>
		<p><strong>Published Storyz:</strong> 20</p>
		<p><strong>Number of user comments on storyz:</strong> 540</p>
		<!-- // Display account information -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
