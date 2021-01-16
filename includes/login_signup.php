<?php
// variable declarations
global $conn;	// connection to database
$first_name = "";
$last_name = "";
$username = isset($_SESSION['user']['username'])?$_SESSION['user']['username']:"";
$email = isset($_SESSION['user']['email'])?$_SESSION['user']['email']:"";
$password1 = "";
$password2 = "";
$errors = array();
$logged_in = false;
$type = 'basic';
if(isset($_POST['type'])):
	$type = 'author';
endif;

// get where the login/signup was clicked from
if(isset($_GET['ref'])):
	$source = $_GET['ref'];
else:
	$source="";
endif;

/************************
*** USER REGISTRATION ***
************************/
if(isset($_POST['signup']))
{
	/*************************
	*** BASIC REGISTRATION ***
	*************************/
	if($type === 'basic'):
		// get and trim form inputs for whitespaces
		$email = strtolower(trim($_POST['email']));
		$username = strtolower(trim($_POST['username']));
		$password1 = trim($_POST['password1']);
		$password2 = trim($_POST['password2']);

		// check for errors from input
		if(empty($email)){array_push($errors, 'Sorry, email is required!');}
		if(empty($username)){array_push($errors, 'Sorry, username is required!');}
		if(empty($password1)){array_push($errors, 'Sorry, password is required!');}
		if(empty($password2)){array_push($errors, 'Please retype password!');}
		if($password1 != $password2){array_push($errors, 'Passwords do not match!');}

		// check if username or email exists in database if there are no errors
		if(count($errors)<1):

			// check if username exists
			$sql1 = "SELECT * FROM users WHERE username = :username LIMIT 1";
			$result1 = $conn->prepare($sql1);
			$result1->execute(array(':username'=>$username));
			$row1 = $result1->fetch(PDO::FETCH_ASSOC);
			if($row1){array_push($errors, 'Username already exists');}
			
			// check if email exists
			$sql2 = "SELECT * FROM users WHERE email = :email LIMIT 1";
			$result2 = $conn->prepare($sql2);
			$result2->execute(array(':email'=>$email));
			$row2 = $result2->fetch(PDO::FETCH_ASSOC);
			if($row2){array_push($errors, 'Email already exists');}
		endif;

		// save new user if there are no errors
		if(count($errors)<1):
			$sql3 = "INSERT INTO users(username, email, password) VALUES (:username, :email, :password)";
			$result3 = $conn->prepare($sql3);
			$result3->execute(array(
				':username'=>$username,
				':email'=>$email,
				':password'=>hash('md5', $password1)
			));

			$user_id = $conn->LastInsertId();
			if(!$user_id):
				array_push($errors, 'Error creating account, please contact administrator');
			else:
				$_SESSION['message'] = 'Account created successfully';
			endif;
		endif;
	endif;
	/**************************
	** // BASIC REGISTRATION **
	**************************/

	/**************************
	*** AUTHOR REGISTRATION ***
	**************************/
	if($type==='author'):
		// get and trim form inputs for whitespaces
		$first_name = strtolower(trim($_POST['first_name']));
		$last_name = strtolower(trim($_POST['last_name']));
		$email = strtolower(trim($_POST['email']));
		$username = strtolower(trim($_POST['username']));
		$password1 = trim($_POST['password1']);

		// check for errors from input
		if(empty($first_name)){array_push($errors, 'Sorry, a first name is required!');}
		if(empty($last_name)){array_push($errors, 'Sorry, a last name is required!');}
		if(empty($email)){array_push($errors, 'Sorry, email is required!');}
		if(empty($username)){array_push($errors, 'Sorry, username is required!');}
		if(empty($password1)){array_push($errors, 'Sorry, password is required!');}

		// check if username, email and password match a user in database if there are no errors
		if(count($errors)<1):

			$sql4 = "SELECT * FROM users WHERE username = :username AND email = :email AND password = :password";
			$result4 = $conn->prepare($sql4);
			$result4->execute(array(
				':username'=>$username,
				':email'=>$email,
				':password'=>hash('md5', $password1)
			));
			$row4 = $result4->fetch(PDO::FETCH_ASSOC);
			if(!$row4){array_push($errors, 'Email, username or password is incorrect');}
		endif;

		//update user details if there are no errors
		if(count($errors)<1):
			$sql5 = "UPDATE users SET first_name = :first_name, last_name = :last_name, role=:role, created = :created, updated=current_timestamp WHERE id = :id";
			$result5 = $conn->prepare($sql5);
			$result5->execute(array(
				':first_name'=>$first_name,
				':last_name'=>$last_name,
				':role'=>'author',
				':created'=>$row4['created'],
				':id'=>$row4['id']
			));
			$sql6 = "SELECT * FROM users WHERE first_name = :first_name AND last_name = :last_name AND email = :email AND username = :username";
			$result6 = $conn->prepare($sql6);
			$result6->execute(array(
				':first_name'=>$first_name,
				':last_name'=>$last_name,
				':username'=>$username,
				':email'=>$email
			));
			$row6 = $result6->fetch(PDO::FETCH_ASSOC);
			if(!$row6):
				array_push($errors, 'Error updating account please contact the administrator');
			else:
				$sql7 = "SELECT * FROM users WHERE id = :id";
				$result7=$conn->prepare($sql7);
				$result7->execute(array(':id'=>$row6['id']));
				$row7 = $result7->fetch(PDO::FETCH_ASSOC);

				if($row7):	// if user exists
					$_SESSION['user'] = $row7;
					$_SESSION['message'] = 'Account updated successfully';
					header('Location: '.BASE_URL.'/author');
					exit(0);
				else:	// if user doesn't exist
					array_push($errors, 'Error fetching account details');
				endif;
			endif;
		endif;
	endif;
	/**************************
	*** AUTHOR REGISTRATION ***
	**************************/

}
/************************
* // USER REGISTRATION *
************************/


/************************
******* USER LOGIN ******
************************/
if(isset($_POST['login']))
{
	// get and trim form inputs for whitespaces
	$username = strtolower(trim($_POST['username']));
	$password1 = trim($_POST['password']);

	// check for errors from input
	if(empty($username)){array_push($errors, 'Sorry, username or email is required!');}
	if(empty($password1)){array_push($errors, 'Sorry, password is required!');}

	// check if username or email exists in database if there are no errors
	if(count($errors)<1):

		// check if username exists
		$sql1 = "SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1";
		$result1 = $conn->prepare($sql1);
		$result1->execute(array(':username'=>$username, ':email'=>$username));
		$row1 = $result1->fetch(PDO::FETCH_ASSOC);

		if($row1):	// if user exists

			// check if password match
			if(hash('md5', $password1) === $row1['password']):
				// set user session
				$_SESSION['user'] = $row1;
				$_SESSION['message'] = 'Logged in successfully';
				header('Location: '.$source);
				exit(0);
			else:
				array_push($errors, 'Password is incorrect');
			endif;

		else:	// if user doesn't exist
			array_push($errors, 'username or email is incorrect!!');
		endif;
	endif;
}
/************************
***** // USER LOGIN *****
************************/
?>