<?php
$cn=mysqli_connect("localhost","root","","mymovies");

if(isset($_POST['b1']))
{
    $email = $_POST['email'];
    $mn = $_POST['mn'];
    $pwd = $_POST['pwd'];

    $qF="SELECT * FROM admin WHERE  aemail='$email' AND amn='$mn'";

    $resultF = mysqli_query($cn,$qF);
    $count = mysqli_num_rows($resultF);

        if($count == 1)
        {
            session_start();
            $dataF = mysqli_fetch_assoc($resultF);
           // var_dump($dataF);
                $_SESSION['email']  = $dataF['aemail'];

                echo "<script>
                window.location.href='createpassword.php';
                </script>";

        }

        else
        {
           echo "<script>alert('invalid')</script>";
        }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
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
    background-image: url(images/d1.jpg);
    background-size: cover;
}
 </style>
</head>
<body class="bg-img text-white">
    <div class="col-md-7">
     <div class="col-md-6">
      <h1 class="mt-5 ms-2 animate__animated animate__fadeInDown animate__delay-1s">MYMOVIES</h1>
      <h4 class="animate__animated animate__fadeInDown animate__delay-2s text-white ms-5"><-- Get Your Favourite Movies --></h4>
     </div>
    </div>

           <!--Forgot Password-->

           <div class="col-md-3 ms-5 p-3 shadow-lg animate__animated animate__fadeInDown animate__delay-1s">
            <h4 class="text-center">Forgot Password</h4>
         <form action="forgotpassword.php" method="post">
             <span>Email</span><br>
             <input type="email" name="email" id="" required placeholder="Email" class="form-control mb-3 shadow">
             <span>Middle name</span><br>
             <input type="text" name="mn" id="" required placeholder="Middle name" class="form-control mb-3 shadow">
             <span>Old Password</span><br>
             <input type="password" name="pwd" id="" required placeholder="Old Password" class="form-control mb-3 shadow">
             <p class="text-center"><input type="submit" value="Create new password" name="b1" class="btn btn-sm btn-dark shadow"></p>
             <p class="text-end">
                <a href="login.php" class="btn btn-dark btn-sm">Back</a>
             </p>
         </form>
        </div>
</body>
</html>