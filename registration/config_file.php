<?php
    class default_config{

        
        //protected $con;

         

        //public 
        //SANITIZING THE STRING FROM SPECIAL CHARACTERS
        public function sanitize_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            
            return $data;
        }

        //CONNECTING TO THE DATABASE
        public function connect_db(){
        }

        //VALIDATING THE FORM
        private function validation(){
        }

        
        //METHOD TO CHECK IF ANY FORM FIELD IS EMPTY
        public function check_values(){
 $errors = array();

            $username = '';
         $email = '';
         $password = '';
            //DECLARING THE REQUIRED VARIABLES
         $db_hosts = 'localhost';
         $db_username = 'root';
         $db_password = '';
         $db_name = 'copydb';
            $con =  new mysqli($db_hosts, $db_username, $db_password, $db_name);
            if(mysqli_connect_errno()){
                printf("Connection error", mysqli_connect_errno());
                exit();
            }
            
        ///////////////////////////////////////////////
        if(isset($_POST['submit'])){
            
            $username = $this->sanitize_input($_POST['username']);
            $email = $this->sanitize_input($_POST['email']);
            $password1 = $this->sanitize_input($_POST['password1']);
            $password2 = $this->sanitize_input($_POST['password2']);
            //////////////////////////////
            if(empty($username)){
                array_push($errors, "Username Required!!!");
            } else {
                if(!preg_match("/^[a-zA-Z ]*$/", $username)){
                    array_push($errors, "Username should not contain special characters");
                } else {
                }
            }

            if(empty($email)){
                array_push($errors, "Email Required!!!");
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    array_push($errors, "Incorrect Email format!!!");
                } else {
                }
            }

            if(empty($password1)){
                array_push($errors, "Password Required!!!");
            } else {
                if($password1 !== $password2){
                    array_push($errors, "Password do not match!!!");
                } else {
                    $password = md5($password1);
                }
            }

            if(count($errors) == 0){
                $sql_query = "INSERT INTO applicants (username, email, passwords)
                VALUES ('$username', '$email', '$password')";
                mysqli_query($con, $sql_query);
            }
          }
        }  
}

    $inherit = new default_config;
    //$inherit->errors();
    //$inherit->connect_db();
    $inherit->check_values();
    //$inherit->insert_into_database();
    
    
?>
