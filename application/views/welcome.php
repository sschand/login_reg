<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<div class="wrapper container">	

<a href="/login/logoff">Logoff</a>
<h2>Welcome <?php echo $user_info['first_name'] ?>!</h2>
	<div class="container section">
		<h4>User Information</h4>
		<div class="container">
			<p>First Name: <?php echo $user_info['first_name'] ?></p>
			<p>Last Name: <?php echo $user_info['last_name'] ?></p>
			<p>Email: <?php echo $user_info['email'] ?></p>
		</div>
	</div>
</div>
</body>
</html>