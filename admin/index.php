<?php
include "../process.php";

session_start();
if (!isset($_SESSION['uid'])) {
    header('location:login.php');
}


//logout
if (isset($_POST['logout'])){
    unset($_SESSION['uid']);
    unset($_SESSION['name']);

    header('location:login.php');
}


?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Admin | Vision Academy</title>
    <link rel="stylesheet" href="style_info.css" type="text/css">
</head>
<body>
<!--Start of Menubar-->
<div class="logo">
    <a href="">
        <img src="../img/logo.png" alt="logo" width='250px' class="logo">
    </a>
</div>

<nav>
    <ul>
        <li><a href="">Admin Panel</a></li>
        <li>
            <form action="" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>

        </li>

    </ul>
</nav>
</div>
<!--End of Menubar-->

<!-----Start of admin page-->
<div class="fees_main_wrapper">
    <section class="fees_section">
        <h1>Contact Information</h1>
        <table>
            <tr>
                <th></th>
                <th colspan="">SENDER DETAILS</th>
                <th colspan="">MESSAGE</th>
            </tr>
            <?php
            $n=0;
            $n++;
            $query = mysqli_query($con, "SELECT * FROM contact") or die(mysqli_error());
            while($fetch = mysqli_fetch_array($query)){
                $fname=$fetch['fname'];
                $lname=$fetch['lname'];
                $email=$fetch['email'];
                $phone=$fetch['contact'];
                $message=$fetch['Message'];
                $date=$fetch['date'];

                ?>
                <tr>
                    <td><?php echo $date?></td>
                    <td>
                        <?php echo $fname .'  '.$lname?><br>
                        <?php echo $email?><br>
                        <?php echo  $phone?>
                    </td>
                    <td><?php echo $message?></td>
                </tr>
                <?php
            }
            ?>
        </table>
</div>

<!-----End of admin page-->

</body>
</html>