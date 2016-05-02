<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/skeleton.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

</head>
<body>
<div class="wrapper login_reg">	
	<div class="container">
		<?php echo $this->session->flashdata('error');?>
	</div>
		
	<div class="container section">
		<h2 id="log">Log In</h2>
		<form action="/login/log_in" method="post">
			<div class="container">
				<?php echo form_error('log_email'); ?>
				<div class="row">
					<div class="two columns">
						<label for="log_email">Email:</label>
					</div>
					<div class="eight columns">
						<input type="text" name="log_email" class="u-full-width">
					</div>		
					<div class="two columns"></div>		
				</div>	
				<?php echo form_error('log_password'); ?>
				<div class="row">
					<div class="two columns">
						<label for="log_password">Password:</label>
					</div>
					<div class="eight columns">
						<input type="password" name="log_password" class="u-full-width">
					</div>	
					<div class="two columns"></div>				
				</div>	
				<div class="row login_row">
					<button type="submit" class="button-primary">Login</button>				
				</div>
			</div>
		</form>		
	</div>
	
	<div class="container section">
		<h2 id="register">Register</h2>	
		<form action="/login/register" method="post">
			<div id="register_block">
				<?php echo form_error('first_name'); ?>
				<div class="row">
					<div class="three columns">
						<label for="first_name">First Name:</label>
					</div>
					<div class="seven columns">
						<input type="text" name="first_name" class="u-full-width">
					</div>		
					<div class="two columns"></div>		
				</div>	
				<?php echo form_error('last_name'); ?>
				<div class="row">
					<div class="three columns">
						<label for="last_name">Last Name:</label>
					</div>
					<div class="seven columns">
						<input type="text" name="last_name" class="u-full-width">
					</div>		
					<div class="two columns"></div>		
				</div>	
				<?php echo form_error('email'); ?>
				<div class="row">
					<div class="three columns">
						<label for="email">Email Address:</label>
					</div>
					<div class="seven columns">
						<input type="text" name="email" class="u-full-width">
					</div>		
					<div class="two columns"></div>		
				</div>	
				<?php echo form_error('password'); ?>
				<div class="row">
					<div class="three columns">
						<label for="password">Password:</label>
					</div>
					<div class="seven columns">
						<input type="password" name="password" class="u-full-width">
					</div>		
					<div class="two columns"></div>		
				</div>	
				<?php echo form_error('c_password'); ?>
				<div class="row">
					<div class="three columns">
						<label for="c_password">Confirm Password:</label>
					</div>
					<div class="seven columns">
						<input type="password" name="c_password" class="u-full-width">
					</div>		
					<div class="two columns"></div>		
				</div>

				<div class="row register_row">
					<button type="submit" class="button-primary">Register</button>				
				</div>
			</div>
		</form>			
	</div>
</div>
</body>
</html>