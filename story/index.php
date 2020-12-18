<?php include('../conn.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title><?php echo 'Story Title'; ?> | MyStoryz</title>
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
				<img src="story-image.jpg" />
			</div>
			<div class="story-info">
				<h2>Story Title</h2>
				<p>Published on {date}</p>
			</div>
			<div class="story-text">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
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