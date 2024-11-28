<?php include 'session-check.php';?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mymovies</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        .bg-img{
    background-image: url(images/b.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
}
.bg-image{
    background-image: url(images/b6.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
   
}
        .myflow {
        width: 500px;
        height: 366px;
        border: 1px solid white;
        overflow: auto;
      }
        img:hover  {
        scale: 1.05;
      }
       #overflow
       {
        height: 300px;
        border: 1px solid white;
        overflow: auto;
       }
       .mybtn
{
    padding: 0.5rem 1rem;
    background: red;
    color: #fff;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.5s ease-in-out;
    box-shadow: 1px 1px 1px black;
}
.mybtn:hover
{
  box-shadow: 0px 7px 10px rgba(0,0,0,0.5);
}
    </style>
</head>
<body class="">
    <?php include 'myheader.php'; ?>
   
    <div class="row mx-auto mt-3 px-2 bg-img">

<div class="col-md-7" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="2000">

      <!-- Carousel Start -->
<div id="demo" class="carousel slide p-2 shadow-lg" data-bs-ride="carousel">

<!-- The slideshow/carousel -->
<div class="carousel-inner">

  <div class="carousel-item active">
      <img src="images/mymovies.jpeg" alt="slide" class="d-block" width="100%" height="350">  
  </div>  
  <?php
               $addslide=mysqli_query($cn, "SELECT * FROM addslides");
               while($add=mysqli_fetch_assoc($addslide))
               {
             ?>
<div class="carousel-item">
<a href="#">
      <img src="admin/slides/<?php echo $add['slide']; ?>" alt="slide" class="d-block" width="100%" height="350"> 
</a> 
</div>  
<?php   }  ?>

</div>


<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>

 <!-- Carousel End -->

</div>

 <div class="col-md-5 mx-auto p-3 shadow myflow" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
   <h3> Disclaimer:</h3>
 <p> All My Post are Free Available On INTERNET Posted By Somebody Else,
  I’m Not VIOLATING Any COPYRIGHTED LAW. If Anything Is Against LAW, Please Notify Me So That It Can Be Removed.
</p>
  <p>
  We remove postings as soon as we can, usually within 1-4 days. Thank you for your understanding.
</p>
  <h4>Copyrighted Contents???</h4>
  <p> What to do if I want you to remove certain copyrighted comments from your website?</p>
<p> Please note that we do not host any copyrighted content on this website. The comments (text) 
  contains only information shared by users that do not contain data that might be copyrighted in
   any way.However, we offer a service to remove comments from our website if the copyright holder 
   of the content requests so. These removal requests are only valid if:
  </p>
<p>
  You are, or your company is, the copyright holder of the content in question.
  You provide the exact URLs to the comment.
  You provide the complete name(s) of the content in question.
  You send the removal request using a verifiable email address (e.g. address@yourname/yourcompany.com).
  If your request complies with all of these rules, send a mail with Contact us page. Please keep the correspondence polite.
  We remove postings as soon as we can, usually within 4 days. Keep in mind that we can only handle removal requests that comply with the above rules.
</p>
 </div>
 </div>

 <?php 

if(isset($_GET["searchdata"]))
{
  $search=$_GET["search"];
  $qS="SELECT * FROM addmovies WHERE moviename='$search'";
  $result=mysqli_query($cn,$qS);
  $count=mysqli_num_rows($result);
  if($count==1)
  {
    $data= mysqli_fetch_assoc($result);
   // var_dump($data);
  }
  else
  {
    echo "<script>
        alert('Result Does Not Match');
        window.location.href='homepage.php';
         </script>";
  }
  
}
?>

<?php
if(isset($_GET["searchdata"]))
{
$search=$_GET["search"];
$qS="SELECT * FROM addmovies WHERE moviename='$search'";
$result=mysqli_query($cn,$qS);
   if ($data= mysqli_fetch_assoc($result))
   {
    ?>
    <div class="col-md-3 px-3 my-3 text-center">
    <h3 class="text-start">Searched:-</h3>
      <a href="#" class="text-decoration-none text-dark ms-4 ps-2">
      <img src="admin/movies/<?php echo $data['picture']; ?>" alt="<?php echo $data['moviename']; ?>" width="95%" height="400px" class="mb-3">
      <span class=""><b><?php echo $data['moviename']; ?></b></span>
      </a>
      <form action="homepage.php" method="get" class="mt-3">
          <input type="hidden" name="download_mid" value="<?php echo $Row['mid'] ?>">
          <input type="hidden" name="download_movie" value="<?php echo $Row['picture'] ?>">
          <button type="submit" name="download_movie" class="btn btn-danger mybtn">
           <a href="" data-bs-toggle="modal" data-bs-target="#download" class="text-white text-decoration-none">Download</a>
         </button>
        </form>
    </div>
  <?php }} ?>


 <div>
  <h3 class="mt-5 ps-3">Best Movies </h3>
</div>

<div class="row p-5 bg-image">
<?php
        $change=mysqli_query($cn, "SELECT * FROM addmovies");
        while($Row=mysqli_fetch_assoc($change))
        {
      ?>
      <div class="col-md-3 px-3 mb-3 mt-2 text-center" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
       <label class="text-decoration-none text-dark">
       <img src="admin/movies/<?php echo $Row['picture']; ?>" alt="<?php echo $Row['moviename']; ?>" width="100%" height="400px" class="mb-3">
       <span class=""><b><?php echo $Row['moviename']; ?></b></span>
        </label>
       <form action="homepage.php" method="get" class="mt-3">
          <input type="hidden" name="download_mid" value="<?php echo $Row['mid'] ?>">
          <input type="hidden" name="download_movie" value="<?php echo $Row['picture'] ?>">
          <button type="submit" name="download_movie" class="btn btn-danger mybtn">
           <a href="" data-bs-toggle="modal" data-bs-target="#download" class="text-white text-decoration-none"><b>Download</b></a>
         </button>
        </form>

            </div>
            <?php   }  ?>


<?php
if(isset($_GET["download_movie"]))
{
$id=$_GET["download_mid"];
$photo=$_GET["download_movie"];

$qD="SELECT * FROM addmovies WHERE mid=$id";
$result=mysqli_query($cn,$qD);
if($result)
{
  $data=mysqli_fetch_assoc($result);
}
}
?>
       
       <!-- The download Modal start -->
 <div class="modal fade modal-xl" id="download">
  <div class="modal-dialog">
    <div class="modal-content grey">

      <!-- Modal body -->
      
      <div class="modal-body px-2">
       <div class="p-2 shadow bg-white overflow">
        <div>
          <h2 class="text-center"><b>Movie Info</b></h2>
    
          <hr>
          <div class="row">
            <div class="col-md-4">
            <div class="p-2">
                <img src="admin/movies/<?php echo $data['picture'];?>"
                 alt="<?php echo $data['moviename']; ?>" height="400px" width="300px" class="ms-3 shadow-lg">
                 <h2 class="text-center mt-3"><u><?php echo $data['moviename']; ?></u></h2>
            </div>
            
              </div>
      
              <div class="col-md-8">
                <div class="p-3 shadow-lg" id="overflow">
                <h3> Storyline...</h3> 
                <?php echo $data['movieinfo']; ?>
                </div>
                <div class="mt-3 p-3">
                  <h4>Watch online / Download for free</h4>
                  <video src="admin/video/<?php echo $data['video'];?>"
                   controls height="350px" width="100%">Watch Online</video>
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

      <!-- The download Modal end -->
</div> 





<script>
  AOS.init();
</script>
</body>
</html>