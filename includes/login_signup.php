<?php
// variable declarations
global $conn;	// connection to database
$username = "";
$email = "";
$password1 = "";
$password2 = "";
$errors = array();
$logged_in = false;

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
	// get and trim form inputs for whitespaces
	$email = trim($_POST['email']);
	$username = trim($_POST['username']);
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
	$username = trim($_POST['username']);
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