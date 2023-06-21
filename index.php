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
    <style type="text/css">
    /*    #im_ag{
            background-image:url('images/userdefault.jpg');
        }*/
    </style>
</head>

<body>
    <?php include 'partials/_header.php' ?>
    <?php include 'partials/db.php' ?>
    <div class="container my-3">
        <h1 class="text-center">IDiscuss - Browse Categories</h1>
        <div class="row">
        <?php
        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($con ,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $cat = $row['catagory_name'];
            $desc = $row['catagory_discription'];
            $cat_id = $row['catagory_id'];
            $cat_img = $row['img'];

            echo'
            <div class="col-md-4 my-2">
            <div class="card" style="width: 18rem;">
                <img id = "im_ag"  src= "admin/images/'.$cat_img.'", coding" class="card-img-top rounded" alt="Not Found">
                <div class="card-body my-2">
                    <h5 class="card-title"><a href = "threadlist.php?catid = '.$cat_id.'">'.$cat.'</a></h5>
                    <p class="card-text">'.substr($desc, 0 , 50).'........</p>
                    <a href="threadlist.php?catid='.$cat_id.'" class="btn btn-primary">View thread</a>
                </div>
            </div>
        </div>';
        }
        ?>
      
        </div>
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