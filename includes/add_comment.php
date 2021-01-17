<?php
// check if user is logged in
if(isset($_SESSION['user'])):
	// variable declaration
	global $conn;
	$errors = array();
	$story_id = fetchStoryId($_GET['title']);
	$user_id = $_SESSION['user']['id'];

	/************************
	*** Add user comment ***
	************************/
	if(isset($_POST['add_comment']))
	{
		// get and trim form inputs for whitespaces
		$comment = trim($_POST['content']);

		// check for errors from input
		if(empty($comment)){array_push($errors, 'Sorry, comment can not be empty!');}

		// check for duplicate entries by user
		if(count($errors)<1):
			$sql1 = "SELECT * FROM comment WHERE content=:content AND story_id=:story_id AND user_id = :user_id LIMIT 1";
			$result1 = $conn->prepare($sql1);
			$result1->execute(array(
				':content'=>$comment,
				':story_id'=>$story_id,
				':user_id'=>$user_id
			));
			$duplicate = $result1->fetch(PDO::FETCH_ASSOC);
			if($duplicate && is_array($duplicate)):
				array_push($errors, 'Duplicate comment entry !!!');
			endif;
		endif;

		// add user comment if there are no errors
		if(count($errors)<1):
			$sql1 = "INSERT INTO comment(content, story_id, user_id) VALUES (:content, :story_id, :user_id)";
			$result1 = $conn->prepare($sql1);
			$result1->execute(array(
				':content'=>$comment,
				':story_id'=>$story_id,
				':user_id'=>$user_id
			));

			$comment_id = $conn->LastInsertId();
			if(!$comment_id):
				array_push($errors, 'Error adding comment !!');
			else:
				$_SESSION['message'] = 'Comment added successfully';
			endif;
		endif;

	}
	/************************
	* // Add user comment*
	************************/
endif;
?>