<?php 
    include("../dbconnect.php");
    $conn = OpenCon();

    if($_SERVER ["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if(!empty($email) && !empty($password)) {
            $sql = "SELECT * from  lecturer WHERE email = '$email' and password = '$password'";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) == 0) {
                header("Location: lecturer_login.php?error=1");
                exit();
            }

            if($result)  {
                while($row = mysqli_fetch_assoc($result)) {
                    $username = $row["username"];
                    $email = $row["email"];
                    $password = $row["password"];
                    session_start();
                    $_SESSION["username"] = $username;
                }

                header("Location: lecturer_dashboard.php/".$username);
                exit();
            }
        }
    }
?>