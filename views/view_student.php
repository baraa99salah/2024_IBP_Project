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

$sql="SELECT * FROM users WHERE usertype='student'";
$result=mysqli_query($data,$sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Student data</title>

</head>
<body>
<?php
include 'admin_sidebar.php';
?>





<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">View Student</span>
    </div>

    <div class="content">
        <h1>View All Student Data</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Student Name</th>
                <th>password</th>
                <th>gender</th>
                <th>Email</th>
                <th>phone</th>
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
                        <?php echo $info['id']; ?>


                    </td>
                    <td>
                        <?php echo $info['username']; ?>


                    </td>
                    <td>
                        <?php echo $info['password']; ?>


                    </td>
                    <td>
                        <?php echo $info['gender']; ?>


                    </td>
                    <td>

                        <?php echo $info['email'];
                        ?>

                    </td>

                    <td>
                        <?php echo $info['phone']; ?>


                    </td>
                    <td>
                        <img src="../<?php echo $info['image']; ?>" class="teacher-image">


                    </td>
                    <td>
                        <?php
                        echo "
                <a onClick=\"javascript:return confirm(' Are you sure to delete this student?');\"  href='delete.php?student_id={$info['id']}' class='delete-button'>Delete</a>";
                        ?>
                    </td>
                    <td>
                        <?php
                        echo "
                <a  href='update_student.php?student_id={$info['id']}' class='update-button' >update</a>";
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

