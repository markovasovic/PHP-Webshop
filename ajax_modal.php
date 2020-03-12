
<head>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="jquery.cookie.js" type="text/javascript"></script>
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="flips/jquery.flipster.min.js" type="text/javascript"></script>
     
    <script>
     
    $("#carousel").flipster({
    style: 'carousel',
    spacing: -0.5
    
    });
    

    </script>
</head>
<?php

 if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include 'methods.php';
include 'read_img.php';

    
    


if (isset($_REQUEST['employee_id'])) {
     $_SESSION['art_id'] = $id = $_REQUEST['employee_id'];
}
    

   
    
    
    

         
         
         

           $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $query_ = mysqli_query($con, "  SELECT group_concat(images.image_name)as images FROM web_shop.articles join web_shop.images on images.article_id = articles.id where article_id = '".$_SESSION['art_id']."' ; ") or die(mysqli_error($con));
            while ($row = mysqli_fetch_assoc($query_)) {
                   
                  $images = explode(',', $row['images']);
                           $images[0];
                           $images[1];
                           $images[2];
                          
                       
            }

            $data ="";
?>

        
     <?php $data=' <div class="row"> 
                    
               
                <div class="col col-lg-12 img"> <!--colon of 12-->
                            <div id="carousel">
                                <ul >
                                    <li>
                                        <img src="img/big/'.$images[0].'" alt=""/>
                                    </li>
                                    <li >
                                        <img src="img/big/'.$images[1].'" alt=""/>
                                     </li>
                                    <li>
                                       <img src="img/big/'.$images[2].'" alt=""/>
                                    </li>
                                    
                                  

                                </ul>
                            </div>
                    </div>
                     </div>  <!--end of first colon of 12-->
                </div>
                
                <div class"row col col-lg-12">
                <table class="table table-bordered">
    <thead>
      <tr>
        <th>SIZE:</th>
        <th>COLOR:</th>
        <th>QUANTTY:</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <select name="size" id="size">
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
            <option value="XXXL">XXXL</option>
         </select>


       </td>
        <td>
        <select name="color" id="color"> 
         <option value="BLACK">BLACK</option>
         <option value="RED">RED</option>
         <option value="BLUE">BLUE</option>
        </select>
       </td>
        <td>
        <select name="quantity" id="quantity"> 
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>
         <option value="10">10</option>
        </select>


       </td>
      </tr>
    
    </tbody>
  </table>
                </div>
                                             
                <div class"row">   
                    <div class="col col-md-12">
                         
                          <button type="submit" name="btn-card" id="btn-card" class="btn btn-success btn-card" visible="false" style="width:220px;">add to card <span><i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i></span> </button>
                        
                          <button id="btn-view" class="btn btn-primary btn-view" style="width:220px;"> save to watch list<span> <i class="fa fa-heart" aria-hidden="true"></i> </span></button>
                    </div>
                </div>
                                               
                
                
                </div> '; ?> 


  <?php

 echo $data;

?>

<?php

   

    
    
   
       
     
  
?>       

<?php 

 

$session = isset($_SESSION['login_username']);

 

 
 

?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>




        function insertIntoSessions(){
      
            size = $("#size").val();
              color = $("#color").val();
                quantity = $("#quantity").val();
            
              
                $.ajax({  
                 url:"sessions_inset_INTO_DB.php",  
                method:"post",
               
                data:{size:size,color:color,quantity:quantity}  
                
                 });  
            
            
        }
         
       
         $(".btn-card").on("click", function(){
               
                       
                     <?php if($session):?>  
                    insertIntoSessions();      
                    swal("added to shoping card", "", "success").then(function(){ window.location = "http://localhost/Web_shop/index2.php";});             
                     <?php endif;?>  
                       
                     <?php if(!$session):?>  
                       swal("please login ", "", "info").then(function(){ window.location = "http://localhost/Web_shop/index2.php";});
                   <?php endif;?>  

         });

    
</script>             

  

