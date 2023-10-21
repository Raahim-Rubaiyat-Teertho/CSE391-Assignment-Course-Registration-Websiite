<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,500&family=Raleway:wght@100;400;600&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="lecturer_login.css">
    <title>Lecturer || Login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <div class="login-form">
            <form action="lecturer_dashboard" method="post">
                <input type="email" name="email" id="lec_email" placeholder="Username">
                <input type="password" name="password" id="pass" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>