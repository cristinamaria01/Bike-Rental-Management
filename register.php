<?php include('server.php'); ?>


<!DOCTYPE html>

<html lang="">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>User registration</title>
    </head>
    
    <body>
        
        <div class="header">
            <h2>Register</h2>
        </div>
    
        <form method="post" action="register.php" class="content">
            <?php include('errors.php'); ?>
            <div class="username">
                <label>Nume</label>
                <input type="text" name="nume"> 
            </div>
            
            <div class="username">
                <label>Prenume</label>
                <input type="text" name="prenume"> 
            </div>
            
            <div class="username">
                <label>Telefon</label>
                <input type="text" name="telefon"> 
            </div>
            
            <div class="username">
                <label>Adresa</label>
                <input type="text" name="adresa"> 
            </div>
            
            <div class="username">
                <label>Cod Numeric Personal</label>
                <input type="text" name="cnp"> 
            </div>
            
            <div class="username">
                <label>SeriaCI</label>
                <input type="text" name="seriaci"> 
            </div>
            
            <div class="username">
                <label>NumarCI</label>
                <input type="text" name="numarci"> 
            </div>
            
            <div class="username">
                <label>Username</label>
                <input type="text" name="username"> 
            </div>
            
            
            <div class="password">
                <label>Password</label>
                <input type="password" name="password1"> 
            </div>
            
            
            <div class="password">
                <label>Confirm Password</label>
                <input type="password" name="password2"> 
            </div>
            
             <div class="button">
                 <button type="submit" name="register" class="btn">Register</button> 
            </div>
            
            <p>
                Already a member? <a href="index.php">Sign in</a>
            </p>
        
        </form>
    
    </body>
    

</html>