<?php
// fetch all published stories
function getAllStory()
{
	// include database connection
	global $conn;
	$final_result = array();

	$sql = "SELECT * FROM story WHERE published=1 ORDER BY created DESC";
	$query = $conn->query($sql);
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	if(is_array($result)):
		foreach($result as $key):
			// fetch the author information that created each story
			$key['story_author'] = getAuthor($key['author_id']);

			// add author information details as an array to $final_result
			array_push($final_result, $key);
		endforeach;
	endif;
	
	return $final_result;
}

// fetch a single published story by the slug
function getSingleStory(string $slug)
{
	// include database connection
	global $conn;

	$sql = "SELECT * FROM story WHERE published = 1 AND slug = :slug";
	$result = $conn->prepare($sql);
	$result->execute(array(':slug'=>$slug));
	$story = $result->fetch(PDO::FETCH_ASSOC);
	
	if($story):	// if story returns a row
		// get Author information(as an array) and add to $story
		$story['author_info'] = getAuthor($story['author_id']);
		return $story;
	else: // if story returns no row
		return 'error';	// return error text
	endif;
}
// fetch author information by the id
function getAuthor($id)
{
	global $conn;	// include database connection
	$sql = "SELECT id, username,image,first_name, last_name FROM users WHERE id=:id LIMIT 1";
	$query = $conn->prepare($sql);
	$query->execute(array(':id'=>$id));
	$result = $query->fetch(PDO::FETCH_ASSOC);
	return $result;
}


// get url of current page
function current_url()
{
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	if(isset($_GET)):
		$i = 0;
		foreach($_GET as $name => $value):
			if($i==0){
				$uri.='?';
			}else{
				$uri.='&';
			}
			$i++;
			
			$uri.=$name.'='.$value;
		endforeach;
	endif;
	return $uri;
}

// fetch all story comments
function fetchAllComment($story_slug)
{
	global $conn;	// include database connection

	// fetch story id 
	$story_id = fetchStoryId($story_slug);
	if($story_id === 'error'):
		return 'error';
	endif;

	$sql = "SELECT * FROM comment WHERE story_id = :story_id ORDER BY created DESC";
	$result = $conn->prepare($sql);
	$result->execute(array(':story_id'=>$story_id));
	$comment = $result->fetchAll(PDO::FETCH_ASSOC);

	if($comment):	// if comment returns a row
		// get information of each commment authors
		$final_comment = array();
		foreach($comment as $key):
			$key['user_info'] = getAuthor($key['user_id']);

			//add user information details as an array to $final_comment
			array_push($final_comment, $key);
		endforeach;
		return $final_comment;
	else:
		return 'error';
	endif;
}

// fetch id of story with slug as input
function fetchStoryId($slug)
{
	global $conn;	// include database connection
	$sql = "SELECT id FROM story WHERE slug = :slug LIMIT 1";
	$result = $conn->prepare($sql);
	$result->execute(array(':slug'=>$slug));
	$story_id = $result->fetch(PDO::FETCH_ASSOC);
	if($story_id):
		return $story_id['id'];
	else:
		return 'error';
	endif;
}

// function to ensure its author-user in the author page
function checkAuthor()
{
	if((!isset($_SESSION['user'])) || (isset($_SESSION['user']) && $_SESSION['user']['role'] != 'author')):
		header('Location: '.BASE_URL.'/login.php/?ref='.current_url());
		exit(0);
	endif;
}

// function to ensure its admin-user in the author page
function checkAdmin()
{
	if((!isset($_SESSION['user'])) || (isset($_SESSION['user']) && $_SESSION['user']['role'] != 'admin')):
		header('Location: '.BASE_URL.'/login.php/?ref='.current_url());
		exit(0);
	endif;
}

// function to convert a title string into a slug
// example: i am a title => i-am-a-title
function createSlug(string $title)
{
	$title = strtolower($title);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
	return $slug;
}