<?php include 'session-check.php';

$cn=mysqli_connect("localhost","root","","mymovies");
$msg="";
if(isset($_POST["b2"]))
{
   $filename= $_FILES['movie']['name'];
   $tempname= $_FILES['movie']['tmp_name'];
   $folder= "movies/".$filename;

   $video= $_FILES['movievideo']['name'];
   $temp= $_FILES['movievideo']['tmp_name'];
   $fdr= "video/".$video;

   $moviename=$_POST["moviename"];
   $movieinfo=$_POST["movieinfo"];

   $qI= "INSERT INTO addmovies (picture,moviename,movieinfo,video) VALUES ('$filename','$moviename','$movieinfo','$video')";

   if(mysqli_query($cn,$qI))
   {
    move_uploaded_file($temp,$fdr);
    if(move_uploaded_file($tempname,$folder))
    {
      echo "<script>alert('Movie Uploaded');
      window.location.href='homepage.php';
      </script>";
    }
    
   }
}


if(isset($_POST["b3"]))
{
   $file= $_FILES['slide']['name'];
   $temp= $_FILES['slide']['tmp_name'];
   $path= "slides/".$file;

   $slidename=$_POST["slidename"];

   $qI= "INSERT INTO addslides (slide,slidename) VALUES ('$file',' $slidename')";

   if(mysqli_query($cn,$qI))
   {
    if(move_uploaded_file($temp,$path))
    {
      echo "<script>alert('Slide Uploaded');
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
    <title>Mymovies</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .myflow {
        width: 500px;
        height: 366px;
        border: 1px solid white;
        overflow: auto;
      }
        img:hover  {
        scale: 1.05;
      }
    </style>
</head>
<?php include 'myheader.php'; ?>
<body class="">

<?php
if(isset($_POST["delete_img"]))
{
$id=$_POST["delete_id"];
$photo=$_POST["delete_photo"];

$qD="DELETE FROM addslides WHERE sid=$id";
$result=mysqli_query($cn,$qD);
if($result)
{
    unlink("slides/".$photo);
    echo "<script>alert('Slide Deleted');
    window.location.href='homepage.php';
    </script>";
}
}
?>



 <div class="row mt-5">
 <div class="col-md-6">
  <div class="mx-auto col-md-6">
  <h3>Add Slides</h3>
 <form action="homepage.php" method="post" enctype="multipart/form-data">

   <input type="file" name="slide" required><br>
   <input type="text" name="slidename" id="" required placeholder="Enter slide name"><br>
   <input type="submit" value="Upload" name="b3" class="btn btn-primary mt-2">

</form>
  </div>
 </div>
 

 <div class="col-md-6">
 <div class="mx-auto col-md-6">
  <h3>Add Movies</h3>
 <form action="homepage.php" method="post" enctype="multipart/form-data">

   <span>Add picture</span><input type="file" name="movie" required><br>
   <input type="text" name="moviename" required placeholder="Enter movie name"><br>
   <input type="text" name="movieinfo" required placeholder="Movie info"><br>
   <span>Add video</span><input type="file" name="movievideo"><br>

   <input type="submit" value="Upload" name="b2" class="btn btn-primary mt-2">

</form>

 </div>
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
      <img src="movies/<?php echo $data['picture']; ?>" alt="<?php echo $data['moviename']; ?>" width="95%" height="400px" class="mb-3">
      <span class=""><b><?php echo $data['moviename']; ?></b></span>
      </a>
      <form action="homepage.php" method="post" class="mt-3">
                 <input type="hidden" name="delete_mid" value="<?php echo $data['mid'] ?>">
                 <input type="hidden" name="delete_movie" value="<?php echo $data['picture'] ?>">
                 <button type="submit" name="delete_movie" class="btn btn-danger">Delete</button>
              </form>
    </div>
  <?php }} ?>


<div class="row p-3">
<div class="col-md-6">
<h3 class="mt-3 ps-3">Slides</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Sid</th>
                <th>Sname</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
             
  <?php
               $change=mysqli_query($cn, "SELECT * FROM addslides");
               while($Row=mysqli_fetch_assoc($change))
               {
             ?>
                 <tr>
                <td><?php echo $Row['sid']; ?></td>
                <td><?php echo $Row['slidename']; ?></td>
                <td>
                <form action="homepage.php" method="post" class="mt-3">
                 <input type="hidden" name="delete_id" value="<?php echo $Row['sid'] ?>">
                 <button type="submit" name="delete_img" class="btn btn-danger">Delete</button>
              </form>
             </td>
            </tr>
            <?php   }  ?>
            </tbody>
          </table>
         </div>
        
<div class="col-md-6">
<h3 class="mt-3 ps-3">Movies</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Mid</th>
                <th>Mname</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
             
  <?php
               $change=mysqli_query($cn, "SELECT * FROM addmovies");
               while($Row=mysqli_fetch_assoc($change))
               {
             ?>
                 <tr>
                <td><?php echo $Row['mid']; ?></td>
                <td><?php echo $Row['moviename']; ?></td>
                <td>
                <form action="homepage.php" method="post" class="mt-3">
                 <input type="hidden" name="delete_mid" value="<?php echo $Row['mid'] ?>">
                 <input type="hidden" name="delete_movie" value="<?php echo $Row['picture'] ?>">
                 <button type="submit" name="delete_movie" class="btn btn-danger">Delete</button>
              </form>
             </td>
            </tr>
            <?php   }  ?>
            </tbody>
          </table>
         </div>
          
</div> 



<?php
if(isset($_POST["delete_movie"]))
{
$id=$_POST["delete_mid"];
$photo=$_POST["delete_movie"];

$qD="DELETE FROM addmovies WHERE mid=$id";
$result=mysqli_query($cn,$qD);
if($result)
{
    unlink("slides/".$photo);
    echo "<script>alert('Movie Deleted');
    window.location.href='homepage.php';
    </script>";
}
}
?>
</body>
</html>
