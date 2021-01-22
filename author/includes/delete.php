<?php

// variable declaration
global $conn;
$del_story_slug = '';
$del_story_title = '';
$del_story_id = '';
$del_author_id = '';
$del_author_username = '';
$errors = array();

// get slug from url and fill the delete variables
if(isset($_GET['title'])):
	$sql1 = "SELECT * FROM story WHERE slug=:slug AND author_id=:author_id LIMIT 1";
	$result1 = $conn->prepare($sql1);
	$result1->execute(array(
		':slug'=>$_GET['title'],
		':author_id'=>$_SESSION['user']['id']));
	$row1=$result1->fetch(PDO::FETCH_ASSOC);
	if(is_array($row1)):
		$del_story_id = $row1['id'];
		$del_story_title = $row1['title'];
		$del_story_slug = $row1['slug'];
		$del_author_id = $row1['author_id'];
		$del_author_username = getAuthor($del_author_id)['username'];
	else:
		header('Location: '.BASE_URL.'/author/manage/');
		exit(0);
	endif;
endif;

// if delete key is pressed
if(isset($_POST['delete_story'])):
	// get form input

	// trim input for whitespaces
	$confirm_text = trim($_POST['confirm_text']);

	if(empty($confirm_text)){array_push($errors, 'Box cannot be empty!');}
	if($confirm_text !== $del_author_username.'/'.$del_story_slug):
		array_push($errors, 'Texts do not match');
	endif;

	// delete if there are no errrors
	if(count($errors)<1):

		// code to delete image from images folder goes here

		
		$sql2 = 'DELETE FROM story WHERE id=:story_id AND author_id=:author_id';
		$values2=array(':story_id'=>$del_story_id, ':author_id'=>$del_author_id);
		try
		{
			$result=$conn->prepare($sql2);
			$result->execute($values2);
			$_SESSION['message'] = 'Story has been removed successfully';
			header('Location: '.BASE_URL.'/author/manage/');
			exit(0);
		}
		catch(PDOException $e)
		{
			array_push($errors, 'Error processing database, please contact admin');
		}
	endif;
endif;
?>