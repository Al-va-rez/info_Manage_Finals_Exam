<?php
    session_start();
    require_once('db_Config.php');
    require_once('functions.php');


    // when user is registering
    if (isset($_POST['btn_Register'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // to prevent SQL injections

        // if there are missing fields (reloads register page)
        if (empty($username) || empty($password)) {
            echo '<script>
                alert("The input field is empty!");
                window.location.href = "register.php";
            </script>';
        } else {
            // adds user info to database (then goes back to login page)
            if (addUser($conn, $username, $password)) {
                header('Location: index.php');
            } else { // when user is already registered (goes back to login page)
                echo '<script>
                    alert("Already registered.");
                    window.location.href = "index.php";
                </script>';
            }
        }
    }


    // when user is logging in
    if (isset($_POST['btn_Login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // if there are missing fields (reloads login page)
        if (empty($username) && empty($password)) {
            echo '<script>
                alert("The input field is empty!");
                window.location.href = "login.php";
            </script>';
        } else {
            // when credentials are correct (then goes to menu page)
            if (login($conn, $username, $password)) {
                header('Location: index.php');
            } else { // when credentials are wrong (reloads login page)
                echo '<script>
                    alert("INCORRECT username or password");
                    window.location.href = "login.php";
                </script>';
            }
        }
    }
?>