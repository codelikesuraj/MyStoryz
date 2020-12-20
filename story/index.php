<?php include('../conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>

<!-- Fetch story from title in GET parameter-->
<?php
if(isset($_GET) && !empty($_GET['title'])):
	$story = getSingleStory($_GET['title']);
	if($story === 'error'):
		header('location: '.BASE_URL);
		exit(0);
	endif;
else:
	header('location: '.BASE_URL);
	exit(0);
endif;
?>
<!-- // Fetch story from title in GET parameter -->

<!-- Fetch all comments -->
<?php $comment = fetchAllComment($_GET['title']); ?>
<!-- // Fetch all comments -->

<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | <?php echo $story['title']; ?></title>
</head>
<body>
	<div class="container">
		
		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display banner -->
		<?php include(ROOT_PATH.'/includes/banner.php'); ?>
		<!-- // Display banner -->

		<!-- Story content -->
		<div class="story-content">
			<div class="story-image">
				<!-- display story image -->
				<img src="<?php echo BASE_URL.'/static/images/'.$story['image']; ?>" />
			</div>
			<div class="story-info">
				<!-- display story title -->
				<h2><?php echo $story['title']; ?></h2>
				<!-- display story publish date -->
				<p>Published on <?php echo date('M Y', strtotime($story['created'])); ?></p>
			</div>
			<div class="story-text">
				<!-- display story content -->
				<p><?php echo $story['content']; ?></p>
			</div>
		</div>
		<!-- // Story content -->

		<!-- Comment section -->
		<div class="comment">
			<h2>Comments(<?php echo count($comment); ?>)</h2>

			<!-- Display comment box -->
			<?php include(ROOT_PATH.'/includes/comment_box.php'); ?>
			<!-- // Display comment box -->

			<!-- Display available comments -->
			<ul class="available-comments">
				<?php foreach($comment as $key): ?>
					<li>
						<div class="comment-card">
							<div class="user-info">
								<span><img src="<?php echo BASE_URL.'/static/images/'.$key['user_info']['image']; ?>"></span>
								<span><?php echo $key['user_info']['username']; ?></span>
								<span><?php echo date('M Y', strtotime($key['created'])); ?></span>
							</div>
							<div class="user-comment">
								<p><?php echo $key['content']; ?></p>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<!-- // Display available comments -->

		</div>
		<!-- // Comment section -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>