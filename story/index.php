<?php include('../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php include(ROOT_PATH.'/includes/add_comment.php'); ?>

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
<?php $comment = fetchAllComment($_GET['title']);?>
<!-- // Fetch all comments -->

<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo htmlentities($story['title']); ?></title>
	<meta property="og:type" content="article">
	<meta property="og:title" content="<?php echo htmlentities($story['title']); ?>">
	<meta property="og:url" content="<?php echo BASE_URL."/story/?title=".$story['slug'];?>">
	<!--<meta property="og:image" content="<?php echo BASE_URL.'/static/images/'.$story['image']; ?>">-->
	<meta property="og:description" content="Published on MyStoryz by <?php echo ucfirst(htmlentities($story['author_info']['first_name'])).' '.ucfirst(htmlentities($story['author_info']['last_name'])); ?>">
	<meta property="og:site_name" content="MyStoryz"/>

	<meta name="twitter:title" content="<?php echo htmlentities($story['title']); ?>">
	<meta name="twitter:description" content="Published by <?php echo ucfirst(htmlentities($story['author_info']['first_name'])).' '.ucfirst(htmlentities($story['author_info']['last_name'])); ?>">
	<meta name="twitter:url" content="<?php echo BASE_URL."/story/?title=".$story['slug'];?>">
</head>
<body>
	<div class="container">
		
		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display success message if any -->
		<?php include(ROOT_PATH.'/includes/message.php'); ?>

		<!-- Display banner -->
		<p><?php include(ROOT_PATH.'/includes/banner.php'); ?></p>
		<!-- // Display banner -->

		<!-- Story content -->
		<div class="story-content">
			<div class="story-info">
				<!-- display story title -->
				<h2><?php echo strtoupper(htmlentities($story['title'])); ?></h2>
				<br/>
				<!-- display story publish date -->

				<p><?php echo htmlentities(date('M j, Y', strtotime($story['created']))); ?><strong> || </strong><?php echo '<strong>'.ucfirst(htmlentities($story['author_info']['first_name'])).' '.ucfirst(htmlentities($story['author_info']['last_name'])).'</strong>'.' @'.htmlentities($story['author_info']['username']); ?></p>
			</div>
			<br/>
			<div class="story-image">
				<!-- display story image -->
				<img style="width: 100%;" src="<?php echo BASE_URL.'/static/images/'.htmlentities($story['image']); ?>" />
			</div>
			<br/>
			<div class="story-text">
				<!-- display story content -->
				<p><?php echo htmlentities($story['content']); ?></p>
			</div>
		</div>
		<hr>
		<!-- // Story content -->

		<!--
		// This is a Javascript function to print page the post.
		// As at the time of adding this comment here, I could 
		// not figure out a way to print only the post (which includes 
		// post's image, post's author info, post's title, post's 
		// content and post's published date) excluding the 
		// comments and other irrelevant information.
		// Here is the simple function to print the whole page

		<button onclick="print();">Print</button>

		// Now I just how to figure out how to print only the
		// above stated information :(
		-->

		<!-- Comment section -->
		<div class="comment" id="comment-submit">
			<h3>Comments(<?php echo $comment=='error'?'0':count($comment);?>)</h3>

			<!-- Display comment box -->
			<?php include(ROOT_PATH.'/includes/comment_box.php'); ?>
			<!-- // Display comment box -->

			<!-- Display available comments -->
			<?php if($comment !== 'error'): ?>
				<div class="available-comments">
					<?php foreach($comment as $key): ?>
						<div class="comment-card">
							<div class="user-info">
								<div class="user-image">
									<img src="<?php echo BASE_URL.'/static/images/'.htmlentities($key['user_info']['image']); ?>">
								</div>
								<div class="user-data">
									<div class="name" style="color: #444;">
										<?php echo '@'. htmlentities($key['user_info']['username']); ?>
									</div>
									<div class="date">
										<?php echo htmlentities(date('M j, Y', strtotime($key['created']))); ?>
									</div>
								</div>
							</div>
							<div class="user-comment">
								<p><?php echo htmlentities($key['content']); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else: ?>
				<div class="comment-card">
					<p>Be the first to comment!!!</p>
				</div>
			<?php endif; ?>
			<!-- // Display available comments -->

		</div>
		<br/>
		<br/>
		<!-- // Comment section -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>