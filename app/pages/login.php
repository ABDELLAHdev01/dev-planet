<?php
session_start();
if (isset($_SESSION['NAME'])) { header('location: ./admin/index.php');} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/src/parsley.css" />

	<link rel="icon" href="../assets/img/icon.png" type="image/x-icon">

	<title>Login - DEV PLANET</title>
</head>
<style>
	* {
		font-family: 'karla';
	}


	body {

		background: #f7e28f !important;
	}

	.wrapper {
		margin-top: 80px;
		margin-bottom: 80px;
	}

	.form-signin {
		max-width: 380px;
		padding: 15px 35px 45px;
		margin: 0 auto;
		background-color: #fff;
		border: 1px solid rgba(0, 0, 0, 0.1);

		.form-signin-heading,
		.checkbox {
			margin-bottom: 30px;
		}

		.checkbox {
			font-weight: normal;
		}

		.form-control {
			position: relative;
			font-size: 16px;
			height: auto;
			padding: 10px;
			@include box-sizing(border-box);

			&:focus {
				z-index: 2;
			}
		}

		input[type="text"] {
			margin-bottom: -1px;
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
		}

		input[type="password"] {
			margin-bottom: 20px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}
	}

	.btncn {}
</style>

<body class="position-relative " style="height: 100vh;">
	<div class="wrapper">
		<form  data-parsley-validate   action="../controllers/admin-controller.php" method="POST" class="form-signin">
			<?php if (isset($_SESSION['message'])): ?>
				<div class="alert alert-danger alert-dismissible fade show">
					<strong>Ooups !</strong> <span style="font-size: 0.9rem;">
						<?php
						echo $_SESSION['message'];
						unset($_SESSION['message']);
						?></span>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif ?>
			<h2 class="form-signin-heading">Please login</h2>
			<input name="loginEmail" type="text" class="form-control mb-3" name="username" placeholder="Email Address"
				 required data-parsley-type="email" autofocus="" />
			<input name="loginPassword" type="password" class="form-control mb-4" name="password" placeholder="Password"
				required data-parsley-length="[6, 10]" />

			<button name="login" class="btn btn-lg btn-warning btn-block btncn w-100 mb-4" type="submit">Login</button>
			<a href="./signup.php">Create an account to get started !</a>

		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" ></script>
</body>

</html>