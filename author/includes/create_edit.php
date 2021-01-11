<?php

// variable declaration
global $conn;	// connection to database
$story_title = "";
$story_content = "";
$story_image = "";
$errors = array();

/************************
*** Creating a story  ***
************************/
if(isset($_POST['create_story'])):
	
	// get and trim form inputs for whitespaces
	$story_title = trim($_POST['story_title']);
	$story_content = trim($_POST['story_content']);
	$story_image = trim($_FILES['story_image']['name']);

	//	check for errors from input
	if(empty($story_title)){array_push($errors, 'Please add a title to the story');}
	if(empty($story_image)){array_push($errors, 'Please add a valid image to your story');}
	if(empty($story_content)){array_push($errors, 'Please add content to your story');}

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
	if(count($errors)<1)):
		// get image information
		$upload_dir = ROOT_PATH.'/static/images/';
		$upload_file = $upload_dir.basename($_FILES['story_image']['name']);
		$file_type = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
		$uploadOk = 0;

		// display error if filetype is not jpg or png
		if(($file_type == "jpg") || ($file_type == "png")):
			$uploadOk = 1;
		else:
			$uploadOk = 0;
			array_push($errors, 'File type must be JPG or PNG');
		endif;
	endif;

	// save story if there are no errors
	if(count($errors)<1):
		$sql2 = "INSERT INTO story";
		/************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************
								you stopped here man and were meant to use this for image upload and saving

								$target_dir = ROOT_PATH.'/static/images/';
								$target_file = $target_dir.basename($_FILES['story_image']['name']);
								$uploadOk = 1;
								$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
								$target_file = $target_dir.date('hjsdmy').'.'.$file_type;
								if(($file_type == "jpg") || ($file_type == "png")):
									$uploadOk = 1;
								else:
									$uploadOk = 0;
									array_push($errors, 'File type must be JPG or PNG, file type is '.$file_type);
								endif;
								if($uploadOk == 1):
									move_uploaded_file($_FILES['story_image']['tmp_name'], $target_file);
								endif;
		 ************************************************************************************************************************************************************************************************************************************************************
								also don't forget to create function to turn a title into a slug
		 *****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
	endif;

endif;

/************************
* // Creating a story  **
************************/
?>