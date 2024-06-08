<?php
session_start();
error_reporting(0);
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

$sql="SELECT * FROM course";

$result=mysqli_query($data,$sql);


if($_GET['course_id'])
{
    $t_id=$_GET['course_id'];
    $sql2="DELETE FROM course WHERE id='$t_id'";
    $result2=mysqli_query($data,$sql2);

    if($result2)
    {
        echo "<script>alert('course deleted successfully')</script>";
        echo "<script>window.location.href='admin_view_Course.php'</script>";
    }
    else
    {
        echo "<script>alert('Teacher not deleted')</script>";
        echo "<script>window.location.href='admin_view_Course.php'</script>";
    }




}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View teacher</title>
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
        <span class="text">View course</span>
    </div>

    <div class="content">
        <h1>View All course Data</h1>
        <table>
            <tr>
                <th>ID</th>
                <th> Short-Name</th>
                <th> Full-Name</th>
                <th>Instructor ID </th>
                <th>Start Date</th>
                <th>level</th>
                <th></th>
                <th></th>

            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
                ?>


                <tr>
                    <td>
                        <?php echo $info['id']; ?>
                        <?php ?>

                    </td>
                    <td>
                        <?php echo $info['Short_name']; ?>
                        <?php ?>

                    </td>
                    <td>

                        <?php echo $info['full_name'];
                        ?>

                    </td>

                    <td>
                        <?php echo $info['teacher_id'];
                        ?>
                    </td>
                    <td>


                        <?php echo $info['Start_Date'];
                        ?>


                    </td>
                    <td>


                        <?php echo $info['level'];
                        ?>


                    </td>

                    <td>
                        <?php
                        echo "
                <a onClick=\"javascript:return confirm(' Are you sure to delete this Course?');\"  href='admin_view_Course.php?course_id={$info['id']}' class='delete-button'>Delete</a>";
                        ?>
                    </td>
                    <td>
                        <?php
                        echo "
                <a href='admin_update_course.php?course_id={$info['id']} ' class='update-button'>update</a>";
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>


        </table>


    </div>
</section>


<script src="../js/app.js"></script>
</body>
</html>

