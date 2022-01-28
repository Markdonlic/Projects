<?php include 'config_file.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Document</title>
</head>
<body>
    <div class="container">
       <fieldset>
           <legend>Register</legend>
           <div class="container1">
               <form method="post" action="config_file.php">
                   <label>Username</label><br>
                <input type="text" name="username" />
                <br>
                <label>Email</label><br>
                <input type="email" name="email" autocomplete="on"/>
                <br>
                <label>Password</label><br>
                <input type="password" name="password1" autocomplete="off"/><br>
                <label>Confirm Password</label><br>
                <input type="password" name="password2" autocomplete="off"/><br>
                <input type="submit" name="submit" value="Register"/>
           
               </form>
                </div>
       </fieldset> 
    </div>
    
</body>
</html>