<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executed</title>
</head>
<body>
    <?php 
        include("./dbconnect.php");
        $conn = OpenCon();
    ?>
    <?php 
        session_start();
        if(isset($_SESSION["sid"])){

            $sql = "SELECT * FROM student WHERE `student`.`std_id` = '{$_SESSION['sid']}'";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                $slot_day = $row["slot_day"];
            }

            $sql_1 = "SELECT seats_remaining FROM slot WHERE `slot_day` = '$slot_day'";
            $result_1 = mysqli_query($conn, $sql_1);
            $row = mysqli_fetch_assoc($result_1);
            $seats_remaining = $row['seats_remaining'];
            
            $sql_2 = "DELETE FROM student WHERE `student`.`std_id` = '{$_SESSION['sid']}'";
            $result_2 = mysqli_query($conn, $sql_2);

            $seats_remaining += 1;
            $sql_3 = "UPDATE `slot` SET `seats_remaining` = '$seats_remaining' WHERE `slot`.`slot_day` = '$slot_day'";
            $result_3 = mysqli_query($conn, $sql_3);
        }
    ?>

    <?php if($result_3): ?>
        <h2>Request completed. Go back to the registration page to choose your new section</h2>
    <?php else: ?>
        <h2>There has been an error. Please try again.</h2>
    <?php endif ?>

    <button onclick=handleClick()>Registration Page</button>

    <script>
        let handleClick = () => {
            window.location.replace("../index.php");
        }
    </script>
</body>
</html>