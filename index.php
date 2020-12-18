<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>Home | MyStoryz</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display banner -->
		<?php include(ROOT_PATH.'/includes/banner.php'); ?>
		<!-- // Display banner -->

		<!-- Display list of recent storyz -->
		<div class="story-list">
			<h2>Recent Storyz ...</h2>
			<ul>
				<li>
					<div class="story-card">
						<div class="story-header">
							<img class="author-image" src="profile.jpg" />
							<div class="author-info">
								<p class="author-name">Author name</p>
								<p class="publish-date">Published on {date}</p>
							</div>
						</div>
						<a href="<?php echo BASE_URL.'/story?title=story-title'; ?>">
							<div class="story-image" >
								<img src="story-image.jpg">
							</div>
							<div class="story-info">
								<p class="story-title">Story title</p>
								<p class="story-dummy">Read more...</p>
							</div>
						</a>
					</div>
				</li>
			</ul>
		</div>
		<!-- // Display list of recent storyz -->
		
		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>