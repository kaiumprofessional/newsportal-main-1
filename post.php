<?php

session_start();
$reporterId = $_SESSION["reporterId"];

$conn = new mysqli("localhost", "root", "", "newsportal");

$searchQuery = "SELECT * FROM reporter WHERE id='$reporterId';";

$result = $conn->query($searchQuery);
$row = $result->fetch_assoc();

$reporterId = $row['id'];
$reportername = $row['username'];
$reportercategory = $row['category'];



// insert news

if (isset($_POST['publish'])) {

	$title = $_POST['title'];
	$content = $_POST['content'];

	$tempname = $_FILES["image"]["tmp_name"];
	$imagename = $_FILES["image"]["name"];

	$destname   = "newsimages/" . $imagename;

	move_uploaded_file($tempname, $destname);

	date_default_timezone_set("Asia/Dhaka");
	$publish = date("F j, Y");

	$insertquery = "insert into news (imagename, title, content, reporterid, reportername, category, approved, publish)
	values ('$imagename', '$title', '$content', '$reporterId', '$reportername', '$reportercategory', 0, '$publish');";

	$conn->query($insertquery);
}

?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="css/post.css">
	<title>NewsPortal</title>
	


</head>

<body>

	<div class="container-fluid">

		<div class="left">
			<ul>
				<li>
				<button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="<?php echo $row['id'] ?> |  <?php echo $row['username'] ?>" data-bs-content="Email:<?php echo $row['email'] ?> category:<?php echo $row['category'] ?> "    ><i class="bi bi-person-square"></i></button>
				
				</li>
				<li>
					<a href="index.php"><i class="bi bi-house-fill"></i></a>
				</li>
				<li>
					<a href="index.php#contact"><i class="bi bi-bug-fill"></i></a>
				</li>
			</ul>
		</div>

	</div>

	

	<div class="post">

			<div class="mt-5">
				<h3 class="bg-warning text-center">Add Post</h3>
				<div class="row mt-5">

					<form class="col-md-7 " method="post" action="post.php" enctype="multipart/form-data">
						<div class="mb-3 alert alert-info">
							Post a News
						</div>
						<div class="mb-3">
							<label for="postFormControlInput1" class="form-label">News Title</label>
							<input type="text" name="title" class="form-control" required id="postFormControlInput1">
						</div>
						<div class="mb-3">
							<label for="formFileLg" class="form-label">Upload an image</label>
							<input type="file" name="image" class="form-control" required id="formFileLg">
						</div>
						<div class="mb-3">
							<label for="postFormControlTextarea1" class="form-label">News content</label>
							<textarea name="content" class="form-control" required id="postFormControlTextarea1" rows="20"></textarea>
						</div>


						<div class="mb-3">
							<button type="submit" name="publish" class="btn btn-success"> Publish </button>
						</div>


					</form>

					<div class="col-md-4">

						<figure class="position-relative">

							<img class="position-absolute right-4" src="images/girl_laptop.png" alt="" srcset="">
						</figure>


					</div>
				</div>
			</div>




		</div>
	</div>



	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
	<script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- Option 2: Separate Popper and Bootstrap JS -->

	<script>
		var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
})

	</script>




</body>

</html>