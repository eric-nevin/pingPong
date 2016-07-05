<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> -->
	<link rel="stylesheet" type="text/css" href="/assets/css/login.css">
	<script type="text/javascript">
		 // $(document).ready(function() {
		 //    Materialize.updateTextFields();
		 //  });
	</script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col s4">
   			<h5 id="head">Registration</h5>
   		</div>
   	</div>	
   	<div class="row">	
   		<div class="col s5" id="login_border">
			<form action="" method="post">

					<i class="material-icons prefix">account_circle</i>
					<label>First Name:</label>
		    		<input type="text" id="icon_prefix" class="form-control" id="first_name" name="first_name" length="10">

		    		<i class="material-icons prefix">account_circle</i>
		    		<label>Last Name:</label>
		    		<input type="text" class="form-control" id="last_name" name="last_name" length="10">

		    		<i class="material-icons prefix">phone</i>
		    		<label for="icon_telephone">Phone Number:</label>
		    		<input type="tel" class="form-control" name="telephone" length="10">

		    		<i class="material-icons prefix">email</i>
	    			<label for="email">Email address</label>
	    			<input type="email" class="form-control" id="email" name="email" length="35">
	  		
	  				<i class="material-icons prefix">vpn_key</i>
	    			<label for="password">Password</label>
	    			<input type="password" class="form-control" id="password" name="password">
	  		
	  				<button type="submit" class="waves-effect waves-light btn green">Register</button>
			</form>


			<br>
			<a href="/" id="new">back</a>
		</div>
	</div>
</div>
</body>
</html>