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
        $qcu = "SELECT * FROM admin WHERE aid = $id";
        $resultA=mysqli_query($cn,$qcu);
        $dataA=mysqli_fetch_assoc($resultA);
    }

   
    //var_dump($dataU);
?>