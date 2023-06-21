<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['loginEmail1'];
    $pass =  $_POST['loginpass'];
    $sql = "SELECT * FROM `user` where user_email = '$email'";
    $result = mysqli_query($con,$sql);
    $numrow = mysqli_num_rows($result);
    if($numrow == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_passward'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['sno'] = $row['s_no'];
            echo 'logged in'. $email;
        }
    header('Location: /projects/oline_furm/index.php');
    }
    header('Location: /projects/oline_furm/index.php');
}

?>