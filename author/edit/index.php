<?php include('../../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php checkAuthor(); ?>
<?php
if(!isset($_GET['title'])):
	header('Location: '.BASE_URL.'/author/manage/');
	exit(0);
endif;
?>
<?php include(ROOT_PATH.'/author/includes/create_edit.php'); ?>

<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Edit</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/author/includes/author_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display story creation form -->
		<h2>Edit Story</h2>
		<form action="<?php echo BASE_URL.'/author/edit/?title='.$_GET['title']; ?>" method="post">
			<p><?php include(ROOT_PATH.'/includes/error.php'); ?></p>
			<input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>" />
			<label>
				Title<br/>
				<input type="text" name="edit_title" placeholder="Add story title ..." value="<?php echo htmlentities($edit_title); ?>" />
			</label><br/><br/>
			<label>
				Body<br/>
				<textarea name="edit_content" placeholder="Story goes here ..." cols="40" rows="20"><?php echo htmlentities($edit_content); ?></textarea>
			</label><br/><br/>
			<label>
				Set new status: 
				<select name="edit_status">
					<option value="unpublish" >Unpublish</option>
					<option value="publish" selected>Publish</option>
				</select>
			</label><br/><br/>
			<a href="<?php echo BASE_URL.'/author/manage'; ?>">Cancel</a>
			<input type="submit" name="edit_story" value="Update" />
		</form>
		<!-- Display story creation form -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
