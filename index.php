<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php $story = getAllStory(); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Home</title>
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
				<?php foreach($story as $key):?>
				<li>
					<div class="story-card">
						<div class="author-info">

							<!-- display author profile (image & username) and story publish date-->
							<img class="author-image" src="<?php echo BASE_URL.'/static/images/'.$key['story_author']['image']; ?>" /><?php echo $key['story_author']['username']; ?><br/>Published on <?php echo date('M Y', strtotime($key['created'])); ?>
						</div>
						<a href="<?php echo BASE_URL.'/story?title='.$key['slug']; ?>">

							<!-- display story image -->
							<div class="story-image" >
								<img style="width: 50%; height: auto;" src="<?php echo BASE_URL.'/static/images/'.$key['image']; ?>">
							</div>
							<div class="story-info">

								<!-- display story title -->
								<h3 class="story-title"><?php echo $key['title']; ?></h3>
								<p class="story-dummy">Read more...</p>
							</div>
						</a>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
		<!-- // Display list of recent storyz -->
		
		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>