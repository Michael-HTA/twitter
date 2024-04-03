<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- icon -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<style>
		.nav_bg a{
			background-color: #F5F5F5;
		}

		.nav_bg :hover {
			color: #00BFFF;
		}

		.tweet:hover {
			background-color: #00BFFF !important;
			border-color: white !important;
			color: white;
		}

		.search:hover {
			background-color: #00BFFF !important;
			border-color: white !important;
			color: white;
		}

		/* .search {
			background-color: #00BFFF !important;
			border-color: white !important;
			color: white;
		} */



		/* .fixed-left {
			position: fixed;
		} */

		.top {
			height:50px;
		}
	</style>
</head>



<body style="background-color: #F5F5F5;">
	<div class="container-fluid">
		<div class="row" style="height: 100vh;">
			<!-- setting column  -->
			<div class="col-2 border-end border-2 nav_bg" >
				<div class="list-group mt-2 position-fixed">
					<a href="#" class="list-group-item list-group-item-action d-flex justify-content-center border-0">
						<i class="fa fa-twitter"></i>
					</a>
					<a href="#" class="list-group-item list-group-item-action d-flex border-0">
						<span class="material-symbols-outlined">Home
						</span>
						<div class="mx-3">Home</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							explore
						</span>
						<div class="mx-3">Explore</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							notifications
						</span>
						<div class="mx-3">Notification</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							mail
						</span>
						<div class="mx-3">Message</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							bookmark
						</span>
						<div class="mx-3">Bookmark</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							other_admission
						</span>
						<div class="mx-3">List</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							person
						</span>
						<div class="mx-3">Person</div>
					</a>
					<a href="#" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							settings
						</span>
						<div class="mx-3">Setting</div>
					</a>
					<a href="/logout" class="list-group-item list-group-item-action  d-flex border-0">
						<span class="material-symbols-outlined">
							logout
						</span>
						<div class="mx-3">Logout</div>
					</a>
				</div>
			</div>
			<div class="col-7">
				<div class="container-fluid m-0 p-0">
					<div class="row mb-2">
						<div class="col d-flex mt-2">
							<div> 
								<a href="/" class="me-2">
									<img src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" alt="profile" style="width:60px;height:60px" class="rounded-pill  mt-1">
								</a>
							</div>
							<div style="width: 90%">
								<form action="#">
									<div class="input-group ">
										<input type="text" class="form-control me-2 rounded border-dark border-1 text-start" placeholder="What's in your mind?" style="height:70px">
										<button class="btn border-dark rounded-pill border-2 h-25 tweet my-auto" >Tweet</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- post -->
					<?php for($i = 0; $i < 1; $i++){ ?>
						<div class="row mt-3">
							<div class="col-1">
								<a href="/" class="me-2">
									<img src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" alt="profile" style="width:60px;height:60px" class="rounded-pill  mt-1">
								</a>
							</div>
							<div class="col-10 ms-1">
								<div class="container-fluid p-0 m-0">
									<div class="row">
										<div class="col">
											<div class="d-flex">
												<p class="me-2"><?= $user->first_name ?></p>
												<p>25/5/2024</p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<div>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem ut doloremque, 
												amet laborum similique placeat sunt. Architecto tenetur laudantium excepturi, 
												provident quis itaque. Corrupti eum sapiente necessitatibus? Quos, alias expedita?</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div>
												<img src="https://images.pexels.com/photos/57690/pexels-photo-57690.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" style="width:300px;height:250px"> 
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col d-flex justify-content-between">
											<div>Like</div>
											<div>Comment</div>
											<div>Share</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="row">
						<div class="col">
							<div style="height:30px;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-3 border-start border-2">
				<div class="container-fluid m-0 p-0">
					<div class="row ">
						<div class="col mt-2">
							<div class="p-0 m-0 position-fixed me-3">
								<form class="d-flex border border-2 rounded-pill border-opacity-50" role="search">
									<input class="form-control border border-0 rounded-start-4" type="search" placeholder="" aria-label="Search">
									<button class="btn border search border-0 rounded-end-4" type="submit">Search</button>
								</form>

								<div class="card mt-2">
									<div class="card-body">
										<h5 class="card-title">What's happening now?</h5>
										<p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, laboriosam deserunt. 
											Est laboriosam aperiam culpa repudiandae accusamus nihil illum, 
											voluptates eaque inventore iste, alias, beatae molestias provident in! Deserunt, mollitia.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>