<?php session_start();
    $cn= mysqli_connect("localhost","root","","mymovies");
    if(isset($_POST['b1']))
    {
        $fn=$_POST["fn"];
        $mn=$_POST["mn"];
        $ln=$_POST["ln"];
        $email=$_POST["email"];
        $mob=$_POST["mob"];
        $pwd=$_POST["pwd"];
        $cpwd=$_POST["cpwd"];

        $qS="SELECT * FROM admin WHERE aemail='$email'";
        $result=mysqli_query($cn,$qS);
        $count=mysqli_num_rows($result);

        if($count==0)
        {
            if($pwd==$cpwd)
            {
                $qI="INSERT INTO admin(afn,amn,aln,aemail,amob,apwd,aphoto)
               VALUES ('$fn','$mn','$ln','$email','$mob','$pwd','-')";
    
               if(mysqli_query($cn,$qI))
            {
               echo "<script>
                alert('Acount Created Successfully');
                window.location.href='index.php';
                 </script>";
    
            }
            }
            else
            {
               echo "<script>alert('Password does not match')</script>";
            }
        }
        else
        {
             echo "<script>alert('email already exists');</script>";
        }
         
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create new account</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>

.mybg{
        background-image: url(images/d6.jpg);
        background-size: cover;
       }
</style>
</head>
<body class="mybg">
     <!--Create new acoount model-->

     <div class="col-md-4 mt-4 ms-5">
       
     <div class="p-3 shadow-lg text-white animate__animated animate__fadeInRight">
        <h4 class="text-center">Create new account</h4>
     <form action="createaccount.php" method="post">
         <span>First name</span><br>
         <input type="text" name="fn" id="" required placeholder="First name" class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-1s">
         <span>Middle name</span><br>
         <input type="text" name="mn" id="" required placeholder="Middle name" class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-1s">
         <span>Last name</span><br>
         <input type="text" name="ln" id="" required placeholder="Last name" class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-2s">
         <span>Email</span><br>
         <input type="email" name="email" id="" required placeholder="Email" class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-2s">
         <span>Mobile No.</span><br>
         <input type="number" name="mob" id="" required placeholder="Mobile No." class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-3s">
         <span>Password</span><br>
         <input type="password" name="pwd" id="" required placeholder="Password" class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-3s">
         <span>Confirm Password</span><br>
         <input type="password" name="cpwd" id="" required placeholder="Confirm password" class="form-control mb-3 shadow animate__animated animate__zoomInUp animate__delay-4s">
         <p class="text-center"><input type="submit" value="Create Account" name="b1" class="btn btn-sm btn-dark shadow animate__animated animate__zoomInUp animate__delay-4s"></p>
         <p class="text-end">
            <a href="index.php" class="btn btn-dark btn-sm animate__animated animate__zoomInUp animate__delay-5s">Back</a>
         </p>
     </form>
    </div>

    </div>
</body>
</html>