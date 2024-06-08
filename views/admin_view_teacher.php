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

$sql="SELECT * FROM teacher";

$result=mysqli_query($data,$sql);


if($_GET['teacher_id']) 
{
    $t_id=$_GET['teacher_id'];
    $sql2="DELETE FROM teacher WHERE id='$t_id'";
    $result2=mysqli_query($data,$sql2);

    if($result2)
    {
        echo "<script>alert('Teacher deleted successfully')</script>";
        echo "<script>window.location.href='admin_view_teacher.php'</script>";
    }
    else
    {
        echo "<script>alert('Teacher not deleted')</script>";
        echo "<script>window.location.href='admin_view_teacher.php'</script>";
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
        <span class="text">View teachers</span>
    </div>

    <div class="content">
        <h1>View All Teacher Data</h1>
        <table>
            <tr>

                <th>Teacher Name</th>
                <th>password</th>
                <th>Email</th>
                <th>phone</th>
                <th>About Teacher</th>
                <th>image</th>
                <th></th>
                <th></th>

            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
                ?>


                <tr>
                    <td>
                        <?php echo $info['username']; ?>
                        <?php ?>

                    </td>
                    <td>
                        <?php echo $info['password']; ?>
                        <?php ?>

                    </td>
                    <td>

                        <?php echo $info['email'];
                        ?>

                    </td>

                    <td>
                        <?php echo $info['phone']; ?>
                        <?php ?>

                    </td>
                    <td>


                        <?php echo $info['description'];
                        ?>


                    </td>
                    <td>
                        <img src="../<?php echo $info['image']; ?>" class="teacher-image">


                    </td>
                    <td>
                        <?php
                        echo "
                <a onClick=\"javascript:return confirm(' Are you sure to delete this student?');\"  href='admin_view_teacher.php?teacher_id={$info['id']}' class='delete-button'>Delete</a>";
                        ?>
                    </td>
                    <td>
                        <?php
                        echo "
                <a href='admin_update_teacher.php ? teacher_id={$info['id']} ' class='update-button'>update</a>";
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

