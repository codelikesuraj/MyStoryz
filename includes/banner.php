<div class="banner">
	<!-- Banner display for Visitor -->
    <?php if(!isset($_SESSION['user'])): ?>
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
	<?php endif; ?>
	<!-- // Banner display for Visitor -->
        
    <!-- Banner display for Basic User -->
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'basic'): ?>
		<div class="registered">
			<div class="panel link">
				<a href="<?php echo BASE_URL.'/signup.php/?ref='.current_url().'&type=author'; ?>">Become An Author</a>
			</div>
			<div class="welcome">
		        <?php echo htmlentities($_SESSION['user']['username']); ?> | <a href="<?php echo BASE_URL.'/logout.php/?ref='.current_url(); ?>">Logout</a>
		    </div>
		</div>
	<?php endif; ?>
	<!-- // Banner display for Basic User-->

	<!-- Banner display for Author User -->
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'author'): ?>
		<div class="registered">
			<div class="panel link">
				<a href="<?php echo BASE_URL.'/author'; ?>">View Author Panel</a>
			</div>
			<div class="welcome">
		        <?php echo htmlentities($_SESSION['user']['username']); ?> | <a href="<?php echo BASE_URL.'/logout.php/?ref='.current_url(); ?>">Logout</a>
		    </div>
		</div>
	<?php endif; ?>
	<!-- // Banner display for Author User-->

    <!-- Banner display for Admin User -->
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
		<div class="registered">
			<div class="panel link">
				<a href="<?php echo BASE_URL.'/admin'; ?>">View Admin Panel</a>
			</div>
			<div class="welcome">
		        <?php echo htmlentities($_SESSION['user']['username']); ?> | <a href="<?php echo BASE_URL.'/logout.php/?ref='.current_url(); ?>">Logout</a>
		    </div>
		</div>
	<?php endif; ?>
	<!-- // Banner display for Admin User-->
</div>
