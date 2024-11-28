<?php include 'session-check.php';

if(isset($_POST["b1"]))
{
   $filename= $_FILES['profile']['name'];
   $tempname= $_FILES['profile']['tmp_name'];
   $folder= "photo/".$filename;

   $qU=" UPDATE user SET uphoto='$filename' WHERE uid=$id ";

   if(mysqli_query($cn,$qU))
   {
    if(move_uploaded_file($tempname,$folder))
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <style>
   body{
    margin-top: 70px;
  }
  .bg{
    background-color: rgb(92, 175, 214);
}
 </style>
</head>
<body>

<div class="bg">
        <nav class="navbar navbar-expand-sm fixed-top bg-dark shadow-lg bg">
          <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php">
              <span class="p-2"><img src="images/mymovies1.jpeg" alt="logo" width="100%" height="40"> </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mynavbar">

              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link text-white" href="homepage.php"><b>Home</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#about"><b>About</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#contact"><b>Contact</b></a>
                </li>   
                <li class="nav-item">
                  <button class="btn btn-danger " type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"
                  data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="800">
                      <b> Profile</b>
                     </button>
                  </li>
              </ul>
              <div class="m-2">
              <form action="homepage.php" method="get" enctype="multipart/form-data" class="d-flex">
                    <input class="form-control me-2 shadow ms-2" type="text" name="search" placeholder="Search movie" required>
                    <button type="submit" value="Search" name="searchdata" class="btn btn-danger shadow"
                    data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <b>Search</b>
                  </button>
                  </form>
              </div>

                  <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                       <a href="createaccount.php" class="btn btn-danger m-2" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1400">
                        <b>Register</b>
                      </a>
                  </li>
                  <li class="nav-item">
                       <a href="index.php" class="btn btn-danger m-2" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1600">
                        <b>Login</b>
                      </a>
                  </li>
                  <li class="nav-item">
                       <a href="logout.php" class="btn btn-danger m-2" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                        <b>Logout</b>
                      </a>
                  </li>
                  </ul> 
                </div>
              </div>
              
            </nav> 

            <div class="offcanvas offcanvas-start" id="demo">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title"><?php echo $dataU['uemail'] ?></h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
          <div class="col-md-5">
          <?php
               $res=mysqli_query($cn, "SELECT * FROM user WHERE uid=$id");
               $row=mysqli_fetch_assoc($res);
             ?>
            <img src="photo/<?php echo $row['uphoto'] ?>" alt="profile" width="80%" class="rounded-circle">
          </div>
  
        <div>
          <span><?php echo $dataU['ufn'] ?></span> <span><?php echo $dataU['uln'] ?></span><br>
         <span>Mobile No. <?php echo $dataU['umob'] ?></span><br>

         <span><b>Update Profile Picture</b></span>

         <form action="homepage.php" method="post" enctype="multipart/form-data" class="mt-2">
          <input type="file" name="profile"><br>
          <input type="submit" value="Update Profile" name="b1"> 
         </form>
         <br>

        </div>
        <!-- <button class="btn btn-danger" type="button">Close</button> -->
        <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas">Close</button>
      </div>
    </div>

       </div>

        <!-- The contact Modal start -->
 <div class="modal fade modal-lg" id="contact">
  <div class="modal-dialog">
    <div class="modal-content grey">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title myheading">Contact us...</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body px-2">
       <div class="p-2 shadow bg-white overflow">
        <div>
          <h2 class="text-center">Mymovies</h2>
          <div class="row">
            <div class="col-md-6">

              <div class="row mt-5">
                <div class="col-md-3"><a href="#"><img src="images/icon fb.png" alt="fb" width="50px" height="50px"></a></div>
                <div class="col-md-3"><a href="#"><img src="images/icon insta.png" alt="insta" width="50px" height="50px"></a></div>
                <div class="col-md-3"><a href="#"><img src="images/icon toutube.png" alt="youtube" width="50px" height="50px"></a></div>
                <div class="col-md-3"><a href="#"><img src="images/icon twitter.png" alt="twitter" width="50px" height="50px"></a></div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4 mx-auto"><a href="#" class="text-decoration-none text-danger"><h4>Share...</h4></a></div>
              </div>
                
              </div>
      
              <div class="col-md-6">
                <div class="mt-3">
                  <h6 class="text-primary">Call</h6>
                  <p>+91 22 5658 1312</p>
                  <h6 class="text-primary">Go to website</h6>
                  <p>mymovies.com</p>
                  <h6 class="text-primary">Send mail</h6>
                  <p>helpdesk@mymovies.com</p>
                  <h6 class="text-primary">Directions</h6>
                  <p>
                    Big Tree Entertainment Private Limited Ground Floor, Chinya House,<br>
                     YC Collage Road Satara, Maharashtra <br>
                     Satara - (415 001) <br>
                     India
                  </p>
                </div>
              </div>
              </div>
            </div>
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

      <!-- The contact Modal end -->

         <!-- The about Modal start -->
 <div class="modal fade modal-lg" id="about">
  <div class="modal-dialog">
    <div class="modal-content grey">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">About us...</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body px-5">
       <div class="p-5 shadow bg-white">
        
          <h3>Mymovies</h3>
          <hr>
            <p>
              The company is currently India’s largest entertainment platform.
               Search <b>Mymovies</b> started out in 2019 as a software re-seller for movie theaters
                and converted into a platform catering to cloud-based watching and downloading movies.
                 Mymovies was known by the name of its parent company, Bigtree Entertainment Pvt. 
                 Ltd., at the time of its inception.
            </p>
            <hr>
            <p>
              It operates in 5+ countries with more than 3+ million customers. In four years, search <b>Mymovies</b> has been
               through a roller-coaster ride, seeing all kinds of crests and troughs. From INR 25,000 in initial capital to 
               INR 3.2 crores in revenue in FY2023, from the 'Dot Com' crash in the early 2020s to the global financial crisis
                of 2020, the company has a story at par with the Harshal v/s Kushal legend. It managed to sail through tough 
                times and emerged as a winner in the end.
            </p>
            <hr>
            <div>
              <h3>Company Profile</h3>
              <hr>
              <div class=""> <h4>Mymovies</h4></div>
        
              <div class="row border">
                <div class="col-md-4">
                 <b>Type</b>
                </div>
                <div class="col-md-8">
                  Private
                </div>
              </div>
              <div class="row border">
                <div class="col-md-4">
                 <b>Industry</b>
                </div>
                <div class="col-md-8">
                  E-Commerce
                </div>
              </div>
              <div class="row border">
                <div class="col-md-4">
                 <b>Founded</b>
                </div>
                <div class="col-md-8">
                  2019
                </div>
              </div>
              <div class="row border">
                <div class="col-md-4">
                 <b>Founders</b>
                </div>
                <div class="col-md-8">
                  Harshal Gaikwad, <br>
                  Yash Pawar
                </div>
              </div>
              <div class="row border">
                <div class="col-md-4">
                 <b>Area Served</b>
                </div>
                <div class="col-md-8">
                  Asia and Oceania
                </div>
              </div>
              <div class="row border">
                <div class="col-md-4">
                 <b>Services</b>
                </div>
                <div class="col-md-8">
                  Online watch and download Movie<br>
                  At anywhwere in the world
                </div>
              </div>
              <div class="row border">
                <div class="col-md-4">
                 <b>Parents</b>
                </div>
                <div class="col-md-8">
                  www.bigtree.in
                </div>
              </div>
              <div class="row border">
                <div class="col-md-4">
                 Website
                </div>
                <div class="col-md-8">
                  <a href="homepage.php">www.mymovies.com</a>
                </div>
              </div>
            </div>
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

      <!-- The about Modal end -->


<script>
  AOS.init();
</script>      
</body>
</html>

