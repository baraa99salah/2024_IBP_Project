<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "student_management_sys";
$data = mysqli_connect($host, $user, $password, $db);
$id = $_GET['student_id']; // this is to get the id of the student

$sql = "SELECT * FROM users WHERE id='$id'"; // this is to select the student from the database

$result = mysqli_query($data, $sql);

$info = $result->fetch_assoc(); // this is to fetch the data from the database

if (isset($_POST['update_student'])) // this is to update the student
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $file = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $dst = "../image/" . $file; // this is to create the path of the image
    $dst_db = "./image/" . $file; // this is to create the path of the image in the database
    move_uploaded_file($_FILES['image']['tmp_name'], $dst);
    $query = "UPDATE users SET username='$username',password='$password',gender='$gender',email='$email',phone='$phone', image='$dst_db' WHERE id='$id'";

    $res = mysqli_query($data, $query); // this is to execute the query

    if ($res) {
        echo "<script>alert('Student updated successfully')</script>";
        echo "<script>window.location.href='view_student.php'</script>"; // this is to redirect the page
    } else {
        echo "<script>alert('Student not updated')</script>";
        echo "<script>window.location.href='view_student.php'</script>";
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
    include 'admin_sidebar.php';
    ?>


    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Update Student</span>
        </div>

        <div class="content_add">
            <div class="div_des">
                <form action="#" method="POST" enctype="multipart/form-data">


                    <input type="text" name="id" value="<?php echo "{$info['id']}" ?>">

                    <div>
                        <label>Student Name </label>
                        <input type="text" name="username" value="<?php
                        echo "{$info['username']}" ?>">
                    </div>
                    <div>
                        <label>Email </label>
                        <input type="text" name="email" value="<?php
                        echo "{$info['email']}" ?>">
                    </div>
                    <div>
                        <label>phone Number </label>
                        <input type="text" name="phone" value="<?php
                        echo "{$info['phone']}" ?>">
                    </div>
                    <div>
                        <label>Password </label>
                        <input type="text" name="password" value="<?php
                        echo "{$info['password']}" ?>">
                    </div>
                    <datalist id="gend">
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </datalist>
                    <div>
                        <label>gender </label>
                        <input type="text" list="gend" name="gender" value="<?php
                        echo "{$info['gender']}" ?>">
                    </div>
                    <div class="old-img">
                        <label>Student Old Image </label>
                        <img class="old-img" src="<?php
                        echo "{$info['image']}" ?>">
                    </div>
                    <div>
                        <label>Student New Image </label>
                        <input type="file" name="image">
                    </div>
                    <div>

                        <input type="submit" name="update_student">
                    </div>
                </form>
            </div>



        </div>

    </section>
    <script src="../js/app.js"></script>

</body>

</html>