<?php error_reporting(0);

$msg = "";

if (isset($_POST['upload'])) {

    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $filename = $_FILES["uploadfile"]["name"];
    $destname   = "folder/" . $filename;

    if (move_uploaded_file($tempname, $destname)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
</head>

<body>

    <h2><?php echo $msg; ?></h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="uploadfile" />
        <button type="submit" name="upload">UPLOAD</button>
    </form>
</body>

</html>