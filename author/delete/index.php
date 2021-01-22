<?php include('../../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php checkAuthor(); ?>
<?php
if(!isset($_GET['title'])):
	header('Location: '.BASE_URL.'/author/manage/');
	exit(0);
endif;
?>
<?php include(ROOT_PATH.'/author/includes/delete.php'); ?>

<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Delete</title>
</head>
<body>
	<div class="container">

		<!-- Display delete prompt -->
		<div class="delete-prompt">
			<h2>Delete Confirmation !!!"</h2>
			<p>You are about to delete "<strong style="text-decoration: underline;"><?php echo htmlentities($del_story_title); ?></strong>", the following actions would take place:</p>
			<ul>
				<li>all comments and replies under this story would be deleted,</li>
				<li>the data associated with the story would be completely removed from Mystoryz's database, and</li>
				<li>no data will be saved in any archive or recoverable system</li>
			</ul>
			<p>To proceed, copy and paste the text " <strong class="copy"><?php echo htmlentities($del_author_username); ?>/<?php echo htmlentities($del_story_slug); ?></strong> " into the box below.
			</p>
			<form method="post" autocomplete="off">
				<?php include(ROOT_PATH.'/includes/error.php'); ?>
				<div class="response">
					<label>
						<input class="paste" type="text" name="confirm_text" placeholder="copy and paste text here" required>
					</label><br/>
					<div class="selection">
						<a href="<?php echo BASE_URL.'/author/manage'; ?>">Cancel</a>
						<input type="submit" name="delete_story" value="Delete">
					</div>
				</div>
			</form>
		</div>
		<!-- Display delete prompt -->
	</div>

<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>