<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <style>
            body {
                background-color: darkslateblue;
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
            <h1>REGISTER</h1>
            
            <form action="handleForm.php" method="POST">
                <p>
                    <label for="tf_uName">Username: </label>
                    <input type="text" id="tf_uName" name="username">
                </p>
                
                <p>
                    <label for="tf_uPass">Password: </label>
                    <input type="password" id="tf_uPass" name="password">
                </p>

                <input type="submit" value="Register" id="register_Btn" name="btn_Register">
            </form>
        </div>
    </body>
</html>