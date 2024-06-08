<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student') 
{
    header("location:login.php");
}


$host="localhost";
$user="root";
$password="";
$db="student_management_sys";

$data=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['add_teacher']))
{
    $t_username=$_POST['username'];
    $t_email=$_POST['email'];
    $t_phone=$_POST['phone'];
    $t_password=$_POST['password'];
    $t_des=$_POST['description'];
    $file=$_FILES['image']['name']; // this is to get the name of the image
    $dst = "../image/" .$file; // this is to get the destination of the image
    $dst_db="./image/".$file; // this is to get the destination of the image in the database
    move_uploaded_file($_FILES['image']['tmp_name'], $dst); // this is to move the image to the folder
    $sql="INSERT INTO teacher (username,email,phone,password,description,image) VALUES ('$t_username','$t_email','$t_phone','$t_password','$t_des','$dst_db')";
    $result=mysqli_query($data,$sql);

    if($result) // this is to check if the data has been inserted successfully
    {
        echo "<script type='text/javascript'> 
        alert('Teacher added successfully');
        </script>";
    }
    else {

        echo "Teacher not added successfully";
    }

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add teacher</title>
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php
include 'admin_sidebar.php';
?>

<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Add teachers</span>
    </div>



    <div class="content_add">
        <div class="div_des">
            <h2>Enter teacher Information</h2>
            <form action="#" method="POST" enctype="multipart/form-data">

                <div>
                    <label>Teacher Name :</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label>email :</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label>phone :</label>
                    <input type="text" name="phone">
                </div>
                <div>
                    <label>password :</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label>Description :</label>
                    <input type="text" name="description">
                </div>
                <div>
                    <label>Image :</label>
                    <input type="file" name="image">
                </div>
                <div>

                    <input type="submit" name="add_teacher" value="Add Teacher">
                </div>
            </form>
        </div>



    </div>

</section>
<script src="../js/app.js"></script>
</body>
</html>


