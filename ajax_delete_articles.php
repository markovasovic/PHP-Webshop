
        <?php
        $id = $_REQUEST['id'];
       
            $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $result = mysqli_query($con, " DELETE FROM shoping_card WHERE shoping_card.id = $id ") or die(mysqli_error($con));
            if ($result) {
                echo 1;
             } 
             else {
              echo 0;  
             }
            
            
        
        ?>
   