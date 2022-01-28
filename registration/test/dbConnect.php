<?php  
    class dbConnect {  
        function __construct() {  
            require_once('config.php');  
            $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);  
            //mysqli_select_db(DB_DATABSE, $conn);  
            if(!$conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }   
            return $conn;  
        }  
        public function Close(){  
            mysql_close();  
        }  
    }  
?> 