<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,500&family=Raleway:wght@100;400;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Register</title>
</head>
<body>
    <div class="headings">
        <h2>COMP-207 - Register here for a practical slot</h2>
        <h3>Register only if you know what you are doing.</h3>
    </div>

    <div class="conditions">
        <ul>
            <li>Please enter <b>all</b> information and select your desired day. Please enter a correct 'SID' number!</li>
            <li>Please check the number of available seats before submitting.</li>
            <li>Register only to one slot.</li>
            <li>Any problems? Write a message to <a href="#">weberb@csc.liv.ac.uk</a></li>
        </ul>
    </div>

    <div class="form-inps" id>
        <form method="post" id="the-form">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="text" name="fname" id="fname" placeholder="First Name">
            <input type="text" name="sid" id="sid" placeholder="SID">
            <input type="email" name="em" id="em" placeholder="Email Address">
            
            <label for="slots"><b>Select the practical slot</b></label>
            <select name="slots" id="slots" size="5">
                <option value="" >Select a slot</option>
                <option value="Monday">Monday 15:00-17:00 (<?php
                    include("dbconnect.php");
                    $conn = OpenCon();
                    include ("show_seats.php");
                    show_seats($conn, 'Monday');
                ?> seats remaining)</option>
                <option value="Tuesday">Tuesday 14:00-16:00 (<?php show_seats($conn, 'Tuesday'); ?> seats remaining)</option>
                <option value="Thursday">Thursday 11:00-13:00 (<?php show_seats($conn, 'Thursday'); ?> seats remaining)</option>
                <option value="Friday">Friday 10:00-12:00 (<?php show_seats($conn, 'Friday'); ?> seats remaining)</option>
            </select>
            
            <div class="form-buttons">
                <button class="reg" onclick= handleSubmit()>Register</button>
                <button type="reset" class="clr" >Clear</button>
            </div>
        </form>
    </div>
    <div class="lec"><a href="./lecturer/lecturer_login.php">If you are a lecturer then click here</a></div>
    <script src="index.js"></script>
</body>
</html>