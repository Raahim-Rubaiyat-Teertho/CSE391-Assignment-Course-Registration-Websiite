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
    ?>

    <?php if(isset($_SESSION['username'])) : ?>
        <h1 class='title'>Dashboard of <?php echo $_SESSION['username'] ?></h1>
        <div class='container'>
            <h2 class='container-title'>Check Enrolled Students</h2>
            <form action=''>
                <select name='query-section' id='query'>
                    <option value='Select'>Select Slot</option>
                    <option value='Friday'>Friday 10:00-12:00</option>
                    <option value='Monday'>Monday 15:00-17:00</option>
                    <option value='Thursday'>Thursday 11:00-13:00</option>
                    <option value='Tuesday'>Tuesday 14:00-16:00</option>
                </select>
            </form>
            <div class='go'>
                <button>Check</button>
            </div>
        </div>

        <button class='logout'>Logout</button>";

    <?php else : ?>
        <h1>Please Login To Continue</h1>

    <?php endif; ?>


</body>
</html>