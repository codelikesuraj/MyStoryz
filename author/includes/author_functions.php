<?php

// get number of published storyz
function getPublishedCount(int $id)
{
	global $conn;
	$published_count = 0;
	$user_id = intval($id, 10);
	$sql1 = "SELECT id from story WHERE (author_id = :user_id)";
	$result1 = $conn->prepare($sql1);
	$result1->execute(array(':user_id'=>$user_id));
	$row = $result1->fetchAll(PDO::FETCH_ASSOC);
	if(is_array($row)):
		$published_count = count($row);
	endif;
	return $published_count;
}

// get cumulative number of comments on published storyz by one author
function getTotalCommentCount(int $id)
{
	global $conn;
	$comment_count = 0;
	$user_id = intval($id, 10);
	$sql1 = "SELECT * FROM comment JOIN story JOIN users ON comment.story_id = story.id AND story.author_id = users.id WHERE users.id = :user_id";
	$result1 = $conn->prepare($sql1);
	$result1->execute(array(':user_id'=>$user_id));
	$row = $result1->fetchAll(PDO::FETCH_ASSOC);
	if(is_array($row)):
		$comment_count = count($row);
	endif;
	return $comment_count;
}

// get number of comments on a single story
function getSingleCommentCount(int $id)
{
	global $conn;
	$comment_count = 0;
	$story_id = intval($id, 10);
	$sql1 = "SELECT * FROM comment WHERE (story_id = :story_id)";
	$result1 = $conn->prepare($sql1);
	$result1->execute(array(':story_id'=>$story_id));
	$row1 = $result1->fetchAll(PDO::FETCH_ASSOC);
	if(is_array($row1)):
		$comment_count = count($row1);
	endif;
	return $comment_count;
}

// get story information by one author
function getStoryInfo(int $id)
{
	global $conn;
	$final_info = array();
	$author_id = intval($id, 10);
	$sql1 = "SELECT id, title, published, created, updated FROM story WHERE author_id = :author_id";
	$result1 = $conn->prepare($sql1);
	$result1->execute(array(':author_id'=>$author_id));
	$row1 = $result1->fetchAll(PDO::FETCH_ASSOC);
	if(is_array($row1)):
		$final_info = $row1;
		foreach($row1 as $story => $data):
			$final_info[$story]['comment'] = getSingleCommentCount($data['id']);
			switch ($data['published']) {
				case '0':
					$final_info[$story]['published'] = 'Not published';
					break;
				case '1':
					$final_info[$story]['published'] = 'Published';
					break;
			}
		endforeach;
		return $final_info;
	else:
		return 0;
	endif;
}

?>