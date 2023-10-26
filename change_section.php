<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,500&family=Raleway:wght@100;400;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <title>Change Section</title>
</head>
<body>
    <style>
        <?php include "change_section.css" ?>
    </style>

    <?php 
        session_start();
        $_SESSION['sid'];
    ?>

    <div class="container">
        <h2 class="completed">You Have Completed Your Registration Already. Do You Want To Change Your Section?</h2>
        <p class="info">Click on the button below if you're sure you want to change your section. Your previous data will be deleted if you move forward.</p>
        <button class="change"> <a <?php echo "href='../change_section_script.php/" . $_SESSION['sid'] . "'" ?>
>Change Section</a></button>
        <button class="no-change" onclick=handleNoChange()>Return To Registration Page</button>
    </div>

    <script>
        let handleNoChange = () => {
            window.location.replace("../index.php");
        }
    </script>
</body>
</html>