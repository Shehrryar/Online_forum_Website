<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'db.php';
    $user_email = $_POST['signuipemail'];
    $user_passward = $_POST['password'];
    $user_cpassward = $_POST['cpassword'];
}

$exist_sql = "SELECT * FROM `user` WHERE user_email = '$user_email'";
$result = mysqli_query($con, $exist_sql);
$numrow = mysqli_num_rows($result);
if($numrow > 0){
    $showerror = "Email already Exists.";
    echo $showerror;
}
else{
    if($user_passward == $user_cpassward){
        $hash = password_hash($user_passward, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO `user` (`user_email`, `user_passward`, `datetime`) VALUES ('$user_email', '$hash', current_timestamp())";
        $result = mysqli_query($con, $sql);
        echo $result;
        if($result)
        {
            $showalert = true;
            header('Location: /projects/oline_furm/index.php?signupsucess=true');
            // header("Location : index.php?signupsucess=true");
            exit();
        }
    }
    else{
        $showerror = "passward does not match";
    }
    header('Location: /projects/oline_furm/index.php?signupsucess=false');
}

?>