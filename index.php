<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Inchriere</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="index.php" class="content">
       <?php include('errors.php'); ?>
        <div class="username">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        
        <div class="password">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        
        <div class="button">
            <button type="submit" name="login" class="btn">Login</button>
        </div>
            Not a member? <a href="register.php">Register</a>
        <p>
            
        </p>

    </form>
    
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    
</body>

</html>
