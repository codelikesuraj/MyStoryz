<?php if(!empty($pwd_errors)): ?>
	<div class="error">
		<p>
			<?php
			foreach($pwd_errors as $error):
				echo $error.'<br/>';
			endforeach;
			unset($pwd_errors);
			?>
		</p>
	</div>
<?php endif; ?>