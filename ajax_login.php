<?php

 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



  if (isset($_REQUEST['username'])&&isset($_REQUEST['password'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
 }



            $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $query_ = mysqli_query($con, " select username from web_shop.user WHERE username ='".$username."' and password ='".$password."'; ") or die(mysqli_error($con));
            $row = mysqli_num_rows($query_);
            if ($row > 0) { 
             
                     $_SESSION['login_username'] = (string)$username;
                
                   
                     echo 1;
                    
            }else{
                echo 0;
            }
    
        

           
















    
       