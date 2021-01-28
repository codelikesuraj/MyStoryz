<?php include('../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php include(ROOT_PATH.'/admin/includes/admin_functions.php'); ?>
<?php checkAdmin(); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>Admin | Mystoryz</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/admin/includes/admin_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display any success message -->
		<?php include(ROOT_PATH.'/includes/message.php'); ?>
		<!-- // Display any success message -->

		<div class="admin-body">

			<!-- Display admin sidebar -->
			<?php include(ROOT_PATH.'/admin/includes/admin_sidebar.php'); ?>
			<!-- // Display admin sidebar -->

		</div>

	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
