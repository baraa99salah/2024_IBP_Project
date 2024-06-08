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

if($_GET['teacher_id'])
{
    $t_id=$_GET['teacher_id'];
    $sql="SELECT * FROM teacher WHERE id='$t_id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
}

if(isset($_POST['update_teacher']))
{
    $id=$_POST['id'];
    $t_username=$_POST['username'];
    $t_email=$_POST['email'];
    $t_phone=$_POST['phone'];
    $t_description=$_POST['description'];
    $t_password=$_POST['password'];
    $file=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];
    $dst="../image/".$file; // this is to create the path of the image
    $dst_db="./image/".$file; // this is to create the path of the image in the database
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    $sql2="UPDATE teacher SET username='$t_username',email='$t_email',phone='$t_phone', password='$t_password', description='$t_description', image='$dst_db' WHERE id='$id'";
    $result2=mysqli_query($data,$sql2);
    if($sql2) // this is to move the image to the folder
    {


         // this is to execute the query
        if($result2)
        {
            echo "<script>alert('Teacher updated successfully')</script>";
            echo "<script>window.location.href='admin_view_teacher.php'</script>";
        }
        else
        {
            echo "<script>alert('Teacher not updated')</script>";
            echo "<script>window.location.href='admin_view_teacher.php'</script>";
        }
    }
    else
    {
        echo "Image upload failed. Error: " . $_FILES['image']['error'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update teacher</title>
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
        <span class="text">Update teacher</span>
    </div>

    <div class="content_add">
        <div class="div_des" >
            <form action="admin_update_teacher.php" method="POST" enctype="multipart/form-data">


                <input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>

                <div>
                    <label>Teacher Name </label>
                    <input type="text" name="username" value="<?php
                    echo "{$info['username']}" ?>"
                    >
                </div>
                <div>
                    <label>Email </label>
                    <input type="text" name="email"  value="<?php
                        echo "{$info['email']}" ?>"</input>
                </div>
                <div>
                    <label>phone Number </label>
                    <input type="text"  name="phone" value="<?php
                        echo "{$info['phone']}" ?>"</input>
                </div>
                <div>
                    <label>Password </label>
                    <input  type="text"  name="password"  value="<?php
                        echo "{$info['password']}" ?>"</input>
                </div>
                <div>
                    <label>About Teacher </label>
                    <input type="text"  name="description" value="<?php
                        echo "{$info['description']}" ?>"</input>
                </div>
                <div class="old-img">
                    <label>Teacher Old Image </label>
                    <img class="old-img" src="../<?php
                    echo "{$info['image']}" ?>">
                </div>
                <div>
                    <label >Teacher New Image </label>
                    <input type="file" name="image">
                </div>
                <div>

                    <input type="submit" name="update_teacher">
                </div>
            </form>
        </div>



    </div>

</section>
<script src="../js/app.js"></script>


</body>
</html>
