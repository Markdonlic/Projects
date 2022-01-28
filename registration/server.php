


<?php
//INTIALIZING VARIABLES
    $username = '';
    $email = '';
    $password1 = '';
    $password2 = '';
    $errors = array();

    //DECLARING THE DATABASE VARIABLES
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'copydb';

    //CONNECTING TO THE DATABASE
    $db_con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    //VALIDATING THE REGISTERATION FORM
    if(isset($_POST['submit'])){

        $username = $db_con->real_escape_string($_POST['username']);
        $email = $db_con->real_escape_string($_POST['email']);
        $password1 = $db_con->real_escape_string($_POST['password1']);
        $password2 = $db_con->real_escape_string($_POST['password2']);
   
        //CHECKING FOR EMPTY VARIALBLES
        if(empty($username)){
            array_push($errors, "Username not found");
        }
        if(empty($email)){
            array_push($errors, "Email Required");
        }
        if(empty($password1)){
            array_push($errors, "Password Required");
        }

        if($password1 != $password2){
            array_push($errors, "Password do not match");
        }

        //CHECKING FOR NO ERRORS
        if(count($errors) == 0){
            $password = md5($password1);
            $sql_querys = "INSERT INTO applicants (username, email, passwords) 
            VALUES ('$username', '$email', '$password')";
        
            //QUERING THE DATABASE
            mysqli_query($db_con, $sql_querys);
        }
        else{}
    }
?>