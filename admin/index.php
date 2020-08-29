<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		.bg-img {
			  /* The image used */
			  background-image: url("img/sushi.jpg");

			  min-height: 580px;

			  /* Center and scale the image nicely */
			  background-position: center;
			  background-repeat: no-repeat;
			  background-size: cover;
			  position: relative;
			}
			.container {
			  position: absolute;
			  left: 0;
			  margin: 140px;
			  max-width: 400px;
			  padding: 16px;
			  background-color: white;
			}
	</style>
</head>
<body>
	<div class="bg-img">		
		<form action="login.php" method="POST" class="container">
			<h1>Login</h1>
			
			<div class="from-group">
				<label for="name">Name</label>
				<input type="text" name="name" placeholder="Please Enter Name = admin" class="form-control">
			</div>

			<div class="from-group">
				<label for="name">Password</label>
				<input type="password" name="password" placeholder="Password = 123456" class="form-control">
			</div><br>

			<div class="from-group">
				<input type="submit" value="Login" class="form-control btn btn-success">
			</div>
			
		</form>
	</div>
</body>
</html>