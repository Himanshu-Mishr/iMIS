<?php
include("err.php");
ob_start();
session_start();
echo "<!DOCTYPE html>
<html>
<head>
	<title>iMIS -  Login Page</title>
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+sans+light|Open+sans'>
	<style>
		body, html {
			height: 100%;
			margin: 0;
			padding: 0;
			background: #F9F9F9;
		}
		#main_table {
		height: 100%;
		width: 100%;
	}
		#welcome_container {
	font-family: 'Open Sans Light', 'Helvetica Neue', Helvetica, arial, sans-serif;
	font-size: 360%;
	color: #424242;
	display: inline-block;
	text-align: left;
}
		#main_table b {
-webkit-text-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 3px 10px rgba(0, 0, 0, 0.3);
text-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 3px 10px rgba(0, 0, 0, 0.3);
}
</style>
<link rel='stylesheet' href='style.css'>
</head>
<body>
	<table id='main_table' >
		<tr>
			<td  width='60%' align='center'>
				<div id=welcome_container>
					Internship<br> Management<br> Information<br> System<br> <b style='color:#28ABE3;'>{ iMIS }</b>
				</div>
			</td>

			<td  width='40%'>
				<div id='login_container'>
					<section class='container'>
						<div class='login'>
							<h1>Staff Login</h1>
							<form method='GET' action='index.php'>
								<p><input type='text' required name='username'  placeholder='Username' autofocus=''></p>
								<p><input type='password' required name='password' placeholder='Password'></p>
								<p class='remember_me'>
									<label>

									</label>
								</p>
								<p class='submit'><input type='submit' name='submit' value='submit'></p>
							</form>
						</div>

						<div class='login-help'>
							<p>Forgot your password? <a href='#'>Please contact system's administrator</a>.</p>
							Wanna check it ?<br> use username : `admin` & password : `admin`
						</div>
					</section>

				</div>
			</td>
		</tr>
	</table>
</body>
</html>";

if (isset($_GET['submit'])) {
	require "connection.php";
	$str="select * from admin_detail;";
	$result=mysqli_query($con, $str);
	while($row=mysqli_fetch_array($result)) {
		if($_GET['username'] == $row[0] && $_GET['password'] == $row[1] ) {
			$_SESSION['a']=$row[0];
			header("location:main.php");
		}
		else  {
			header("location:index.php");
		}
	}
}
?>
