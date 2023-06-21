<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>idiccuss_ coding forum</title>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <?php include 'partials/db.php' ?>
    <?php
    $id = intval($_GET['catid']);
    // $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` where catagory_id =  $id";
    $result = mysqli_query($con ,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['catagory_name'];
        $catdesc = $row['catagory_discription'];
    }
    ?>

    <?php
    $showalert = False;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', $sno, '$id', current_timestamp())";
        $result = mysqli_query($con ,$sql);
        $showalert = True;
        if($showalert){
            echo'<div class="alert alert-success" role="alert">
            The comment is added.
          </div>
          ';
        }
    }
    ?>

    <div class="container my-3">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname?> forum</h1>
            <p class="lead"><?php echo $catdesc?> </p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge to each other.
                Keep it friendly.
                Be courteous and respectful. Appreciate that others may have an opinion different from yours.
                Stay on topic.
                Share your knowledge.
                Refrain from demeaning, discriminatory, or harassing behaviour and speech.
            </p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>

    <?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
echo'
    <div class="container">
        <h1 class="py-2">Start a Disccussion</h1>
        <form action = "'.$_SERVER['REQUEST_URI']. '" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Problem title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Keep your title clear and short</div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Elaberate your concern</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        <input type="hidden" name = "sno" value = '.$_SESSION['sno'].'>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>';
    }
    else
    {
        echo'
        <div class="container">
        <h1 class="py-2">Start a Disccussion</h1>
            <p class="lead"> Please login. To start the discission</p>
        </div>';
    }
    ?>


    <div class="container">
        <h1 class="py-2">Browse Questions</h1>

        <?php 
            $id = intval($_GET['catid']);
            // $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
            $result = mysqli_query($con ,$sql);
            $noresult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noresult = false;
                $thredid = $row['thread_id'];
                $threadtitle = $row['thread_title'];
                $threaddesc = $row['thread_desc'];
                $threadtime = $row['timestamp'];
                $thread_user_id = $row['thread_user_id'];
                $sql2 = "SELECT user_email FROM `user` where s_no = $thread_user_id";
                $result2 = mysqli_query($con ,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
        
        echo'
        <div class="media my-3">
            <img src="images/userdefault.jpg" width="54px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">Asked by '.$row2['user_email'].' at '.$threadtime.'</p>
                <h5 class="mt-0"><a class = "text-dark" href="thread.php?threadid='.$thredid.'">'.$threadtitle.' </a></h5>
                <p>'.$threaddesc.'</p>
            </div>
        </div>';
    }
    if($noresult){
        echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Comments Found</p>
                        <p class="lead"> Be the first person to comment</p>
                    </div>
                 </div> ';
    }
    ?>
    </div>
    <?php include 'partials/_footer.php'?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>