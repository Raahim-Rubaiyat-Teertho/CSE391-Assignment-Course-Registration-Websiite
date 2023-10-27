<?php 
function show_seats($conn, $day) {
    // include("dbconnect.php");
    // $conn = OpenCon();

    $remain = mysqli_query($conn, "SELECT seats_remaining FROM slot WHERE slot_day = '$day'");

    
    foreach($remain as $row) {
        return $row['seats_remaining'];
    }

    // CloseCon($conn);
    
}
?>