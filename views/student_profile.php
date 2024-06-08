<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='admin') 
{

    header("location:login.php");
}

$host="localhost";
$user="root";
$password="";
$db="student_management_sys";

$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username']; // this is to get the username of the logged in user
$sql="SELECT * FROM users WHERE username='$name'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile']))  
{
    $s_email=$_POST['email'];
    $s_phone=$_POST['phone'];
    $s_password=$_POST['password'];
    $sql2="UPDATE users SET email='$s_email',phone='$s_phone',password='$s_password' WHERE username='$name'";

    $result2=mysqli_query($data,$sql2); // this is to execute the query
        if($result2) 
        {
            echo "<script>alert('Profile updated successfully')</script>";
            echo "<script>window.location.href='student_profile.php'</script>";
        }
        else
        {
            echo "<script>alert('Profile not updated')</script>";
            echo "<script>window.location.href='student_profile.php'</script>";
        }
        {


            
        }

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
   <?php
   include 'student_sidebar.php';
   ?>


   <section class="home-section">
       <div class="home-content">
           <i class='bx bx-menu' ></i>
           <span class="text">profile</span>
       </div>


       <div class="content_add">
           <div class="div_des " >


               <form action="#" method="POST">
                   <!-- # means we will make the action of the php in the same page-->
                   <div>
                       <label>Name</label>
                       <input type="text" name="name" value="<?php echo "{$info['username']}" ?>">
                   </div>
                   <div>
                       <label>Email</label>
                       <input type="email" name="email" value="<?php echo "{$info['email']}" ?>">
                   </div>
                   <div>
                       <label>Phone</label>
                       <input type="number" name="phone" value="<?php echo "{$info['phone']}" ?>" >
                   </div>
                   <div>
                       <label>Password</label>
                       <input type="text" name="password" value="<?php echo "{$info['password']}" ?>" >
                   </div>
                   <div>
                       <label>image</label>
                       <img src="../<?php
                    echo "{$info['image']}" ?>" alt="profileImg" class="teacher-image">
                   </div>
                   <div>
                       <input type="submit" name="update_profile" value="Update Profile">
                   </div>
               </form>
           </div>

       </div>
   </section>
   <script src="../js/app.js"></script>
</body>
</html>