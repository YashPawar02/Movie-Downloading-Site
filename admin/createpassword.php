<?php
$cn=mysqli_connect("localhost","root","","mymovies");


if(isset($_POST["b1"]))
{
    $email = $_POST['email'];
    $npwd = $_POST['npwd'];
    $cpwd = $_POST['cpwd'];
   

        if($npwd == $cpwd)
        {        
    $qU="UPDATE admin SET apwd = '$npwd' WHERE aemail = '$email'";
            if(mysqli_query($cn,$qU))
            {
                session_destroy();
                echo "<script>
                alert('Updated password');
                window.location.href='index.php';
                </script>";
            }

            else
            {
                $msg ="Failed To Update Password";
            }

        }
        else
        {
            $msg="Password does not match";
        }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update password</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
 <style>
     h1{
    font-size: 80px;
    font-weight: 800;
    background-image: url(images/mymovies.jpeg);
    background-position:center;
    background-size: cover;
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
}
.bg-img{
    background-image: url(images/d4.jpg);
    background-size: cover;
}
 </style>
</head>
<body class="bg-img text-white">

<div class="col-md-7 mx-auto">
   <div class="col-md-6 mx-auto">
     <h1 class="animate__animated animate__fadeInDown animate__delay-1s mt-5">MYMOVIES</h1>
     <h4 class="animate__animated animate__fadeInDown animate__delay-2s text-center"><-- Get Your Favourite Movies --></h4>
   </div>
</div>


           <!--Forgot Password-->

           <div class="col-md-3 mx-auto mt-2 p-3 shadow-lg animate__animated animate__fadeInDown animate__delay-1s">
            <h4 class="text-center">Update Password</h4>
         <form action="createpassword.php" method="post">
             <span>Email</span><br>
             <input type="email" name="email" id="" required placeholder="Email" class="form-control mb-3 shadow">
             <span>New Password</span><br>
             <input type="password" name="npwd" id="" required placeholder="New Password" class="form-control mb-3 shadow">
             <span>Confirm Password</span><br>
             <input type="password" name="cpwd" id="" required placeholder="Confirm Password" class="form-control mb-4 shadow">
             <p class="text-center"><input type="submit" value="Update password" name="b1" class="btn btn-sm btn-dark shadow"></p>
             <p class="text-end">
                <a href="forgotpassword.php" class="btn btn-dark btn-sm">Back</a>
             </p>
         </form>
        </div>
</body>
</html>