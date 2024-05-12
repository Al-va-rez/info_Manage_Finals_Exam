<?php
    function addUser($conn, $username, $password) {
        // check if user is already in database
        $sql = "SELECT * FROM user_credentials WHERE username=?";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([$username]);

        // add user to database
        if ($stmt->rowCount() == 0) {
            $sql = "INSERT INTO user_credentials (username, password) VALUES (?,?)";
            $stmt = $conn->prepare($sql);

            return $stmt->execute([$username, $password]);
        }
    }


    function login($conn, $username, $password) {
        // check if user is in database
        $query = "SELECT * FROM user_credentials WHERE username=?";
        $stmt = $conn->prepare($query);

        $stmt->execute([$username]);

        // verify user information
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch();

            $_SESSION['userinfo'] = $row;

            $uid = $row['user_id'];
            $uName = $row['username'];
            $uPass = $row['password'];

            if (password_verify($password, $uPass)) {
                $_SESSION['user_id'] = $uid;
                $_SESSION['username'] = $uName;
                $_SESSION['userLoginStatus'] = 1;
                return true;
            } else {
                return false;
            }
        }
    }
?>