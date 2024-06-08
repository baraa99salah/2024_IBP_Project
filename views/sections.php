<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']) // this is to check if the session has any message or not
{
$message=$_SESSION['message'];
echo "<script type='text/javascript'>  // this is javascript code

    alert('$message');
</script>";

}
$host="localhost";
$user="root";
$password="";
$db="student_management_sys";

$data=mysqli_connect($host,$user,$password,$db); // this is to connect the page to the database

$sql="SELECT * FROM teacher"; // this is to select all the data from the database

$result=mysqli_query($data,$sql); // this is to execute the query


?>

<section class="about-section section-padding" id="section_1">
            <div class="container">
                <div class="cos">

                    <div class=" col-12 mb-4 mb-lg-0  align-items-center">
                        <div class="services-info">
                            <h2 class="text-white mb-4">About CREATIVE KIDS SCHOOL</h2>

                            <p class="text-white">Welcome to Creative Kids 
                            School! is a place where we nurture the creativity
                             and curiosity of every child. We provide a stimulating
                              educational environment that promotes holistic development.
                               Our curriculum balances academic learning with creative activities,
                                and our dedicated teachers inspire a love of learning in every student.
                                 Join us at Creative Kids School, where we celebrate learning every day!</p>

                            
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="about-text-wrap">
                            <img src="image/3.jpg" class="about-image img-fluid">
                            <div class="about-text-info d-flex">
                                <div class="d-flex">
                                    <i class="about-text-icon bi-person"></i>
                                </div>


                                <div class="ms-4">
                                    <h3>A happy moment</h3>

                                    <p class="mb-0">A great smile with a great future</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



<section class="trainer_area section_gap_top" id="section_2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Our Expert Trainers</h2>
                    <p>
                        Replenish man have thing gathering lights yielding shall you
                    </p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center d-flex align-items-center">

                    <?php
                    while ($info = $result->fetch_assoc()) {
                        ?>
            <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
                        <div class="thumb d-flex justify-content-center">
                            <img class="img-fluid" src="<?php echo $info['image']; ?>">
                        </div>
                            <div class="meta-text text-center">
                                <h4><?php echo $info['username']; ?></h4>
                                <p class="designation"><?php echo $info['description']; ?></p>
                                <div class="mb-4">
                                </div>
                            </div>
            </div>
                        <?php
                    }
                    ?>
            </div>
    </div>
</section>


<section class="contact-section section-padding" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="text-center mb-4">Join Us</h2>
                <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                         aria-labelledby="nav-ContactForm-tab">
                        <form class="custom-form contact-form mb-5 mb-lg-0" action="views/data_check.php" method="post"
                              role="form">
                            <div class="contact-form-body">
                                <div class="row1">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="name" id="contact-name"
                                               class="form-control" placeholder="Full name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="email" name="email" id="contact-email"
                                               pattern="[^ @]*@[^ @]*" class="form-control"
                                               placeholder="Email address" required>
                                    </div>
                                </div>

                                <input type="text" name="phone" id="phone"
                                       class="form-control" placeholder="Phone" required>

                                <textarea name="message" rows="3" class="form-control"
                                          id="contact-message" placeholder="Message"></textarea>

                                <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                    <button type="submit" class="form-control" value="apply" name="apply" >Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


