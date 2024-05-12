<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <style>
            body {
                background-color: darkslategray;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            div {
                background-color: white;
                border: 5px solid;
                width: fit-content;
                padding: 25px 50px;
                margin: auto;
                margin-top: 50px;
            }
            h1 {
                text-align: center;
            }
            form {
                padding: 15px 0px 30px;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>LOGIN</h1>
            
            <form action="handleForm.php" method="POST">
                <p>
                    <label for="tf_uName">Username: </label>
                    <input type="text" id="tf_uName" name="username">
                </p>
                
                <p>
                    <label for="tf_uPass">Password: </label>
                    <input type="password" id="tf_uPass" name="password">
                </p>

                <input type="submit" value="login" id="loginBtn" name="btn_Login">
            </form>

            <i><a href="register.php">Register</a></i>
        </div>
    </body>
</html>