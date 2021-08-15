<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<title>NewsPortal</title>
</head>

<body>


	<?php include 'header.php' ?>

	<hr class="hori">


	<div class="navbar container">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="index.php">LATEST</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./corona.php">CORONA VIRUS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./business.php">BUSINESS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./sports.php">SPORTS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./foods.php">FOOD</a>
			</li>

		</ul>


	</div>



	<section class="main mt-4">

		<div class="overlay">
			<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="images/food.jpg" class="d-block w-100 img-fluid" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>FOOD</h5>

						</div>
					</div>
					<div class="carousel-item">
						<img src="images/travel.jpg" width="400px" height="400px" class="d-block w-100 " alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>TRAVEL</h5>

						</div>
					</div>
					<div class="carousel-item">
						<img src="images/sports.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>SPORTS</h5>

						</div>
					</div>
					<div class="carousel-item">
						<img src="images/technology.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<h5>TECHNOLOGY</h5>

						</div>
					</div>
				</div>
				<!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span> -->
				</button>
			</div>


		</div>


	</section>

	<div class="title">
		<h1>LATEST NEWS</h1>
		<hr class="lat">
	</div>


	<?php
	$conn = new mysqli("localhost", "root", "", "newsportal");
	$searchQuery = "SELECT * FROM news WHERE approved = 1 ORDER BY id DESC;";
	$result = $conn->query($searchQuery);
	?>


	<section class="latest mt-5">

		<div class="container">

			<div class="row">

				<div class="col-lg-6 pic">
					<?php
					$i = 2;
					while ($i--) {
						$row = $result->fetch_assoc();
					?>

						<div class="overlay mt-4">
							<!-- <img src="images/man.jpg" alt=""> -->
							<a href="<?php echo 'opennews.php?newsid=' . $row['id'] ?>">
								<img style=" width: 100%; height: 100%;opacity: .6; border: 1px solid red;box-shadow: 4px 6px 3px 2px salmon;" src="<?php echo "newsimages/" . $row['imagename']; ?>" alt="">
							</a>

						</div>

					<?php
					}
					?>


				</div>


				<div class="col-lg-6">
					<div class="row d-flex">


						<?php
						while ($row = $result->fetch_assoc()) {

						?>


							<div class="card mb-3 widthset" style="max-width: 540px;">
								<div class="row g-0">
									<div class="col-md-4">
										<a href="opennews.php?newsid=<?php echo $row['id'] ?> ">
											<img src="<?php echo "newsimages/" . $row['imagename']; ?>" style="height:260px;" class="img-fluid  mt-3 rounded-start" alt="...">
										</a>
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<a href="<?php echo 'opennews.php?newsid=' . $row['id'] ?>" style="text-decoration: none; color:black" class="">
												<h3 class="card-title"><?php echo $row['title']; ?></h3>
											</a>

											<p class="card-text"><?php echo substr($row['content'], 0, 200) . "..."; ?></p>
											<p class="card-text"><small class="text-muted"> <i class="bi bi-stopwatch"></i><?php echo $row['publish'];?></small></p>
										</div>
									</div>
								</div>
							</div>

						<?php
						}
						?>


					</div>
				</div>

			</div>

		</div>



	</section>


	

	<footer class="last container-fluid" id='contact'>
		<div class="left">
			<h1>Subscribe For Latest Update</h1>
			<p>Indie folks start out by making something they want to read, that tell stories they want told..</p>

		</div>
		<div class="email">
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Email" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Subscribe</button>
			</form>
		</div>

				

	</footer>


	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
	
	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->




</body>

</html>