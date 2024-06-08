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

if($_GET['course_id'])
{
    $t_id=$_GET['course_id'];
    $sql="SELECT * FROM course WHERE id='$t_id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
}

if(isset($_POST['update_course']))
{
    $id=$_POST['id'];
    $t_Short_name=$_POST['Short_name'];
    $t_full_name=$_POST['full_name'];
    $t_teacher_id=$_POST['teacher_id'];
    $t_Start_Date=$_POST['Start_Date'];
    $t_level=$_POST['level'];
    $sql2="UPDATE course SET Short_name='$t_Short_name',full_name='$t_full_name',teacher_id='$t_teacher_id', Start_Date='$t_Start_Date', level='$t_level' WHERE id='$id'";
    if($sql2) // this is to move the image to the folder
    {


        $result2=mysqli_query($data,$sql2); // this is to execute the query
        if($result2)
        {
            echo "<script>alert('Course updated successfully')</script>";
            echo "<script>window.location.href='admin_view_Course.php'</script>";
        }
        else
        {
            echo "<script>alert('Course not updated')</script>";
            echo "<script>window.location.href='admin_view_Course.php'</script>";
        }
    }
    else
    {
        echo " upload failed. Error: " ;
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
            <form action="admin_update_Course.php" method="POST" enctype="multipart/form-data">


                <div>
                    <label>Course ID </label>
                    <input type="text" name="id" value="<?php
                    echo "{$info['id']}" ?>"</input>
                </div>
                <div>
                    <label>Short name </label>
                    <input type="text" name="Short_name"  value="<?php
                    echo "{$info['Short_name']}" ?>"</input>
                </div>
                <div>
                    <label>Full name</label>
                    <input type="text"  name="full_name" value="<?php
                    echo "{$info['full_name']}" ?>"</input>
                </div>
                <div>
                    <label>teacher Id </label>
                    <input  type="text"  name="teacher_id"  value="<?php
                    echo "{$info['teacher_id']}" ?>"</input>
                </div>
                <div>
                    <label>Start Date </label>
                    <input type="date"  name="Start_Date" value="<?php
                    echo "{$info['Start_Date']}" ?>"</input>
                </div>
                <div>
                    <label>level </label>
                    <input type="number"  name="level" value="<?php
                    echo "{$info['level']}" ?>"</input>
                </div>

                <div>
                    <input type="submit" name="update_course">
                </div>
            </form>
        </div>



    </div>

</section>
<script src="../js/app.js"></script>


</body>
</html>
