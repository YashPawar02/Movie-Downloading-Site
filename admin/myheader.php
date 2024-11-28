<?php include 'session-check.php';
$msg="";
if(isset($_POST["b1"]))
{
   $filenm= $_FILES['profile']['name'];
   $tempnm= $_FILES['profile']['tmp_name'];
   $folder= "photo/".$filenm;

   $qU=" UPDATE admin SET aphoto='$filenm' WHERE aid=$id ";

   if(mysqli_query($cn,$qU))
   {
    if(move_uploaded_file($tempnm,$folder))
    {
      echo "<script>alert('Profile Updated');
      window.location.href='homepage.php';
      </script>";
    }
    else
    {
    }
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mymovies</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js"></script>
 <style>
  body{
    margin-top: 70px;
  }
 </style>
</head>
<body class="">
   
<div>
        <nav class="navbar navbar-expand-sm fixed-top bg-white navbar-dark shadow-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">
              <span class="myfont text-dark shadow">MYMOVIES</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">

              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link text-dark" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                  <button class="btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                       Profile
                     </button>
                  </li>
              </ul>

              <div class=" me-auto">
              <form action="homepage.php" method="get" enctype="multipart/form-data" class="d-flex">
                    <input class="form-control me-2 shadow ms-2" type="text" name="search" placeholder="Search">
                    <button type="submit" value="Search" name="searchdata" class="btn btn-outline-dark shadow">Search</button>
                  </form>
              </div>

                  <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                       <a href="logout.php" class="btn btn-dark">Logout</a>
                  </li>
                  </ul> 
                </div>
              </div>
              
            </nav> 

            <div class="offcanvas offcanvas-start" id="demo">
      <div class="offcanvas-header">
      <h3 class="offcanvas-title"><?php echo $dataA['aemail'] ?></h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
          <div class="col-md-5">
          <?php
               $res=mysqli_query($cn, "SELECT * FROM admin WHERE aid=$id");
               $get=mysqli_fetch_assoc($res);
             ?>
            <img src="photo/<?php echo $get['aphoto'] ?>" alt="profile" width="80%" class="rounded-circle">
          </div>
  
        <div>
         
          <span><?php echo $dataA['afn']; ?></span> <span><?php echo $dataA['aln']; ?></span><br>
         <span>Mobile No. <?php echo $dataA['amob'] ?></span> <br>

         <span><b>Update Profile Picture</b></span>

         <form action="homepage.php" method="post" enctype="multipart/form-data"  class="mt-2">
          <input type="file" name="profile" required><br>
          <input type="submit" value="Update Profile" name="b1"> 
         </form>
         <br>

        </div>
        <!-- <button class="btn btn-danger" type="button">Close</button> -->
        <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas">Close</button>
      </div>
    </div>
  </div>
 </div>


</body>
</html>