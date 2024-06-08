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


$host = "localhost";
$user = "root";
$password = "";
$db = "student_management_sys";
$data=mysqli_connect($host,$user,$password,$db); // this is to connect the page to the database

$sql = "SELECT * FROM admission";
$result = mysqli_query($data,$sql); // this is to execute the query

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin dashboard</title>


</head>
<body>
<?php
include 'admin_sidebar.php';
?>
<section class="home-section">
    <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">admissions</span>
    </div>
        <div class="content">

            <h1>Admissions</h1>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                </tr>
                <?php

                while($info=$result->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td>
                            <?php echo "{$info['name']}"; ?>
                        </td>
                        <td>
                            <?php echo "{$info['email']}"; ?>
                        </td>
                        <td>
                            <?php echo "{$info['phone']}"; ?>
                        </td>
                        <td>
                            <?php echo "{$info['message']}"; ?>
                        </td>
                    </tr>
                    <?php
                } // Loop will end here
                ?>




            </table>
        </div>
</section>


<script src="../js/app.js"></script>
</body>
</html>
