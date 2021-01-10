<?php include('../conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>

<!-- ensure user is author -->
<?php checkAdmin(); ?>

<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>Admin | Mystoryz</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/admin/admin_nav.php'); ?>
		<!-- // Display navigation -->

	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
