<?php 
if(!isset ($_SESSION)) 
{
    session_start();
}
$cn =mysqli_connect("localhost","root","","mymovies");
    if(!isset( $_SESSION['id']))
    {
        echo "<script>
       
        window.location.href='index.php';
        </script>";
    }
    else
    {
        $id =$_SESSION['id'];
        $qcu = "SELECT * FROM user WHERE uid = $id";
        $resultU=mysqli_query($cn,$qcu);
        $dataU=mysqli_fetch_assoc($resultU);
    }

   
    //var_dump($dataU);
?>