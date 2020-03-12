<?php  

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

                function get_user_ID() {
                    
                           $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
                            mysqli_select_db($con, "web_shop");
                           
                             $query_ = mysqli_query($con, " select id from web_shop.user WHERE username ='".$_SESSION['login_username']."'; ") or die(mysqli_error($con));
                             $resault = mysqli_fetch_assoc($query_ );
                             if($resault>0){
                             foreach ($resault as $value) {
                                 $item = $value;
                             }
                              return $item;
                             }
                            
                             
                }

            
             
                function Create_shop_card_forUser() {
                   
                    $id = get_user_ID();
                    $con = mysqli_connect("localhost:3307","root","marko") or die(mysql_error($con));
                      mysqli_select_db($con, "web_shop");
                     
                      $query_ = mysqli_query($con, " INSERT INTO `web_shop`.`shoping_card` (`user_id`) VALUES ('".$id."'); ") or die(mysqli_error($con));
                    
                    
                            
               }
               
               

            
        
        ?>
    </body>
</html>
