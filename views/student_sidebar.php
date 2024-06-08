

<?php





$host="localhost";
$user="root";
$password="";
$db="student_management_sys";

$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username']; // this is to get the username of the logged in user
$sql="SELECT * FROM users WHERE username='$name'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);?>
<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxl-c-plus '><img class="logo" src="../image/logo2.png" width="70"></i>
        <span class="logo_name">Student system</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="studenthome.php">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Dashboard</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt' ></i>
                    <span class="link_name">My Course</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Course</a></li>
                <li><a href="#">View my Course</a></li>
                <li hidden="" ><a href="#">Add new Course</a></li>
                <li hidden=""><a href="#">Update my Course</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-chat' ></i>
                <span class="link_name">Messages</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Messages</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="student_profile.php">
                    <i class='bx bx-user' ></i>
                    <span class="link_name">My profile</span>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="student_profile.php">My profile</a></li>
            </ul>
        </li>
        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt' ></i>
                    <span class="link_name">Reports</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Reports</a></li>
                <li><a href="#">Current semester</a></li>
                <li><a href="#">Transcript</a></li>
                <li><a href="#">Attendance</a></li>
                <li><a href="#">Grade Report</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-compass' ></i>
                <span class="link_name">Explore</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Explore</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-history'></i>
                <span class="link_name">History</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">History</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="link_name">Setting</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Setting</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="../<?php
                    echo "{$info['image']}" ?>" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?php echo "{$info['username']}" ?></div>
                </div>
                <a href="logout.php"><i class='bx bx-log-out' ></i></a>

            </div>
        </li>
    </ul>
</div>

