<div class="banner">
	<!-- Banner display for Visitor -->
    <?php if(!isset($_SESSION['user'])): ?>
	<div class="unregistered">
		<div class="login-signup">
			<a class="login" href="<?php echo BASE_URL.'/login.php/?ref='.current_url(); ?>">Login</a>
			<a class="signup" href="<?php echo BASE_URL.'/signup.php/?ref='.current_url(); ?>">Create an account</a>
		</div>
	</div>
	<?php endif; ?>
	<!-- // Banner display for Visitor -->
        
    <!-- Banner display for Basic User -->
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'basic'): ?>
		<div class="registered">
			<div class="welcome">
		        <p>
		        	<?php echo ucfirst(htmlentities($_SESSION['user']['username'])); ?> | <a href="<?php echo BASE_URL.'/logout.php/?ref='.current_url(); ?>">Logout</a>
		        </p>
		    </div>
			<div class="panel-link">
				<a href="<?php echo BASE_URL.'/signup.php/?ref='.current_url().'&type=author'; ?>">Become An Author</a>
			</div>
		</div>
	<?php endif; ?>
	<!-- // Banner display for Basic User-->

	<!-- Banner display for Author User -->
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'author'): ?>
		<div class="registered">
			<div class="welcome">
		        <p>
		        	<?php echo ucfirst(htmlentities($_SESSION['user']['username'])); ?> | <a href="<?php echo BASE_URL.'/logout.php/?ref='.current_url(); ?>">Logout</a>
		        </p>
		    </div>
			<div class="panel-link">
				<a href="<?php echo BASE_URL.'/author'; ?>">Author Panel</a>
			</div>
		</div>
	<?php endif; ?>
	<!-- // Banner display for Author User-->

    <!-- Banner display for Admin User -->
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
		<div class="registered">
			<div class="welcome">
		        <p>
		        	<?php echo ucfirst(htmlentities($_SESSION['user']['username'])); ?> | <a href="<?php echo BASE_URL.'/logout.php/?ref='.current_url(); ?>">Logout</a>
		        </p>
		    </div>
			<div class="panel-link">
				<a href="<?php echo BASE_URL.'/admin'; ?>">View Admin Panel</a>
			</div>
		</div>
	<?php endif; ?>
	<!-- // Banner display for Admin User-->
</div>
