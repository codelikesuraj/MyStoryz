<?php include('conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php $story = getAllStory(); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="MyStoryz by Abdulbaki Suraj"/>
	<meta property="og:title" content="MyStoryz"/>
	<meta property="og:url" content="<?php echo BASE_URL;?>">
	<!--<meta property="og:image" content="<?php echo BASE_URL;?>/static/images/urlimage.jpg" >-->
	<meta property="og:description" content="MyStoryz by Abdulbaki Suraj"/>
	<meta property="og:site_name" content="MyStoryz"/>
	<meta property="og:type" content="website"/>

	<meta name="twitter:title" content="MyStoryz">
	<meta name="twitter:description" content="MyStoryz by Abdulbaki Suraj">
	<meta name="twitter:url" content="<?php echo BASE_URL;?>">

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
							.ucfirst(htmlentities($key['story_author']['first_name']))
							.' '
							.ucfirst(htmlentities($key['story_author']['last_name']))
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

					<!-- Share widgets and/or links -->
					<hr/>
					<p style="text-align: center;">
						Share on 
						<a style="text-decoration: underline; color: rgb(29, 161, 242);" href="https://twitter.com/intent/tweet?text=Read about <?php echo htmlentities($story['title']);?> published on MyStoryz by <?php echo ucfirst(htmlentities($story['author_info']['first_name'])).' '.ucfirst(htmlentities($story['author_info']['last_name']));?>&url=<?php echo current_url();?>"><strong>Twitter</strong></a> or 
						<a style="text-decoration: underline; color: rgb(29, 222, 161);" href="whatsapp://send?text=Read about <?php echo htmlentities($key['title']);?> published on MyStoryz by <?php echo ucfirst(htmlentities($key['story_author']['first_name'])).' '.ucfirst(htmlentities($key['story_author']['last_name'])).current_url();?>"><strong>Whatsapp</strong></a>
					</p>
					<br/>
					<!-- Share widgests and/or links -->
				</div>
			<?php endforeach; ?>
		</div>
		<!-- // Display list of recent storyz -->
		
		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>