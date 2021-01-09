<?php if(!empty($errors)): ?>
	<div class="error">
		<p>
			<?php
			foreach($errors as $error):
				echo $error.'<br/>';
			endforeach;
			unset($errors);
			?>
		</p>
	</div>
<?php endif; ?>