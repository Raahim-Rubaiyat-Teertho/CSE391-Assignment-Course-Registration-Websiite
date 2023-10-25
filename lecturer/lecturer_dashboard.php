<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,500&family=Raleway:wght@100;400;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">

    <title>Lecturer || Dashboard</title>
</head>
<body>
    <style>
        <?php include "dashboard.css" ?>
    </style>

    <?php 
        session_start();
        if(isset($_GET['logout'])) {
            session_destroy();
            header('Location: ../lecturer_login.php');
            exit();
        }
    ?>

    <?php if(isset($_SESSION['username'])) : ?>
        <h1 class='title'>Dashboard of <?php echo $_SESSION['username'] ?></h1>
        <div class='container'>
            <h2 class='container-title'>Check Enrolled Students</h2>
            <form action='' method="post">
                <select name='querysection' id='query'>
                    <option value=''>Select Slot</option>
                    <option value='Friday'>Friday 10:00-12:00</option>
                    <option value='Monday'>Monday 15:00-17:00</option>
                    <option value='Thursday'>Thursday 11:00-13:00</option>
                    <option value='Tuesday'>Tuesday 14:00-16:00</option>
                </select>
                <div class='go'>
                    <button type="submit">Check</button>
                </div>
            </form>
        </div>

    <?php else : ?>
        <h1 class="title">Please Login To Continue</h1>

    <?php endif; ?>
    
    <?php 
        include("../dbconnect.php");
        $conn = OpenCon();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $slot_name = $_POST['querysection'];
        }

        if(isset($slot_name)) {
            $sql = "SELECT std_id, fname, name, email FROM student INNER JOIN slot WHERE student.slot_day = slot.slot_day AND slot.slot_day = '$slot_name'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0) {
                echo "<table class = 'res_table'>";
                echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["std_id"] ."</td>";
                    echo "<td>" . $row["fname"] ."</td>";
                    echo "<td>" . $row["name"] ."</td>";
                    echo "<td>" . $row["email"] ."</td>";
                    echo "</tr>";
                }
        
                echo "</table>";
            } 
        }
    ?>

    
    <button class='logout'><a href="?logout=1">Logout</a></button>
</body>
</html>