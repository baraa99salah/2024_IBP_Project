<?php
session_start();
// this is to connect the page to the database
$host="localhost";
$user="root";
$password="";
$db="student_management_sys";
$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("ERROR: Could not connect.");

}
if(isset($_POST['apply'])) // this is to check if the user clicked on the apply button and inserting the data into the database
{
    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_message=$_POST['message'];

    $sql="INSERT INTO admission(name,email,phone,message) VALUES('$data_name','$data_email','$data_phone','$data_message')";
    $result=mysqli_query($data,$sql); // this is to execute the query

    if($result)
    {
        $_SESSION['message']="Your application has been submitted successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    else
    {
        echo " Your application has not been submitted successfully";

    }
}





?>