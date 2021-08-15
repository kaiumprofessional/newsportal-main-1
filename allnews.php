<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<title>Admin</title>
</head>

<body>

	<section class="container-fluid main">

		<div class="row">
			<div class="col-md-2 left">
				<div class="icon">
					<ul>
						<li>
							<a href="admin.php?news=pending"> <i class="bi bi-hourglass-split"></i> Pending News </a>
						</li>
						<li>
							<a href="admin.php?news=all"> <i class="bi bi-card-list"></i> All News </a>
						</li>
						<li>
							<div class="dropdown">
								<button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="bi bi-grid"></i> Pages
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="index.php">Home</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="sports.php">Sports</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="business.php">Business</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="corona.php">Corona</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="foods.php">Foods</a></li>
								</ul>
							</div>
						</li>
					</ul>






				</div>
			</div>

			<div class="col-md-10 ">
				<div class="container overflow-hidden mt-5 right ">
					<div class="row gx-5">
						<div class="col">
							<div class="p-3 border bg-light">

								<?php
								
								 
								$conn = new mysqli("localhost", "root", "", "newsportal");
								$searchQuery = "SELECT * FROM news where approved = 1;";
								$result = $conn->query($searchQuery);

								while ($row = $result->fetch_assoc()) {

								?>

									<div class="card" style="width: 29rem; margin: 0 auto;">
										<img src="	<?php echo "newsimages/" . $row['imagename']; ?>  " class="card-img-top img-fluid img-thumbnail" alt="...">
										<div class="card-body">
											<h5 class="card-title"> <?php echo $row['category']; ?> </h5>
											<div class="accordion-item">
												<h2 class="accordion-header" id="headingTwo">
													<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														<?php echo $row['title']; ?>
													</button>
												</h2>
												<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
													<div class="accordion-body">
														<?php echo $row['content'] ?>
													</div>
												</div>
											</div>
											<div class="btn-group mt-2" role="group" aria-label="Basic mixed styles example">

												<!-- <a href="includes/approve.php?approveid=<?php echo $row['id']; ?>" class="btn btn-warning">Approve</a> -->
												<a href="includes/approveall.php?deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>

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
			</div>

		</div>

	</section>



	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>