<?php

$message = "";
$image = "https://cdn3.iconfinder.com/data/icons/vector-icons-6/96/256-512.png";
$alertClasses = "hidden";

// Check if image file 
if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] !== "") {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = true;

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        $message =  "File is not an image.";
        $alertClasses = "alert-danger";
        $uploadOk = false;
    } else {

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $message = "The file " . basename($_FILES["image"]["name"]) . " has been uploaded";
            $image = $target_file;
            $alertClasses = "alert-success";
        } else {
            $message =  "Sorry, there was an error uploading your file.";
            $alertClasses = "alert-danger";
        }
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Sign up here ...</h1>

        <div class="alert <?php echo $alertClasses; ?>" role="alert">
            <?php echo $message; ?>
        </div>

        <form method="post" enctype="multipart/form-data">

            <img src="<?php echo $image; ?>" class="img-thumbnail w-25" alt="...">
            <div class="mb-3">
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input class="form-control" type="file" name="image" id="image">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
            </div>

            <button type="submit" name="signup" class="btn btn-primary">Signup</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>