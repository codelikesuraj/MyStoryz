<?php include('../../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php include(ROOT_PATH.'/author/includes/author_functions.php'); ?>
<?php checkAuthor(); ?>
<?php $story = getStoryInfo($_SESSION['user']['id']); ?>
<?php include(ROOT_PATH.'/includes/html_head.php'); ?>
	<title>MyStoryz | Manage</title>
</head>
<body>
	<div class="container">

		<!-- Display navigation -->
		<?php include(ROOT_PATH.'/author/author_nav.php'); ?>
		<!-- // Display navigation -->

		<!-- Display sidebar -->
		<?php include(ROOT_PATH.'/author/author_sidebar.php'); ?>
		<!-- // Display sidebar -->

		<!-- Display management table -->
		<div class="management-table" style="height: 50vw; overflow: scroll;">
			<table border="1">
				<thead>
					<th>S/N</th>
					<th>TITLE</th>
					<th>COMMENTS</th>
					<th>STATUS</th>
					<th>CREATED</th>
					<th>MODIFIED</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>
					<?php if(is_array($story) && count($story)>0): ?>
						<?php foreach($story as $single => $data): ?>
							<tr>
								<td><?php echo ($single+1); ?></td>
								<td><?php echo $data['title']; ?></td>
								<td><?php echo $data['comment']; ?></td>
								<td><?php echo $data['published']; ?></td>
								<td><?php echo $data['created']; ?></td>
								<td><?php echo $data['updated']; ?></td>
								<td>edit</td>
								<td>delete</td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="8">No story yet !!!</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<!-- // Display management table -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
