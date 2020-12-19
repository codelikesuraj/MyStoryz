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
				<img src="<?php echo BASE_URL.'/static/images/'.$story['image']; ?>" />
			</div>
			<div class="story-info">
				<h2><?php echo $story['title']; ?></h2>
				<p>Published on <?php echo date('M Y', strtotime($story['created'])); ?></p>
			</div>
			<div class="story-text">
				<p><?php echo $story['content']; ?></p>
			</div>
		</div>
		<!-- // Story content -->

		<!-- Comment section -->
		<div class="comment">

			<!-- Display comment box -->
			<?php include(ROOT_PATH.'/includes/comment_box.php'); ?>
			<!-- // Display comment box -->

			<!-- Display available comments -->
			<ul class="available-comments">
				<li>
					<div class="comment-card">
						<div class="user-info">
							<span><img src=""></span>
							<span>Username 1</span>
							<span>{comment date}</span>
						</div>
						<div class="user-comment">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						</div>
					</div>
				</li>
				<li>
					<div class="comment-card">
						<div class="user-info">
							<span><img src=""></span>
							<span>Username 2</span>
							<span>{comment date}</span>
						</div>
						<div class="user-comment">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						</div>
					</div>
				</li>
				<li>
					<div class="comment-card">
						<div class="user-info">
							<span><img src=""></span>
							<span>Username 3</span>
							<span>{comment date}</span>
						</div>
						<div class="user-comment">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						</div>
					</div>
				</li>
				<li>
					<div class="comment-card">
						<div class="user-info">
							<span><img src=""></span>
							<span>Username 4</span>
							<span>{comment date}</span>
						</div>
						<div class="user-comment">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
						</div>
					</div>
				</li>
			</ul>
			<!-- // Display available comments -->

		</div>
		<!-- // Comment section -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>