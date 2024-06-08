<?php

error_reporting(0);
session_start();
$host="localhost";
$user="root";
$password="";
$db="student_management_sys";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("ERROR: Could not connect.");

}

if($_SERVER["REQUEST_METHOD"]=="POST") // this is to check if the user clicked on the login button
{
    $name=$_POST["USERNAME"];
    $password=$_POST["PASSWORD"];
    $sql="SELECT * FROM users WHERE username='".$name."' AND password='".$password."'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
   
    if($row["usertype"]=="student") // this is to check if the user is a student
    {
        $_SESSION['username']=$name;
        $_SESSION['usertype']="student";
        header("location:studenthome.php");
    }
    else
    {
        
        $message= "Invalid username or password";
        $_SESSION['loginMessage']=$message;
        header("location:login.php");
    }
}
?>