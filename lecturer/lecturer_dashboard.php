<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer || Dashboard</title>
</head>
<body>
    <?php 
        session_start();
        echo "<h1 class='title'>"."Dashboard of " . $_SESSION['username']."</h1>";
    ?> 
</body>
</html>