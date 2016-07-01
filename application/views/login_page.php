<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col s4">
   			<h5 id="head">Login</h5>
   		</div>
   	</div>	
   	<div class="row">	
   		<div class="col s5" id="login_border">

			<form action="loggedinuser" method="post">
	  			<!-- <fieldset class="form-group"> -->
	    			<label for="email">Email address</label>
	    			<input type="email" class="form-control" id="email" name="email" length="35">
	  			<!-- </fieldset> -->
	  			<!-- <fieldset class="form-group"> -->
	    			<label for="password">Password</label>
	    			<input type="password" class="form-control" id="password" name="password">
	  			<!-- </fieldset> -->
	  			<button type="submit" class="waves-effect waves-light btn green">Submit</button>

			</form>
			<br><br>
			<a href="/registration" id="new">New user? Register here.</a>
		</div>
	</div>
</div>
</body>
</html>