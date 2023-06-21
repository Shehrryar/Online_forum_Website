<!doctype html>
<html lang="en">
<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = True){
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php 
echo '
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="topic.php">Add topic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href = "show_recoed.php">Show data</a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
            </div>
    </nav>
    </div>
    <div class="container">
        <form method="POST" action = "cat_entry.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="catagoryname" name="catagoryname"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category Description</label>
                <input type="text" class="form-control" name="catagorydiscription" id="catagorydiscription">
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="exampleCheck1">Date </label>
                <input type="date"  class="form-control" id="date" name="date">
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="exampleCheck1">Image </label>
                <input type="file"  class="form-control" id="file_img" name="fileimg">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>';
    
}
else{
    header("location: index.php");
}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>