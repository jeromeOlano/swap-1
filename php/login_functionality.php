<?php
    session_start();
    //create the connection with the database
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'swap_information';

    $conn = new mysqli($servername, $username, $password, $database);

    $username = $_POST["username"];
    $password = $_POST["password"];


    //search if the username exists in the database
    $result = $conn->query("SELECT Username FROM user_information WHERE Username = '$username'");

    //check if the username exist
    if(mysqli_num_rows($result) > 0)
    {
        //if the username exist, get the password for matching
        $result = $conn->query("SELECT password FROM user_information WHERE Username = '$username'");
        $row = $result->fetch_assoc();
        $saved_password = $row["password"];

        //match the saved password with the password that the user entered
        if(strcmp($saved_password, $password) == 0)
        {
            //get the user id before logging in for later use in other pages
            $result = $conn->query("SELECT User_info_id FROM user_information WHERE Username = '$username'");
            $row = $result->fetch_assoc();
            $id = $row["User_info_id"];
            $_SESSION["userID"] = $id;
            
            //redirect to homepage
            header("location: ../index.html");
        }
        else
        {
            $_SESSION["error"] = "The password you've entered is incorrect.";
            header("location: ../login.php");
        }
    }
    else
    {
        $_SESSION["error"] = "The username does not exist.";
        header("location: ../login.php");
    }
?>