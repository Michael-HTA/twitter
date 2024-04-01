<?php require("components/header.php") ?>



<div style="width: 100%;
			max-width: 500px;
			margin: 40px auto;" class="text-center">
	
		<h1 class="h3 mb-3">
			<a href="/" class="text-decoration-none text-black">Qwitter</a>
		</h1>

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

		<?php if (isset($_GET['404'])) : ?>
			<div class="alert alert-danger">
				404 Not Found.
			</div>
		<?php endif ?>

		<?php if (isset($_GET['registered'])) : ?>
			<div class="alert alert-success">
				Account created. Please login.
			</div>
		<?php endif ?>
		<form action="/login" method="post">
			<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
			<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
			<button type="submit" class="w-100 btn btn-lg btn-primary">
				Login
			</button>
		</form>
		<br>
		<a href="/register">Register</a>

</div>



<?php require("components/footer.php") ?>