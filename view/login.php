<?php require("components/header.php")?>

<body class="text-center">
	<div class="wrap">
		<h1 class="h3 mb-3">Qwitter</h1>

		<?php if (isset($_GET['incorrect'])) : ?>
			<div class="alert alert-warning">
				Incorrect Email or Password.
			</div>
		<?php endif ?>

		<?php if (isset($_GET['suspended'])) : ?>
			<div class="alert alert-danger">
				Your account is suspended.
			</div>
		<?php endif ?>

		<?php if (isset($_GET['registered'])) : ?>
			<div class="alert alert-success">
				Account created. Please login.
			</div>
		<?php endif ?>
		<form action="/login" method="post">
			<!-- <input type="text" name="name" class="form-control mb-2" placeholder="name" required> -->
			<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

			<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>

			<button type="submit" class="w-100 btn btn-lg btn-primary">
				Login
			</button>
		</form>
		<br>

		<a href="register.php">Register</a>
		
	</div>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
</body>

<?php require("components/footer.php") ?>