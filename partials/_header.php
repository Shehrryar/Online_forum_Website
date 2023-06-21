
<?php
session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="\projects\oline_furm">IDisscuss</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="\projects\oline_furm">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">Contact us</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Catagories
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
  </ul>
  <div class = "row mx-2 ml-auto">';

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
  {
    echo'
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    <p mx-2 my-0> welcome  '.$_SESSION['useremail'].' to online furm</p>
  <a href = "partials/logout.php" class="btn btn-outline-success mx-2" type="submit" ">Logout</a>
  </form>
';
  }
  else{
    echo'  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <button class="btn btn-outline-success ml-2" type="submit" data-toggle="modal" data-target="#signupmodal">Signup</button>
  <button class="btn btn-outline-success mx-2" type="submit" data-toggle="modal" data-target="#loginmodal">Login</button>';
  }
  echo'</div>
</nav>';

include 'partials/loginmodal.php';
include 'partials/signupmodal.php';

if(isset($_GET['signupsucess']) && $_GET['signupsucess'] == "true"){
  echo "<div class='alert alert-success' role='alert'>
  Now you are able to login!
</div>";
 }
else
{
  echo'
  <div class="alert alert-warning" role="alert">
  please first register your account!
</div>
';

}
?>