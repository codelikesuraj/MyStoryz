<?php include('../../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php checkAuthor(); ?>
<?php include(ROOT_PATH.'/author/includes/create_edit.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Create</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/author/includes/author_nav.php'); ?>
		<!-- // Display navigation -->

		<div class="author-body">
			
			<!-- Display sidebar -->
			<?php include(ROOT_PATH.'/author/includes/author_sidebar.php'); ?>
			<!-- // Display sidebar -->

			<div class="create-form">
				
				<!-- Display story creation form -->
				<h3>Create Story</h3>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
					<p><?php include(ROOT_PATH.'/includes/error.php'); ?></p>
					<p><?php include(ROOT_PATH.'/includes/success.php'); ?></p>
					<label>
						Title<br/>
						<input type="text" name="story_title" placeholder="Add story title ..." value="<?php echo htmlentities($story_title); ?>" />
					</label><br/><br/>
					<label>
						Add story image (jpg/png)<br/>
						<input type="file" name="story_image" />
					</label><br/><br/>
					<label>
						Body<br/>
						<textarea name="story_content" placeholder="Story goes here ..." cols="40" rows="20"><?php echo htmlentities($story_content); ?></textarea>
					</label><br/><br/>
					<label>
						Set status: 
						<select name="story_status">
							<option value="unpublish" >Unpublish</option>
							<option value="publish" selected>Publish</option>
						</select>
					</label><br/><br/>
					<a href="<?php echo BASE_URL.'/author'; ?>">Cancel</a>
					<input type="submit" name="create_story" value="Create" />
				</form>
				
				<!-- Display story creation form -->
			</div>
		</div>

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
