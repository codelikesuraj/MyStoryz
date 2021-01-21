<?php if(!empty($success)): ?>
	<div class="success">
		<p>
			<?php
			echo $success;
			unset($success);
			?>
		</p>
	</div>
<?php endif; ?>