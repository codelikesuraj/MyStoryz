<div class="comment-box">

	<!-- Comment box for logged-out user -->
	<?php if(!isset($_SESSION['user'])): ?>
		<div class="not-logged-in">
			<p>
				<a href="<?php echo BASE_URL.'/login.php/?ref='.current_url(); ?>">Add a comment</a>
			</p>
		</div>
	<?php endif; ?>
	<!-- // Comment box for Visitor -->

	<!-- Comment box for Logged-in user -->
	<?php if(isset($_SESSION['user'])): ?>
		<div class="logged-in">
			<?php include(ROOT_PATH.'/includes/error.php'); ?>
			<form method="post" autocomplete="off" action="<?php echo current_url().'#comment-submit'; ?>">
				
				<label>
					<textarea cols="40" rows="7" name="content" placeholder="Start typing ..."></textarea>
				</label><br/>
				<input type="submit" name="add_comment" value="Comment" />
			</form>
		</div>
	<?php endif; ?>
	<!-- // Comment box for Logged-in user -->
</div>