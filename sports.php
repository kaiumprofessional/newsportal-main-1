<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/corona.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<title>SPORTS</title>
</head>

<body>

	<?php include 'header.php' ?>

	<hr class="hori">



	<h1 class="mt-3 text-center main-text">SPORTS</h1>


	<article class="latest mt-5 container">



		<?php
		$conn = new mysqli("localhost", "root", "", "newsportal");
		$searchQuery = "SELECT * FROM news WHERE approved = 1 AND category = 'sports';";
		$result = $conn->query($searchQuery);

		while ($row = $result->fetch_assoc()) {
			$content = $row['content'];
			$content = substr($content, 0, 30);


		?>


			<div class="card mb-3" style="max-width: 540px;">
				<div class="row g-0">

					<div class="col-md-8">
						<div class="card-body">
							<a href="<?php echo 'opennews.php?newsid=' . $row['id'] ?>" style="text-decoration: none; color:black" class="">
								<h5 class="card-title"><?php echo $row['title']; ?></h5>
							</a>
							<p class="card-text"><?php echo $content; ?></p>
							<p class="card-text"><small class="text-muted"> <i class="bi bi-stopwatch"></i><?php echo $row['publish'];?></small></p>

						</div>
					</div>
					<div class="col-md-4 pic">
						<a href="<?php echo 'opennews.php?newsid=' . $row['id'] ?>">
							<img src="<?php echo "newsimages/" . $row['imagename']; ?>" class="img-fluid rounded-start" alt="...">
						</a>
					</div>
				</div>
			</div>

		<?php
		}
		?>



	</article>





























	<footer class="last container-fluid">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>