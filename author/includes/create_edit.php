<?php

// variable declaration
global $conn;	// connection to database
$story_title = "";
$story_content = "";
$story_image = "";
$errors = array();
$success = '';


$edit_id = "";
$edit_title = "";
$edit_content = "";
$edit_image = "";

/************************
*** Creating a story  ***
************************/
if(isset($_POST['create_story'])):
	
	// get and trim form inputs for whitespaces
	$story_title = trim($_POST['story_title']);
	$story_content = trim($_POST['story_content']);
	$story_image = trim($_FILES['story_image']['name']);
	$story_status = trim($_POST['story_status']);

	//	check for errors from input
	if(empty($story_title)){array_push($errors, 'Please add a title to the story');}
	if(empty($story_image)){array_push($errors, 'Please add a valid image to your story');}
	if(empty($story_content)){array_push($errors, 'Please add content to your story');}
	if(empty($story_status)){array_push($errors, 'Please select a status');}

	// create slug from title and check if slug exists in database
	if(count($errors)<1):
		// create slug
		$story_slug = createSlug($story_title);
		$sql1 = "SELECT * FROM story WHERE slug=:slug LIMIT 1";
		$result1 = $conn->prepare($sql1);
		$result1->execute(array(':slug'=>$story_slug));
		$row1 = $result1->fetch(PDO::FETCH_ASSOC);
		if($row1){array_push($errors, 'Title already exists');}
	endif;

	// process image input and check for errors
	if(count($errors)<1):
		// get image information
		$upload_dir = ROOT_PATH.'/static/images/';
		$upload_file = $upload_dir.basename($_FILES['story_image']['name']);
		$file_type = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
		$uploadOk = 0;

		// display error if filetype is not jpg or png
		if(($file_type == "jpg") || ($file_type == "png")):
			$uploadOk = 1;
			$save_file_name = strtolower($_SESSION['user']['username']).date('HisjmY').'.'.$file_type;
		else:
			$uploadOk = 0;
			array_push($errors, 'File type must be JPG or PNG');
		endif;
	endif;

	// save story if there are no errors
	if(count($errors)<1):
		// save image
		if(move_uploaded_file($_FILES['story_image']['tmp_name'], $upload_dir.$save_file_name)):
			// save post to database
			switch ($story_status)
			{
				case 'publish':
					$story_status = 1;
					break;
				case 'unpublish':
					$story_status = 0;
					break;
				default:
					$story_status = 1;
					break;
			}
			$sql2 = "INSERT INTO story (content, slug, title, image, published, author_id, created) VALUES (:content, :slug, :title, :image, :published, :author_id, current_timestamp)";
			$result2 = $conn->prepare($sql2);
			$result2->execute(array(
				':content'=>$story_content,
				':slug'=>$story_slug,
				':title'=>$story_title,
				':image'=>$save_file_name,
				':published'=>$story_status,
				':author_id'=>$_SESSION['user']['id']
			));
			$id = $conn->LastInsertId();
			if($id):
				$_SESSION['message'] = $success = 'Story has been created successfully';
				header('Location: '.BASE_URL.'/author/manage/');
				exit(0);
			else:
				array_push($errors, 'An unknown error has occured, please contact admin!');
			endif;
		else:
			array_push($errors, 'Error saving header image');
		endif;
	endif;

endif;

/************************
* // Creating a story  **
************************/

/************************
***  Editing a story  ***
************************/

// get slug from url and fill the edit variables
if(isset($_GET['title'])):
	$sql1 = "SELECT * FROM story WHERE slug=:slug AND author_id=:author_id LIMIT 1";
	$result1 = $conn->prepare($sql1);
	$result1->execute(array(
		':slug'=>$_GET['title'],
		':author_id'=>$_SESSION['user']['id']));
	$row1=$result1->fetch(PDO::FETCH_ASSOC);
	if(is_array($row1)):
		$edit_title = $row1['title'];
		$edit_image = $row1['image'];
		$edit_content = $row1['content'];
		$edit_id = $row1['id'];
	else:
		header('Location: '.BASE_URL.'/author/manage/');
		exit(0);
	endif;
endif;

// if new details are submitted to be updated
if(isset($_POST['edit_story'])):
	
	// get and trim form inputs for whitespaces
	$edit_title = trim($_POST['edit_title']);
	$edit_content = trim($_POST['edit_content']);
	$edit_status = trim($_POST['edit_status']);
	$edit_id = trim($_POST['edit_id']);

	//	check for errors from input
	if(empty($edit_title)){array_push($errors, 'Please add a title to the edit');}
	if(empty($edit_content)){array_push($errors, 'Please add content to your edit');}
	if(empty($edit_status)){array_push($errors, 'Please select a status');}

	// create slug from title and check if a story apart from the current one has the same title
	if(count($errors)<1):
		// create slug
		$edit_slug = createSlug($edit_title);
		echo $edit_slug;
		$sql2 = "SELECT * FROM story WHERE slug=:slug AND id<>:id";
		$result2 = $conn->prepare($sql2);
		$result2->execute(array(
			':slug'=>$edit_slug,
			':id'=>$edit_id));
		$row2 = $result2->fetch(PDO::FETCH_ASSOC);
		if($row2){array_push($errors, 'Title already exists on another story');}
	endif;

	// update story if there are no errors
	if(count($errors)<1):
			// update post in database
			switch ($edit_status)
			{
				case 'publish':
					$edit_status = 1;
					break;
				case 'unpublish':
					$edit_status = 0;
					break;
				default:
					$edit_status = 1;
					break;
			}
			$sql2 = "UPDATE story SET content=:content, slug=:slug, title=:title, published=:published, updated=current_timestamp WHERE id = :id";
			$result2 = $conn->prepare($sql2);
			$result2->execute(array(
				':content'=>$edit_content,
				':slug'=>$edit_slug,
				':title'=>$edit_title,
				':published'=>$edit_status,
				':id'=>$edit_id
			));
			$_SESSION['message'] = $success = 'Story has been updated successfully';
			header('Location: '.BASE_URL.'/author/manage/');
			exit(0);
	endif;
endif;
/************************
** // Editing a story  **
************************/
?>