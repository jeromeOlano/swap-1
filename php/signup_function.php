<?php
    //start a session
    session_start();

    //database info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //etsablish connection with database
    $conn = new mysqli($servername, $username, $password, $database);

    //code functionality starts here
    //data from signin.html are stored in variables

    $lastname = $_POST["lname"];
    $firstname = $_POST["fname"];
    $gender = $_POST["gender"];
    $username = $_POST["uname"];
    $address = $_POST["add"];
    $contact = $_POST["con-no"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["con-pas"];

    $_SESSION["error"] = array();

    $file = $_FILES['file'];
    
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];
    $new_filename = "";
    $fileDestination = "";

    //get the file extenstion bye separating it by the punctuation e.g. '.'
    $file_ext = explode('.', $file_name);
    //convert the file extension into lowecase in case it is in upper by getting the end a.k.a. last element of exploded file_ext
    $file_actual_ext = strtolower(end($file_ext));
    //specify the allowed file types that can be uploaded in the database
    $allowed_ext = array('jpg', 'jpeg', 'png');


    //function definition to check if the username or email is already taken, if it is already taken then the user cannot register with it.
    function validationCheck()
    {
        global $username;
        global $email;
        global $conn;
        global $file_actual_ext;
        global $allowed_ext;
        global $file_size;
        global $fileDestination;

        //check if the username already exist in the database
        $sql = "SELECT Username FROM user_information WHERE Username = '$username'";
        $result = $conn->query($sql);
        $no_error = TRUE;

        if($result)
        {
            if(mysqli_num_rows($result) >= 1)
            {
                array_push($_SESSION["error"], "The username is already taken!");
                $no_error = FALSE;
            }
        }

        //check if the email already exist in the database
        $sql = "SELECT Email FROM user_information WHERE Email = '$email'";
        $result = $conn->query($sql);

        if($result)
        {
            if(mysqli_num_rows($result) >= 1)
            {
                array_push($_SESSION["error"], "The email is already registered to another account!");
                $no_error = FALSE;
            }
        }

        //check if the file type of valid id is allowed
        if(in_array($file_actual_ext, $allowed_ext))
        {
            //check if the file size of the valid id is less than 5mb
            if($file_size < 5000000)
            {
                //give the file we will upload a random unique id as a name so in case another user uplaoded an image with the same name it will not be overwritten
                $new_filename = uniqid('', true).'.'.$file_actual_ext;
                //initialize the destination where the file will be uploaded
                $fileDestination = '../uploads/validID/'.$new_filename;
            }
            else
            {
                array_push($_SESSION["error"], "The valid ID file was too big, it should be less than 5mb");
                $no_error = FALSE;
            }
        }
        else
        {
            array_push($_SESSION["error"], "Invalid file type for valid ID picture, allowed file types are jpg, jpeg, png");
            $no_error = FALSE;
        }

        return $no_error;
    }

    //use the defined validationCheck function to check the credentials, if there are no problem(s) with the credentials that the user entered the data will be recorded or else they are not recorded
    if(validationCheck())
    {
        global $file_tmp;
        global $fileDestination;

        //check if the password matched the confirm password, if matched then the data will be registered else they are not recorded.
        if(strcmp($password, $confirm_password) == 0)
        {
            $sql = "INSERT INTO user_information (First_name, Last_name, Email, Username, Contact, Address, gender, password, id_pic) VALUES ('$firstname', '$lastname', '$email', '$username', $contact, '$address', '$gender', '$password', '$fileDestination')";
            //call the function to actually upload the file from temporary location to the location in project folder
            move_uploaded_file($file_tmp, $fileDestination);

            if($conn->query($sql) === TRUE)
            {
                //redirect to homepage after recording the data
                header("location: ../index.html");
            }
            else
            {
                echo "Error: " . $conn->error;
            }
        }
        else
        {
            array_push($_SESSION["error"], "Password does not match!");
            header('location: ../signup.php');
        }
    }
    else
    {
        header('location: ../signup.php');
    }

?>