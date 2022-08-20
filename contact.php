<?php
session_start();
include "process.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Contact Us | Vision Academy</title>
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="style_gallery_contact.css" type="text/css">
</head>
<body>
<!--Start of Menubar-->
<div class="logo">
    <a href="index.html">
        <img src="img/logo.png" alt="logo" width='250px' class="logo">
    </a>
</div>

<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="About us.html">About Us</a>
            <ul>
                <li><a href="Mission.html">Mission</a></li>
                <li><a href="Vision.html">Vision</a></li>
                <li><a href="Core Values.html">Core values</a></li>
                <li><a href="Strategic Plan.html">Strategic plan</a></li>
            </ul>
        </li>
        <li><a href="#">Programs</a>
            <ul>
                <li><a href="Kindergarten.html">Kindergarten</a></li>
                <li><a href="Day Care.html">Day Care</a></li>
            </ul>
        </li>
        <li><a href="#">Activities</a>
            <ul>
                <li><a href="Talent Training.html">Talent training</a></li>
                <li><a href="Sport Training.html">Sport training</a></li>
                <li><a href="Academic Tours.html">Academic tours</a></li>
            </ul>
        </li>
        <li><a href="Online Learning.html">Online class learning</a></li>
        <li><a href="#">Informaton</a>
            <ul>
                <li><a href="Menu.html">Menu</a></li>
                <li><a href="Fee Structure.html">Fee structure</a></li>
                <li><a href="Term Dates.html">Term dates</a></li>
                <li><a href="Policy.html">Policy</a></li>
            </ul>
        </li>
        <li><a href="Gallery.html">Gallery</a></li>
        <li><a href="Contact Us.html">Contact Us</a></li>

    </ul>
</nav>
</div>
<!--End of Menubar-->

<!--Start of CONTACT US PAGE-->
<?php

if(isset($_SESSION['error'])){
    echo "
          <div class='alert alert-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
    unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
    echo "
          <div class='alert alert-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
    unset($_SESSION['success']);
}
?>
<section class="contact_section">
    <div class="map">
        <img src="img/map.jpg" alt="Pin location">
    </div>

    <?php
    if(isset($_POST['ok'])){
        $first=$_POST['FirstName'];
        $last=$_POST['LastName'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $message=$_POST['Message'];

        $date = date('Y-m-d');

        if (empty($first) || empty($last) || empty($email) || empty($phone) || empty($message)) {
            $_SESSION['error'] = 'Please fill in the form';
            header('location: contact.php');

        }else{
            $sql = "INSERT INTO `contact` 
		(`id`, `fname`, `lname`, `email`, 
		`Message`,`contact`,`date`) 
		VALUES (NULL, '$first', '$last', '$email', 
		'$message','$phone','$date')";
            $run_query = mysqli_query($con, $sql);

            if ($run_query) {
                $_SESSION['success'] = 'Thank you for contacting us.We wil get back to you soon.';
                header('location:contact.php');
            }
            else{
                $_SESSION['error'] = 'Please resend your message again.';
                header('location:contact.php');
            }
        }

    }
    ?>


    <div class="contact_form">
        <h1>Contact Us</h1>
        <form action="" method="POST">
            <label for="name">Name</label> <br>
            <input type="text" name="FirstName" id="name" placeholder="First" required width="130px">
            <input type="text" name="LastName" placeholder="Last" mb-2 required>
            <br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="info@gmail.com" required>
            <br>
            <label for="phone">Phone</label><br>
            <input type="tel" name="phone" placeholder="0712 123456" id="Phone">
            <br>
            <label for="Message">Message</label><br>
            <textarea name="Message" id="Message" cols="35" rows="6"></textarea>
            <br>
            <button type="submit" name="ok">Submit</button>
            <button type="reset">Reset</button>
        </form>
        <P>
            <br>
        <h3><u>Location</u></h3> <br>
        Tel: 0714392898 <br>
        Email: info@vision.ac.ke <br>
        <br>
        VISION ACADEMY <br>
        Langata Road <br>
        P.O. BOX 12345 <br>
        Nairobi, Kenya <br>

        </P>
    </div>


</section>

<!--eND of CONTACT US PAGE-->

<!--Start of Footer Section-->
<footer>
    <hr>
    <div class="footer_main_container">
        <div class="footer_container_about_us">
            <h3><u>About Us</h3></u>
            <p>Founded in 1998, we love learning, encourage them to try new and exciting things.</p>
            <br>
            <p><strong>Need help?</strong></p>
            <p>Call us on 0714392898</p>
        </div>
        <div class="footer_container">
            <h3><u> Useful Links</h3></u>
            <p><a href="Contact Us.html">Contact Us</a></p>
            <p><a href="Policy.html">Policy</a></p>
            <p><a href="Fee Structure.html">Fee Structure</a></p>
            <p><a href="Term Dates.html">Term dates</a></p>
        </div>
        <div class="footer_container">
            <h3><u>Location</h3></u>
            <p>VISION ACADEMY</p>
            <p>Langata Road</p>
            <p>P.O. BOX 12345</p>
            <p>Nairobi, Kenya</p>
        </div>
        <div class="footer_copyright">
            <hr>
            <p>Copyright©2021 | Vision Academy | Site by <a href="#">David & Maxie</a></p>
        </div>
    </div>
</footer>
</body>
<!--End of Footer Section-->