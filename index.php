<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php $story = getAllStory(); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="MyStoryz by Abdulbaki Suraj"/>
	<meta property="og:site_name" content="MyStoryz"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="MyStoryz"/>
	<meta property="og:description" content="MyStoryz by Abdulbaki Suraj"/>
	<!--<meta property="og:image" content="https://abdulbakisuraj.xyz/mystoryz/images/" />-->
	<meta property="og:url" content="https://www.abdulbakisuraj.xyz/mystoryz/"/>
	<title>MyStoryz</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/includes/public_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display success message if any -->
		<?php include(ROOT_PATH.'/includes/message.php'); ?>

		<!-- Display banner -->
		<?php include(ROOT_PATH.'/includes/banner.php'); ?>
		<!-- // Display banner -->

		<!-- Display list of recent storyz -->
		<h2>Recent Storyz ...</h2>
		<hr>
		<div class="story-list">
			<?php foreach($story as $key):?>
				<div class="story-card">

					<!-- display story image -->
					<div class="story-image" >
						<img src="<?php echo BASE_URL.'/static/images/'.$key['image']; ?>">
					</div>

					<div class="author-info">
						
						<!-- display author profile (image & username) and story publish date-->
						<div class="author-image">
							<img src="<?php echo BASE_URL.'/static/images/'.$key['story_author']['image']; ?>" >
						</div>
						<div class="group">
						<div class="author-name">
							<?php echo 
							'<strong>'
							.htmlentities($key['story_author']['first_name'])
							.' '
							.htmlentities($key['story_author']['last_name'])
							.'</strong>'
							.' @'
							.htmlentities($key['story_author']['username']);
							?>
						</div>
						<div class="date">
							<?php echo date('M j, Y', strtotime($key['created'])); ?>
						</div>
					</div>
					</div>

						
					<!-- display story title -->
					<div class="story-info">
						<a href="<?php echo BASE_URL.'/story?title='.$key['slug']; ?>">
							<h2 class="story-title"><?php echo strtoupper(htmlentities($key['title'])); ?></h2>
							<div><p class="story-content"><?php echo htmlentities($key['content']); ?></p></div>
							<strong>...</strong>
							<p style="text-align: center; text-decoration: underline;" class="story-dummy">Read more</p>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<!-- // Display list of recent storyz -->
		
		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>