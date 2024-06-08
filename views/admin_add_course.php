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

if(isset($_POST['add_course']))
{
    $t_Short_name=$_POST['Short_name'];
    $t_full_name=$_POST['full_name'];
    $t_teacher_id=$_POST['teacher_id'];
    $t_Start_Date=$_POST['Start_Date'];
    $t_level=$_POST['level'];
    $sql="INSERT INTO course (Short_name,full_name,teacher_id,Start_Date,level) VALUES ('$t_Short_name','$t_full_name','$t_teacher_id','$t_Start_Date','$t_level')";
    $result=mysqli_query($data,$sql);

    if($result) // this is to check if the data has been inserted successfully
    {
        echo "<script type='text/javascript'> 
        alert('Course added successfully');
        </script>";
    }
    else {

        echo "Course not added successfully";
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
        <span class="text">Add course</span>
    </div>



    <div class="content_add">
        <div class="div_des">
            <h2>Enter Course Information</h2>
            <form action="#" method="POST" enctype="multipart/form-data">

                <div>
                    <label>Short name :</label>
                    <input type="text" name="Short_name">
                </div>
                <div>
                    <label>Full name :</label>
                    <input type="text" name="full_name">
                </div>
                <div>
                    <label>Teacher id :</label>
                    <input type="text" name="teacher_id">
                </div>
                <div>
                    <label>Start Date:</label>
                    <input type="date" name="Start Date">
                </div>
                <div>
                    <label>level:</label>
                    <input type="number" name="level">
                </div>
                <div>

                    <input type="submit" name="add_course" value="Add course">
                </div>
            </form>
        </div>



    </div>

</section>
<script src="../js/app.js"></script>
</body>
</html>


