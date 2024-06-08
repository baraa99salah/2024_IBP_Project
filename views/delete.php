 <?php
$host="localhost";
$user="root";
$password="";
$db="student_management_sys";
$data=mysqli_connect($host,$user,$password,$db); // this is to connect the page to the database
if($_GET['student_id'])
{
    $user_id=$_GET['student_id'];
    $sql="DELETE FROM users WHERE id='$user_id'";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        echo "<script>alert('Student deleted successfully')</script>";
        echo "<script>window.location.href='view_student.php'</script>";
    }
    else
    {
        echo "<script>alert('Student not deleted')</script>";
        echo "<script>window.location.href='view_student.php'</script>";
    }




}


?>