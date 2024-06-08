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

if(isset($_POST['add_student'])) // this is to check if the user clicked on the add student button
{
    $username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $gender = $_POST['gender'];
    $file=$_FILES['image']['name']; // this is to get the name of the image
    $dst = "../image/" . $file; // this is to get the destination of the image
    $dst_db="./image/".$file; // this is to get the destination of the image in the database
    move_uploaded_file($_FILES['image']['tmp_name'], $dst); // this is to move the image to the folder
    $usertype="student";

    $check="SELECT * FROM users WHERE username='$username'"; // this is to check if the username already exists in the database
    $check_user=mysqli_query($data,$check); // this is to execute the query

    $row_count=mysqli_num_rows($check_user); // this is to count the number of rows in the database

    if($row_count==1) 
    {
        echo "<script type='text/javascript'> 
        alert('The username is already exists. Please try again with a different username');
        </script";
    }
    else
    {
       
    
    $sql="INSERT INTO users(username,password,gender,email,phone,usertype,image)
     VALUES('$username','$user_password','$gender','$user_email','$user_phone','$usertype','$dst_db')"; // this is to insert the data into the database
    $result=mysqli_query($data,$sql); // this is to execute the query

    if($result) // this is to check if the data has been inserted successfully
    {
        echo "<script type='text/javascript'> 
        alert('Student added successfully');
        </script";
    }
    else {

        echo "Student not added successfully";
    }
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
            <span class="text">Add student</span>
        </div>
        <div class="content_add">
            <div class="div_des">
                <h2>Enter Student Information</h2>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <label>Username</label>
                    <input type="text" name="username" id="username" required>

                    <label>Email</label>
                    <input type="email" name="email" id="email" required>

                    <label>Phone</label>
                    <input type="text" name="phone" id="phone" required>

                    <label>Password</label>
                    <input type="password" name="password" id="password" required>
                    <datalist id="gend">
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </datalist>
                    <label>gender</label>
                    <input type="text" list="gend" name="gender" id="gender" required>

                    <label>Image :</label>
                    <input type="file" name="image" id="image" required>



                    <input type="submit" name="add_student" value="Add Student">
                </form>
            </div>
        </div>
    </section>
    <script src="../js/app.js"></script>
</body>

</html>