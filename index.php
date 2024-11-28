<?php
$cn =mysqli_connect("localhost","root","","mymovies");
$msg ="";

if(isset($_POST['b1']))
{
    $email  =$_POST['email'];
    $pwd  =$_POST['pwd'];

    $qS="SELECT * FROM user WHERE uemail = '$email' AND upwd = '$pwd'";
    $result = mysqli_query($cn,$qS);
    $count = mysqli_num_rows($result);

    if($count ==1)
        {
            session_start();
            $data = mysqli_fetch_assoc($result);
           // var_dump($data);
           $_SESSION['id'] =$data['uid'];
           echo "<script>
            alert('Login Successfully');
            window.location.href='homepage.php';
            </script>";

        }
    else
    {
        echo "<script>
            alert('Email or password is incorrect');
            </script>";
    }
        

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
*
{
    margin: 0;
    padding: 0;
}
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
    background-image: url(images/d8.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    width: 80%;
}
     
    </style>
</head>
<body class="bg-img">
     <!--Login Model-->
     <div class=" mt-5 row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-1">
            
        </div>
        <div class="col-md-4">

        </div>
        <div class="mt-5 col-md-5">
          <div class=" text-center animate__animated animate__bounceInLeft animate__delay-0.5s">
        <h1 class="animate__animated animate__bounceInLeft animate__delay-1s">MYMOVIES</h1>
        <h4 class="animate__animated animate__bounceInLeft animate__delay-2s text-white mb-3"><-- Get Your Favourite Movies --></h4>
          </div>
          <div class=" p-3 animate__animated animate__bounceInRight animate__delay-1s">
        <h4 class="text-center text-white">Login here...</h4>
     <form action="index.php" method="post" class="">
         <span class="text-white">Enter Email</span><br>
         <input type="email" name="email" id="" required placeholder="Enter email" class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-2s">
         <span class="text-white">Enter Password</span><br>
         <input type="password" name="pwd" id="" required placeholder="Enter password" class="form-control mb-4 shadow animate__animated animate__zoomInUp animate__delay-3s">
         <p class="text-center"><input type="submit" value="Login" name="b1" class="btn btn-sm btn-dark shadow animate__animated animate__zoomInUp animate__delay-4s"></p>
         <p class="text-center">
            <a href="createaccount.php" class="text-decoration-none animate__animated animate__zoomInUp animate__delay-5s">Create new account</a>
            <a href="forgotpassword.php" class="text-decoration-none text-danger animate__animated animate__zoomInUp animate__delay-5s"> / Forgot password</a>
        </p>
     </form>
          </div> 
         </div>
      </div>
    </div>

</body>
</html>