<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='jquery.elevatezoom.js'></script>
<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->



<?php require_once 'classes.php';?>
<?php
ob_start();

?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['login_username'])) {
    header("location: http://localhost/Web_shop/index2.php");
}

?>


<?php 
// reads id of logged user
    function read_user_ID(){
                     if (isset($_SESSION['login_username'])) {
                     $session = $_SESSION['login_username'];
                 } else {
                 $session = 0;    
                 }
                    $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
                            mysqli_select_db($con, "web_shop");
                            $result = mysqli_query($con, " select id from web_shop.user WHERE username = '".$session."'; ") or die(mysqli_error($con));
                           if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                        return $row['id'];
                    }
            
}

}






//reading user articles in user_basket...//

function read_item_ID(){
     $user_id = read_user_ID();
    
                  $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
                  mysqli_select_db($con, "web_shop");
                  $datas = array();
                            $result = mysqli_query($con, " SELECT article_id FROM web_shop.shoping_card where user_id = $user_id ") or die(mysqli_error($con));
                           if (mysqli_num_rows($result) > 0) {

                    while($row = mysqli_fetch_assoc($result)) {
                        $datas[] = $row['article_id'];
                    }
    
                  

       }
       return $datas;
}






$lista_artikala = array();

 ?>


<?php 
$id = read_user_ID();
if ($id) {
 $id1 = $id;   
}else{
    $id1 = 0;
}

 // read articles from basket for individual user
 
    $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $result = mysqli_query($con, " SELECT articles.article_name , articles.price, shoping_card.quantity,shoping_card.artical_img as img, shoping_card.id, shoping_card.art_price as price, shoping_card.total_price as total FROM   web_shop.articles LEFT JOIN web_shop.shoping_card ON web_shop.articles.id = web_shop.shoping_card.article_id WHERE  web_shop.shoping_card.user_id = $id1;  ") or die(mysqli_error($con));
            if (mysqli_num_rows($result) < 1) {
                   header("location: http://localhost/Web_shop/index2.php");
              }
           elseif (mysqli_num_rows($result) > 0){
                $full_total = 0;
               while ($row = mysqli_fetch_assoc($result)) {
                  
                   $name = $row['article_name'];
                   $price = $row['price'];
                   $img = $row['img'];
                   $id = $row['id'];
                   $price = $row['price'];
                   $quantity  = $row['quantity'];
                   $total = $row['total'];
                   $artikal = new individual_artikal( $name,$price,$img, $id, $quantity, $total  );
                   $lista_artikala[]  = $artikal;
                  $full_total += $price * $quantity;
                  $arraylist = array('');
                  
               }
               
  }

  

?>



<!-- item quantity--> 




<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <form method="post" action="paypall.php">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center"></th>
                        <th class="text-center">Price</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
            
                  <?php foreach ( $lista_artikala as $value) :?>
              
                    <tr>
                       
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img  class="media-object zoom_01" src="img/big/<?php echo $value->img ;?>"  data-zoom-image="img/big/<?php echo $value->img ;?>"    style="width: 130px; height: 130px;"> </a>
                          
                        </div></td>
                        <td class="col-md-1" style="text-align: center">
                           
                            <input type="text" class="form-control"  disabled="true" id="exampleInputEmail1" value="<?php echo $value->quantity;  ?>">
                          
                        </td>
                       
                        <td class="col-md-1">
                            <button type="button" class="btn btn-danger btn-remove" id="<?php echo $value->id;?>">
                            <span class="glyphicon glyphicon-remove"></span>remove
                        </button>
                        </td>
                        <?php
                            
                              
                              
                      
                        ?>
                        <td class="col-md-1" style="text-align: center">
                             
                            <input type="text" class="form-control" disabled="true" id="exampleInputEmail1" value="<?php echo  $value->total;  ?>">
                          
                        </td>
                       
                    </tr>
                  
                     <?php endforeach;?> 
                 
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total price :</h3></td>
                      
                        <td class="text-right"><h3><strong><?php echo $full_total;?></strong></h3></td>
                    </tr>
                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <button type="button" class="btn btn-warning" id="continue" style="width:160px; height: 44px;">
                            <span class="glyphicon glyphicon-shopping-cart" ></span> Continue Shopping...
                        </button></td>
                        <td>
                        <button type="button" id="paypall" >
                           <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_150x38.png" />
                        </button></td>
                      
                    </tr>
                </tbody>
            </table>
      </form>
            
             <?php $_SESSION['amount'] = $full_total; ?>
            
            
        </div>
    </div>
</div>






































<script>
   
  
   paypal.Buttons().render('#paypal-button-container');
   
   
    $("#paypall").on("click", function(){
        window.location.href ="http://localhost/Web_shop/paypall.php";
    });
    $("#continue").on("click",function(){
       window.location.href ="http://localhost/Web_shop/index2.php";
   });
   
     $('.zoom_01').elevateZoom({
  zoomType: "lens",
  lensShape : "round",
  lensSize    : 200
}); 
    
    $(".btn-remove").on("click", function(){
               
           var $id = $(this).attr("id");
               
            $.ajax({
                            url:'ajax_delete_articles.php',
                            type:'post',
                            async: true,
                            data:{id:$id},
                            success:function(response){
                               
                                if(response == 1){
                                   window.location.reload();
                                }
                               
                            }
                        });
               
               
           });
</script>