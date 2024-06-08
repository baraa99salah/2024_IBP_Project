<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "student_management_sys";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch gender distribution for students
$sql = "SELECT gender, COUNT(*) as count FROM users WHERE usertype='student' GROUP BY gender";
$result = $conn->query($sql);

$male_count = 0;
$female_count = 0;

if ($result) {
    while ($row = $result->fetch_assoc()) {
        if ($row['gender'] == 'male') {
            $male_count = $row['count'];
        } elseif ($row['gender'] == 'female') {
            $female_count = $row['count'];
        }
    }
} else {
    echo "Error: " . $conn->error;
}

// Fetch total number of students
$sql_total_students = "SELECT COUNT(*) as total FROM users WHERE usertype='student'";
$result_total_students = $conn->query($sql_total_students);
$total_students_count = $result_total_students ? $result_total_students->fetch_assoc()['total'] : 0;

// Fetch total number of teachers
$sql_total_teachers = "SELECT COUNT(*) as total FROM teacher";
$result_total_teachers = $conn->query($sql_total_teachers);
$total_teachers_count = $result_total_teachers ? $result_total_teachers->fetch_assoc()['total'] : 0;

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
</head>

<body class="back_des">
    <?php include 'admin_sidebar.php'; ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Dashboard</span>
        </div>

        <div class="chart-wrapper">
            <div class="chart-container">
                <canvas id="genderChart"></canvas>
                <label>Gender Of Students</label>
            </div>
            <div class="circle-chart">
                <span class="circle-chart-number"><?php echo $total_students_count; ?></span>
                <span class="circle-chart-title">Student Number</span>
            </div>
            <div class="circle-chart">
                <span class="circle-chart-number"><?php echo $total_teachers_count; ?></span>
                <span class="circle-chart-title">Teacher Number</span>
            </div>
        </div>



    </section>
    <script>
        const ctxGender = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(ctxGender, {
            type: 'pie',
            data: {
                labels: ['Male Student', 'Female student'],
                datasets: [{
                    label: 'Gender Distribution',
                    data: [<?php echo $male_count; ?>, <?php echo $female_count; ?>],
                    backgroundColor: [
                        getComputedStyle(document.documentElement).getPropertyValue('--male-color').trim(),
                        getComputedStyle(document.documentElement).getPropertyValue('--female-color').trim()
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>
    <script src="../js/app.js"></script>
</body>

</html>