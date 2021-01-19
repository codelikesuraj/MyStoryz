<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<style>
		/***** DEFAULTS *****/
*{
	margin: 0px;
	padding: 0px;
	font-family: Arial 'Averia Serif Libre', cursive;
}
html{
	height: 100%;
	box-sizing: border-box;
}
body{
	position: relative;
	margin: 0;
	padding-bottom: 6rem;
	min-height: 100%;
}
.container{
	width: 90%;
	margin: 0px auto;
	padding-top: 5px;
}
/* HEADINGS DEFAULT */
h1, h2, h3, h4, h5, h6, a, p{
	color: #444;
	font-family: Arial, 'Averia Serif Libre', cursive;
}
a{
	text-decoration: none;
}
ul, ol{
	margin-left: 40px;
	list-style: none;
}
hr{
	margin: 10px 0px;
	opacity: .25;
}

/* Public Nav */
.public_nav{
	display: flex;
	flex-direction: column;
	margin: 0 auto;
	margin-bottom: 10px;
	overflow: hidden;
	background-color: #3e606f;
	border-radius: 6px 6px 6px 6px;
}
.public_nav .logo{
	flex: 3;
}
.public_nav .nav-links{
	flex: 1;
}
.public_nav ul{
	list-style-type: none;
	float: right;
}
.public_nav ul li{
	float: left;
	font-family: 'Noto Serif', serif;
}
.public_nav ul li a {
	display: block;
	color: white;
	text-align: center;
	padding: 20px 28px;
	text-decoration: none;
}
.public_nav ul li a:hover{
	color: #B9E6F2;
	background-color: #334F5C;
}
/* LOGO */
.public_nav .logo{
	float: left;
	padding-top: 5px;
	padding-left: 40px;
}
.public_nav .logo h1{
	margin-bottom: 20px;
	color: #B9E6F2;
	font-size: 2.5em;
	letter-spacing: 3px;
	font-weight: 400;
	font-family: Arial, 'Tangerine', cursive;
}

/* BANNER: Welcome message */
.banner{
	display: flex;
	align-items: center;
	margin: 5px auto;
	min-height: 50px;
	max-height: 400px;
	color: white;
	border-radius: 5px;
	background-size: 100% 100%;
}

.banner .unregistered{
	flex: 1;
	width: 45%;
	padding: 20px;
}
.banner .unregistered .login-signup{
	float: right;
}
.banner .unregistered .login-signup .signup{
	text-align: center;
	border: solid 2px #3e606f;
	border-radius: 5px;
	margin-left: 10px;
	padding: 3px 5px;
}
.banner .unregistered .login-signup .login{
	text-align: center;
	border-radius: 5px;
	margin-left: 10px;
	padding: 3px 5px;
}
.banner .unregistered .login-signup .login:hover{
	text-decoration: underline;
}
.banner .unregistered .login-signup .signup:hover{
	background: #3e606f;
	color: white;
}

.banner .registered{
	display: flex;
	color: #444;
	padding: 20px;
	width: 100%;
}
.banner .registered .welcome{
	flex: 3;
}
.banner .registered .panel-link{
	flex: 1;
}
.banner .registered h1{
	color: #B9E6F2;
	margin: 25px 0px;
	font-size: 2.4em;
	font-family: 'Averia Serif Libre', cursive;
}
.banner .welcome_msg p{
	color: white;
	font-size: 1.5em;
	line-height: 1.8em;
	font-family: 'Noto Serif', serif;
}

/* BANNER: Login Form */
.banner .login_div{
	flex: 1;
	width: 50%;
}
.banner .login_div form{
	margin-top: 40px;
}
.banner .login_div form h2{
	color: white;
	margin-bottom: 20px;
	font-family: 'Noto Serif', serif;
}
.banner .login_div form input{
	width: 60%;
	color: black;
	border: 1px solid white;
	margin: 10px auto;
	letter-spacing: 1.3px;
	font-family: 'Noto Serif', serif;
	background: white;
}
.banner .login_div form button{
	display: block;
	background: #006384;
	margin-left: 20%;
}
.story-list{
	display: flex;
	flex-direction: column;
}
.story-list .story-card{
	display: flex;
	flex-direction: column;
	width: 325px;
	height: auto;
	margin: 20px auto;
	border-radius: 20px;
	box-shadow: 0px 0px 5px 0px black;
}
.story-list .story-card .story-image{
	flex: 2;
}
.story-list .story-card .story-image img{
	border-radius: 20px 20px 0px 0px;
	width: 100%;
	object-fit: contain;
	max-height: 350px;
}
.story-list .story-card .author-info{
	margin: 5px;
	flex: 1;
	display: flex;
	flex-direction: row;
	align-items: center;
}
.story-list .story-card .author-info .author-image{
	flex: 1;
}
.story-list .story-card .author-info .group{
	flex: 4;
}
.story-list .story-card .story-info{
	flex: 1;
	padding: 10px;
}
.story-list .story-card .story-info .story-content{
	max-height: 100px;
	overflow: hidden;
	margin: 10px 0px 10px 0px;
}
.footer p{
	padding: 30px;
	text-align: center;
	color: #B9E6F2;
	margin: 0 auto;
	overflow: hidden;
	background-color: #3e606f;
	border-radius: 6px 6px 6px 6px;
}
.comment-box{
	margin: 20px;
}
.comment-box textarea{
	width: 90%;
	padding: 5px;
}
.comment-box input{
	margin-top: 10px;
	background: transparent;
	padding: 3px 5px;
	border-radius: 5px;
	border: solid 2px #3e606f;
}
.comment-box input:hover{
	background: #3e606f;
	color: white;
}
.not-logged-in a{
	padding: 3px 5px;
	border-radius: 5px;
	border: solid 2px #3e606f;
}
.not-logged-in a:hover{
	background: #3e606f;
	color: white;
}
.btn{
	width: 100%;
}
/* FORM DEFAULTS */
.myform{
	width: 75%;
	margin: auto;
	margin-top: 30px;
	margin-bottom: 30px;
	padding: 5px;
	padding-bottom: 20px;
	text-align: center;
	border-radius: 20px;
	box-shadow: 0px 0px 5px 0px black;
}
.myform h2{
	margin: 25px auto;
	text-align: center;
	font-family: 'Arial', 'Averia Serif Libre', cursive;
}
.myform input{
	width: 70%;
	display: block;
	padding: 13px 13px;
	font-size: 1em;
	margin: 5px auto 10px;
	border-radius: 3px;
	box-sizing: border-box;
	background: transparent;
	border: 1px solid #3E606F;
}
.myform input:focus{
	outline-color: #3e606f;
}
.myform .login-btn, .myform .sign-up-btn{
	width: 70%;
	border: solid 2px #3e606f;
	border-radius: 5px;
}
.myform .login-btn:hover, .myform .login-btn:focus, .myform .sign-up-btn:hover, .myform .sign-up-btn:focus{
	background: #3e606f;
	color: white;
}
.myform a{
	text-decoration: underline;
}
.error{
	color: #a94442;
	background: #f2dede;
	border: 1px solid #a94442;
	margin-bottom: 20px;
	text-align: center;
	padding: 5px;
}
.available-comments{
	display: flex;
	flex-direction: column;
	padding: 10px;
}
.available-comments .comment-card{
	display: flex;
	flex-direction: column;
	width: 90%;
	height: auto;
	margin-top: 20px;
	border-radius: 20px;
	border: 1px solid #ccc;
	padding: 10px;
}
.available-comments .comment-card .user-info{
	flex: 1;
	display: flex;
	align-items: center;
}
.available-comments .comment-card .user-info .user-data{
	font-size: 1em;
}
.available-comments .comment-card .user-comment{
	flex: 2;
	margin: 5px 0px 5px 15px;
	padding: 5px;
	font-size: 1.2em;
}

/* Public Nav */
.author_nav{
	display: flex;
	flex-direction: column;
	margin: 0 auto;
	margin-bottom: 10px;
	overflow: hidden;
	background-color: #444;
	border-radius: 6px 6px 6px 6px;
	padding: 30px 10px 30px 10px;
}
.author_nav a, .name
{
	color: #eec;
}
.author_nav .logo{
	margin: 10px 0px 10px 0px;
	flex: 3;
}
.author_nav .nav-links{
	margin: 10px 0px 10px 0px;
	display: flex;
	flex: 1;
}
.author_nav .nav-links .home{
	flex: 1;
	align-self: flex-start;
}
.author_nav .nav-links .name{
	flex: 1;
	align-self: flex-end;
}

/* Author body */
.author-body{
	display: flex;
	margin-bottom: 10px;
	padding: 10px;
	min-height: 80vh;
}

/* Author sidebar */
.author-sidebar{
	font-size: 14px;
	width: 15%;
	margin: 0px auto 0px auto;
}
.author-sidebar .nav-links a{
	text-align: center;
	display: block;
	border-bottom: 2px solid gray;
	margin-top: 10px;
	padding-bottom: 10px;
}
.author-sidebar .nav-links a:hover{
	padding-left: 10px;
}
.author-sidebar h3, .author-panel-info h3, .create-form h3, .management-table h3{
	text-align: center;
	background-color: #444;
	width: auto;
	color: #eec;
	padding: 5px;
}
/* Author panel info */
.author-panel-info{
	width: auto;
}
.author-panel-info .info{
	margin-top: 5px;
}
.author-panel-info p{
	padding: 5px;
	width: 100%;
}

/* Create form */
.create-form{
	width: auto;
}

/* Management table */
.management-table{
	width: auto;
}

.author-panel-info, .create-form, .management-table{
	font-size: 14px;
	width: 85%;
	margin: 0px auto 0px 10px;
}


</style>