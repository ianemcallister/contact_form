<?php
	$result='';
	$error='';

	if($_POST["submit"]) {
		$result='<div class="alert alert-success">Form submitted</div>';
	}
	else{ }

	if(!$_POST['name']) {
		$error="<br/>Please enter your name";
	}
	else{ }

	if(!$_POST['email']) {
		$error.="<br/>Please enter your e-mail";
	}
	else{ }

	if(!$_POST['comment']) {
		$error.="<br/>Please enter a comment";
	}
	else{ }

	if($_POST['email'] !="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$error.="<br/>Please enter a valid e-mail address";
	}

	if($error) {
		$result='<div class="alert alert-danger"><strong>There were error(s) in your form:</strong> '.$error.'</div>';
	}
	else 
	{
		if(mail("iemcallister@gmail.com","Comment from website!", "Name: ".$_POST['name']."

			Email: ".$_POST['email']."

			Comment: ".$_POST['comment'])) {

			$result='<div class="alert alert-success"><strong>Thank you!</strong> I\'ll be in touch.</div>';	
		} else {
			$result='<div class="alert alert-alert"><strong>Sorry, there was an error sending your message.  Please try again later.</strong></div>';
		}

	}

?>

<!doctype html>
<html>
<head>
	<title>My First Webpage</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- JQuery -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<style>
.emailform {
	border: 1px solid gray;
	border-radius: 10px;
	margin-top: 20px;
}

textarea {
	height: 120px;
}

form {
	padding-bottom: 20px;
}
</style>

</head>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 emailform">
			<h1>My email form</h1>

			<?php echo $result; ?>

			<p class="lead">Please get in touch - I'll get back to you as soon as I can.</p>

			<form method="post">
				<div class="form-group">
					<label for="name">Your Name:</label>
					<input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $_POST['name']?>" />
					<label for="email">Your E-Mail:</label>
					<input type="email" name="email" class="form-control" placeholder="Your E-Mail" value="<?php echo $_POST['email']?>"/>

					<label for="comment">Your Comment:</label>
					<textarea class="form-control" name="comment"><?php echo $_POST['comment']?></textarea>
				</div>

				<input type="submit" class="btn btn-success btn-lg" value="Submit" name="submit" />
			</form>
		</div>
	</div>
	
</div>



<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>

</html>