<?php

function getAllStory()
{
	global $conn;
	$sql = "SELECT * FROM story WHERE published=1 ORDER BY created DESC";
	$query = $conn->query($sql);
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	$final_result = array();
	foreach($result as $key):
		// fetch the author that created each story
		$key['story_author'] = getAuthor($key['author_id']);

		// add author details as an array to key
		array_push($final_result, $key);
	endforeach;
	
	return $final_result;
}
function getAuthor($id)
{
	global $conn;
	$sql = "SELECT id, username,image FROM users WHERE id=:id LIMIT 1";
	$query = $conn->prepare($sql);
	$query->execute(array(':id'=>$id));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	return $result;
}
function getSingleStory(string $slug)
{
	global $conn;
	$sql = "SELECT * FROM story WHERE published = 1 AND slug = :slug";
	$result = $conn->prepare($sql);
	$result->execute(array(':slug'=>$slug));
	$story = $result->fetch(PDO::FETCH_ASSOC);
	if(!empty($story)):
		$story['author_info'] = getAuthor($story['author_id']);
		return $story;
	else:
		return 'error';
	endif;
}