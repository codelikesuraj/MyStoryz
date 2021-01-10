<?php include('../../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>

<!-- ensure user is author -->
<?php checkAuthor(); ?>

<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Create</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/author/author_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display sidebar -->
		<?php include(ROOT_PATH.'/author/author_sidebar.php'); ?>
		<!-- // Display sidebar -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
