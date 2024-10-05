<!DOCTYPE html>
<html>
<head>
	<title>Online Reume Builder</title>
	<?php require "assets/autoloader.php" ?>
	<style type="text/css" id="#some2">
	<?php include 'css/myStyle.css'; ?>
	.loginDiv{width: 366px;float: right;margin-right: 111px;background-color: rgba(0, 0, 0, 0.4);  opacity: inherit;;text-align: center;border: 1px solid blue;padding: 11px;box-shadow: 2px 1px 22px #1583DC;margin-top: 100px;}	
	.loginDiv h2 span{ color: white;text-shadow: 2px 2px 11px black;}
	.loginDiv input{border-radius: 0}
	.loginDiv button{border-radius: 0}
	.m1{margin-top: 2px}
	</style>
</head>
<body style="background: url('photo/images.jpeg');background-size: cover">
<div class="hub-top" style="position: fixed;top: 0;z-index: 20;width: 100%;background: #222;height: 111px;color: White;font-size: 28pt;Padding: 22px;text-shadow: 2px 2px 11px black;" >
	<div class="logo flex pull-left">
		<div><i class="glyphicon glyphicon-cloud fa-2x"></i></div>
		<div class="logoname treb"><span>Online  Resume Builder </span></div>
	</div>
	<div class="loginDiv">
		<h2><span>Login Now</span></h2>
		<form method="POST">
			<input type="text" name="username" placeholder="username" required class="form-control">
			<input type="password" name="password" placeholder="password" required class="form-control">
			<button class="btn btn-primary btn-block m1" type="submit" name="login">Enter</button>
		</form>
		<br>
		
	</div>
</body>
</html>
<?php 
if (isset($_POST['login'])) 
{
	$user = $_POST['username'];
    $pass = $_POST['password'];
    $con = new mysqli('localhost','root','','cv');

    $result = $con->query("select * from users where username='$user' AND password='$pass'");
    if($result->num_rows>0)
    {	
    	session_start();
    	$data = $result->fetch_assoc();
    	$_SESSION['userId']=$data['id'];
    	header('location:index.php');
  
    }
    else
    {
     	echo 
     	"<script>
     		alert('Username or Password Inccorect');
     	</script>
     	";
    }
}
?>