<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,500&family=Raleway:wght@100;400;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="posted_style.css">
    <title>Registration Completed!</title>
</head>
<body>
    <?php 
        include("dbconnect.php");
        $conn = OpenCon();

        if($_SERVER ["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $fname = $_POST['fname'];
            $sid = $_POST['sid'];
            $email = $_POST['em'];
            $slot = $_POST['slots'];
            if(!empty($name) && !empty($fname) && !empty($sid) && !empty($email) && !empty($slot)) {
                $sql_initial = "SELECT * FROM student WHERE std_id = '$sid'";
                $res_sql_initial = mysqli_query($conn, $sql_initial);

                if(mysqli_num_rows($res_sql_initial) > 0) {
                    if($res_sql_initial) {
                        while($row = mysqli_fetch_assoc($res_sql_initial)) {
                            $sid = $row["std_id"];
                            session_start();
                            $_SESSION["sid"] = $sid;
                        }
                    }
                    header("Location: change_section.php/".$sid);
                    exit();
                } 
                
                else {
                    $sql = "INSERT INTO student (std_id, name, fname, email, slot_day) VALUES ('$sid', '$name', '$fname', '$email', '$slot')";

                    if(mysqli_query($conn, $sql)) {
                        echo "<h2 class='completed'>Your registration has been completed successfully</h1>";
                    }

                    else {
                        echo "<h2 class='completed'>There has been an error. Please try again.</h1>";
                    }
                    
                    $prev_date_sql = mysqli_query($conn, "SELECT seats_remaining FROM slot WHERE slot_day = '$slot'");
                    if(mysqli_num_rows($prev_date_sql) > 0) {
                        foreach($prev_date_sql as $row) {
                            $new_date = $row["seats_remaining"] -1;
                            mysqli_query($conn, "UPDATE slot SET seats_remaining = '$new_date' WHERE slot.slot_day = '$slot'");
                        }
                    }
                }

            }

            else{
                die("<script>alert('Make sure to fill up the fields properly');
                window.location='index.php'
                </script>");
            }
        }
        
    ?>
    <button onclick="window.location='index.php'" class='redirect'>Return to registration page</button>
    <p>You will be promted to the registration page automatically</p>
    <script>
        let timeout = setTimeout(() => {
            window.location.replace("http://localhost/CSE391_Assignment03/index.php");
        }, 2000)
    </script>
</body>
</html>