<?php
    session_start();
    // $username=$_SESSION["username"];
    $conn=require_once "config.php";
    $username=$_SESSION["username"];
    $sql = "SELECT * FROM users WHERE username ='".$username."'";
    // SELECT * FROM users WHERE username ="QWE";
    $result=mysqli_query($conn,$sql);
    $donate=mysqli_fetch_assoc($result)["donate"];
    // echo "".$username."".$donate."";
    
    $return = array();   
    $return["username"] = $username;
    $return["donate"] = $donate;
    echo json_encode($return);   

    // $donate=$donate+100;
    // echo "<h1>加100: ".$donate."</h1>";
    // $sql = "UPDATE users SET donate=$donate WHERE username ='".$username."'";
    // $result=mysqli_query($conn,$sql);
    // if(isset($_POST['animation_button'])){
    //     $conn=require_once "config.php";
    //         $username=$_SESSION["username"];
    //         $sql = "SELECT * FROM users WHERE username ='".$username."'";
    //         // SELECT * FROM users WHERE username ="QWE";
    //         // echo "<h1>username ".$username."</h1>";
    //         $result=mysqli_query($conn,$sql);
    //         $donate=mysqli_fetch_assoc($result)["donate"];
    //         // echo "<h1>改動前 ".$donate."</h1>";
        
    //         $donate=$donate+100;
    //         // echo "<h1>加100: ".$donate."</h1>";
    //         $sql = "UPDATE users SET donate=$donate WHERE username ='".$username."'";
    //         $result=mysqli_query($conn,$sql);
    //         echo $donate;
    //  }
    // function update_donate($flag)
    // {  
    //     // echo "<h1>username </h1>";
    //     if(1==$flag)
    //     {
    //         $conn=require_once "config.php";
    //         $username=$_SESSION["username"];
    //         $sql = "SELECT * FROM users WHERE username ='".$username."'";
    //         // SELECT * FROM users WHERE username ="QWE";
    //         // echo "<h1>username ".$username."</h1>";
    //         $result=mysqli_query($conn,$sql);
    //         $donate=mysqli_fetch_assoc($result)["donate"];
    //         // echo "<h1>改動前 ".$donate."</h1>";
        
    //         $donate=$donate+100;
    //         // echo "<h1>加100: ".$donate."</h1>";
    //         $sql = "UPDATE users SET donate=$donate WHERE username ='".$username."'";
    //         $result=mysqli_query($conn,$sql);
    //         echo $donate;
    //     }
    //     else
    //     {
    //         echo null;
    //     }
    // }  
?>