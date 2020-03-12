        
        <?php
      
        require 'methods.php';
        require 'read_img.php';
        require 'read_artical_price.php';
        
        if (session_status() == PHP_SESSION_NONE) {
                session_start();
          }   
          if (isset($_REQUEST["color"])&&isset($_REQUEST["quantity"])&& isset($_REQUEST["size"])) {
         $_SESSION["color"] =  $_REQUEST["color"];
        $quantity = $_SESSION["quantity"] = $_REQUEST["quantity"];
          $_SESSION["size"]= $_REQUEST["size"];
         $_SESSION['art_id'];
         $_SESSION["user_id"] = get_user_ID();
         $img = getPicture();
         $price = getPrice();
         $total_price = $quantity * $price;
         $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $query_ = mysqli_query($con, "  INSERT INTO `web_shop`.`shoping_card` (`user_id`, `article_id`, `quantity`,  `size`, `color`, `artical_img`,`art_price`,`total_price`) VALUES ('".$_SESSION["user_id"]."', '".$_SESSION['art_id']."', '".$_SESSION["quantity"]."', '".$_SESSION["size"]."', '".$_SESSION["color"]."', '".$img."' , '".$price."', '".$total_price."'    );   ") or die(mysqli_error($con));
            if ($query_) {
                
            }
         
         
         
          }
           
        
        
             echo $_SESSION["color"];
             echo $_SESSION["quantity"];
             echo $_SESSION["size"];      
            echo $_SESSION['art_id'];
            echo  $_SESSION["user_id"];
        
        
        
        
 