<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/style_log.css?v=<?php echo time(); ?>">
    <title>Login | Ludiflex</title>


</head>

<body background="../image/100.jpg" class="back_des">
    <div class=" container">

        <div class="box">



            <!------------------ Student Box --------------------->
            <div class="box-Student" id="Student">

           <div class="top-header">
               <a href="../index.php"><img class = "logo" src="../image/logo2.png">
               </a>

                    Enter your student Info.
                    <h4>
                        <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();
                        echo $_SESSION['loginMessage'];
                        ?>
                    </h4>
                </div>
                <form class="login_form" method="post" action="login_check.php">
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" class="input-box" name="USERNAME" required>
                            <label for="label_des">Student Name</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" id="logPassword" name="PASSWORD" required>
                            <label for="label_des">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="myLogPassword()">
                                    <i class="fa-regular fa-eye" id="eye"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="remember">
                            <input type="checkbox" id="formCheck" class="check">
                            <label for="formCheck"> Remember Me</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Sign In">
                        </div>
                        <div class="forgot">
                            <a href="/pas.html">Forgot password?</a>
                        </div>
                    </div>
                </form>

            </div>

            <!-------------------- Admin--------------------------->

            <div class="box-Teacher" id="Admin">

                <div class="top-header">
                   <a href="../index.php"> <img class = "logo"  src="../image/logo2.png"> </a>
                    Enter your admin Info.
                    <h4>
                        <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();
                        echo $_SESSION['loginMessage'];

                        ?>
                    </h4>
                </div>
                <form class="login_form" method="post" action="login_check_admin.php">
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" class="input-box" name="USERNAME" required>
                            <label for="Admin">Admin ID</label>
                        </div>

                        <div class="input-field">
                            <input type="password" class="input-box" id="logPassword" name="PASSWORD" required>
                            <label for="logPassword">Password</label>
                            <div class="eye-area">
                                <div class="eye-box" onclick="myLogPassword()">
                                    <i class="fa-regular fa-eye" id="eye-2"></i>
                                    <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="remember">
                            <input type="checkbox" id="formCheck-2" class="check">
                            <label for="formCheck-2"> Remember Me</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Sign In">
                        </div>
                        <div class="forgot">
                            <a href="/pas.html">Forgot password?</a>
                        </div>
                </form>
            </div>

        </div>

        <!------------------------ Switch -------------------------->
        <div class="switch">
            <a href="#" class="Student" onclick="Student()">Student</a>
            <a href="#" class="Admin" onclick="Admin()">Admin</a>
            <div class="btn-active" id="btn"></div>
        </div>

    </div>
    </div>
    <script>
    var x = document.getElementById('Student');
    var y = document.getElementById('Admin');
    var z = document.getElementById('btn');

    function Student() {
        x.style.left = "27px";
        y.style.right = "-350px";
        z.style.left = "0px";
    }

    function Admin() {
        x.style.left = "-350px";
        y.style.right = "25px";
        z.style.left = "175px";
    }

    // view password codes


    function myLogPassword() {

        var a = document.getElementById('logPassword');
        var b = document.getElementById('eye');
        var c = document.getElementById('eye-slash');

        if (a.type === "password") {
            a.type = "text"
            b.style.opacity = "0";
            c.style.opacity = "1";

        } else {
            a.type = "password"
            b.style.opacity = "1";
            c.style.opacity = "0";

        }
    }
    </script>
</body>

</html>