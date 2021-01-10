<?php include('../../../mystoryz/conn.php'); ?>
<?php include(ROOT_PATH.'/includes/public_function.php'); ?>
<?php checkAuthor(); ?>
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
		<div class="management-table" style="height: 50vw;overflow: scroll;">
			<table border="1">
				<thead>
					<th>S/N</th>
					<th>TITLE</th>
					<th>COMMENTS</th>
					<th>STATUS</th>
					<th>PUBLISHED</th>
					<th>MODIFIED</th>
					<th colspan="2">ACTION</th>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Wonders of medical science</td>
						<td>52</td>
						<td>Published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Africa and the internet</td>
						<td>0</td>
						<td>Not published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Unfinished house</td>
						<td>876</td>
						<td>Published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Nigeria and the Olympics</td>
						<td>14754</td>
						<td>Published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Wonders of medical science</td>
						<td>52</td>
						<td>Published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
					<tr>
						<td>6</td>
						<td>Africa and the internet</td>
						<td>0</td>
						<td>Not published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
					<tr>
						<td>7</td>
						<td>Unfinished house</td>
						<td>876</td>
						<td>Published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
					<tr>
						<td>8</td>
						<td>Nigeria and the Olympics</td>
						<td>14754</td>
						<td>Published</td>
						<td>00:00:00 00/00/00</td>
						<td>00:00:00 00/00/00</td>
						<td>edit</td>
						<td>delete</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- // Display management table -->

		<!-- Display footer -->
		<?php include(ROOT_PATH.'/includes/footer.php'); ?>
		<!-- // Display footer -->
	</div>
<?php include(ROOT_PATH.'/includes/html_bottom.php'); ?>
