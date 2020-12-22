<div class="banner">
        <?php if(!isset($_SESSION['user']): ?>
	<!-- Banner display for Visitor -->
	<div class="unregistered">
		<div class="quotes">
			<p>
				What an elder sees when<br/>
				he is sitted, if a child<br/>
				should climb the tallest<br/>
				Iroko tree, he still<br/>
				would not see it<br/>
			</p>
		</div>
		<div class="login-signin">
			<a href="<?php echo BASE_URL.'/login.php/?ref='.current_url(); ?>">Login</a><br/>
			or<br/>
			<a href="<?php echo BASE_URL.'/signup.php/?ref='.current_url(); ?>">Sign Up</a>
		</div>
	</div>
	<!-- // Banner display for Visitor -->
        
        <?php else if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'author'): ?>
        <!-- Banner display for Basic -->
	<div class="registered">
		<div class="welcome">
		        Welcome {username}
		</div>
		<div class="panel link">
			<a href="<?php echo BASE_URL.'/signup.php/?ref='.current_url()&type=2; ?>">Become An Author</a>
		</div>
	</div>
	<!-- // Banner display for Basic -->
	<?php endif; ?>
</div>
