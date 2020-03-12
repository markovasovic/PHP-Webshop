
<!--BEGIN OF NAME SPACES-->

<?php require 'classes.php'; ?>
<?php require 'facebook_login.php'; ?>
<?php require 'methods.php';?>
<?php require_once 'zebra/Zebra_Pagination.php';?>

<!--END OF NAME SPACES-->
<?php
 if (session_status() == PHP_SESSION_NONE) {
    session_start();

}
?>
<?php 




?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        
   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="zebra/zebra_pagination.js" type="text/javascript"></script>
        <script src="flips/jquery.flipster.min.js" type="text/javascript"></script>
                 <link href="zebra/zebra_pagination.css" rel="stylesheet" type="text/css"/>
                 <link href="zebra/zebra_pagination.css" rel="stylesheet" type="text/css"/>
                <link href="login_css.css" rel="stylesheet" type="text/css"/> 
                <link href="flips/jquery.flipster.min.css" rel="stylesheet" type="text/css"/>
      
            <script src="jquery.cookie.js" type="text/javascript"></script>
        
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

           
      <link href="proba.css" rel="stylesheet" type="text/css"/>
     
    </head>
    <!--START OF BODY ELEMENTS-->
    <body style="background-image: url(img/wallpaper/fashion_back.jpg); background-repeat: no-repeat;  background-size: cover;" >
      
         <!---BEGIN OF FIRST NAVBAR-->   
        <nav class="navbar navbar-expand-lg " style=" background-color:rgba(14, 16, 16, 0.98);"> <!--begin of first navbar-->
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!--MINI NAV-BAR INSIDE MAIN NAVBAR-->
            
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="Shoping_card_page.php"><i style="color:white;" class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
            </li>
             <span style="height:30px; position: absolute; left: 54px; top: 5px;" class="badge badge-pill badge-danger"><div style="margin-top:5px;" id="shop_cart">0</div></span>

             <li class="nav-item active">
               <a class="nav-link" href="#"><i style="color:white;  margin-left: 10px;" class="fa fa-home fa-2x" aria-hidden="true"></i></a>
            </li>
             <li class="nav-item">
               <a class="nav-link" href="http://localhost/Web_shop/contact.php"><i style="color:white;  margin-left: 10px;" class="fa fa-envelope fa-2x" aria-hidden="true"></i></a>
            </li>
        </ul>
          
            <!--login/logout-->
            
            <ul class="nav navbar-nav navbar-right" style=" margin-right: 30px;">
              
               <li class="nav-item ">
                   <?php if(!isset($_SESSION['login_username'])):?>
               <a id="Login" href="#"><span><i style="color:white;" class="fa fa-sign-in fa-3x"></i></span></a>
                   <?php endif;?>
               
                   <?php if(isset($_SESSION['login_username'])):?>
               <a id="Logout" href="logout.php"><span><i style="color:white;" class="fa fa-sign-out fa-3x"></i></span></a>
                   <?php endif;?>
              </li>
	         
          </ul>
            
            
            
            <form class="form-inline my-2 my-lg-0"  action="search_bar_backend_logic.php" method="POST">
                <input id="input_search" name="input_search" class="form-control mr-sm-2" type="search" placeholder="Search for item" aria-label="Search">
              <button id="search_btn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>  <!--END OF MINI NAV-BAR INSIDE MAIN NAVBAR-->
        
</nav><!--end of first navbar-->
 <!------------------------------------------------------------------------------------------------------------------------------->
    <!---BEGIN OF SECOND NAVBAR-->       
<div class="shadow p-3 mb-5" style=" background-color: rgba(16, 14, 14, 0.8);" >
    
    
        <ul class="nav justify-content-center">
       <li class="nav-item">
         <a class="nav-link active" href="#">HOME</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">ABOUT</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">CONTACT US</a>
       </li>
      
     </ul>
    

</div><!--end of second navbar-->
 <!------------------------------------------------------------------------------------------------------------------------------->
<!--begin of jumbotron and content elements--->
<div class="row">
    
    <div class="col col-md-3">
        
    </div>
    
    <div class="col col-sm-6">
    
        <div class="jumbotron" style=" background-color: rgba(38, 12, 12, 0.2);">
            <h1 class="display-2" style=" text-align: center;">WELCOME!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  
</div>

</div>
    
</div>

<!--end of jumbotron --->

 <!------------------------------------------------------------------------------------------------------------------------------->

<!--BEGIN OF PHP CODE FOR READING ALL ITEMS IN MYSQL DB-->

              <?php
            
              //begin of searchbar reference
              
              if (isset($_SESSION['searchbar'])) {
                  $post = $_SESSION['searchbar'];
               } else {
                   $post = "";
                }
              
            
             
            //end of searchbar reference
             
   
            $records_per_page = 6;
            $arraylist = new ArrayObject();
            $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $query_ = mysqli_query($con, " select id, article_name as name, price, item_description, img from web_shop.articles WHERE article_name LIKE '%{$post}%' ; ") or die(mysqli_error($con));
            while ($row = mysqli_fetch_assoc($query_)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $item_description = $row['item_description'];
                    $img = $row['img'];
                    $artikal = new artikal($id, $name, $price, $item_description, $img);
                    $arraylist[] = $artikal;
            }
            
            $pagination = new Zebra_Pagination();
            $pagination->records(count($arraylist));
            $pagination->records_per_page($records_per_page);
            $arraylist = array_slice(
                (array)$arraylist,
                (($pagination->get_page() - 1) * $records_per_page),
                $records_per_page
              );
            ?>

<?php
unset($_SESSION['searchbar']); // clear searcbox session when user reload browser

?>
<!--END OF PHP CODE FOR READING ALL ITEMS IN MYSQL DB-->


 <!------------------------------------------------------------------------------------------------------------------------------->

<!--start of item card elements-->

<div class=" container-fluid">


   <div class="card-columns" style=" display: inline-block;">
       
       
     <?php foreach ($arraylist as $key => $value):?> <!--begin of showing DB items in card configuration-->
              <?php $id=$value->id?>
  <div class="card" style="width:400px; margin-left: 70px; margin-top: 30px; background-color: rgba(199, 199, 173, 0.45);">
      <img class="img-thumbnail" src="img/big/<?php echo $value->img;?>" alt="Card image" style="width: 100%; height: 30%;">
  <div class="card-body">
    <h4 class="card-title"><?php echo $value->name ;?></h4>
    <p class="card-text">$<?php echo $value->price; ?></p>
    <button style="width:140px;" class="btn btn-warning btn_2" id="<?php echo $id;?>">look on item <span><i class="fa fa-eye" aria-hidden="true" style="font-size:18px;"></i></span></button>
  </div>
</div>
       
      <?php endforeach;?>  <!--end of showing DB items in card configuration-->
     
</div>
      
       
       
  </div>

 <!--ends of item card elements-->
    
 
  <!------------------------------------------------------------------------------------------------------------------------------->
 
 
 <!--START OF  MODAL SHOW UP WHEN USER CLICK ON ITEM BUTTON VIEW-->
    
                <div class="modal fade product_view" id="product_view">
               <div class="modal-dialog">
                     <div class="modal-content" style="width:600px; height:600px; background-color: rgba(255, 255, 245,0.9);">
                     <div class="modal-header">
               
                
                    </div>
               <div class="modal-body" id="employee_detail" >
              
                       
              </div>
                    </div>
            </div>
      
        </div>
 
  <!--END OF  MODAL SHOW UP WHEN USER CLICK ON ITEM BUTTON VIEW-->
 <!------------------------------------------------------------------------------------------------------------------------------------------------------>
  
  
 <!--BEGIN OF LOGIN MODAL-->
 <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			
				<div class="modal-header">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Username</label>
                                                <input id="username" type="text" class="form-control" required="required">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
							<a href="#" class="pull-right text-muted"><small>Forgot?</small></a>
						</div>
						
                                            <input id="password" type="password" class="form-control" required="required">
					</div>
                                    
                                    
                                    <div class="form-group" style="float:right;" >
						<div class="clearfix">
							<label>Login with facebook</label>
                                                        <a href="<?php echo $login_url; ?>" style="width:170px;" class="btn btn-primary">Login   <span><i style="color:white;" class="fa fa-facebook-f"></i></span></a>
                                                        
						</div>
						
                                           
					</div>
                                    
                                    
				</div>
				<div class="modal-footer">
					
                                        <input type="submit" id="btn-login" class="btn btn-primary pull-right" value="Login">
				</div>
			
		</div>
	</div>
</div> 
 
 
  <!--END OF LOGIN MODAL-->
 <!--------------------------------------------------------------------------------------------------------------------------------------------------------------------->
  
 
 <div style=" margin-bottom: 8px;">
            <?php $pagination->render();?>     
 </div>  
 
 
 
 
 
 


  <!--START OF JAVASCRIPT/JQUERY-->  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
  
  
  $( document ).ready(function() {
      
      
      //----------------bottom navbar on mouse over-------------------
//         $("a").mouseover(function(){
//            $(this).css("color", "yellow");
//            $(this).css("width", "40px;");
//         });
//         
//           $("a").mouseleave(function(){
//            $(this).css("color", "silver");
//            
//         });
      
      //------------------------------------
      
      
    //---------------------BEGIN OF LOGIN MODAL POPUP------------------------------------
      $("#Login").on("click", function(){
               
               $("#myModal").modal("show");
               
               
      });
    //----------------------END OF OF LOGIN MODAL POPUP-----------------------------------
     //-----------------------------------------------------------BEGIN OF USER LOGIN AJAX LOGIC-------------------------
            $("#btn-login").on("click",function(){
                
                var username = $("#username").val();
                var password = $("#password").val();
                
                if (username !== "" && password!== "") {
                
                $.ajax({

                    url : 'ajax_login.php',
                    type : 'POST',
                    data : {
                        'username' : username, 'password' : password
                    },
                    dataType:'html',
                    success : function(data) {              
                        if(data==1){
                             swal("Welcome", "you are login successfully ", "success").then(function(){window.location="http://localhost/Web_shop/index2.php"});
                        }else{
                            swal("wrong username or password", "", "error");
                        }
                        
                    },
                    error : function(request)
                    {
                        window.alert("error"+request);
                    }
                });
                
                 
                  
                }
           
            });
      //-----------------------------------------------------------END OF USER LOGIN AJAX LOGIC-------------------------
    
    
    
    
    //-----BEIN OF SEARCH BAR-------------  

   //-----END OF SEARCH BAR-------------  
   
  //---------------BEGIN OF ITEMS MODAL POPUP----------------------
  $(".btn_2").on("click", function(){
              var id_ =  $(this).attr("id");
             
             $.ajax({  
                url:"ajax_modal.php",  
                method:"post",
               
                data:{employee_id:id_},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $("#product_view").modal("show");
                      
                       }  
                   });  

             });
   //---------------END OF ITEMS MODAL POPUP----------------------
  
  
  //-----------BEGIN of counting shopingcard items for user-------------------------------
                function ReadArticles_fromDB()
                    {
                          $.ajax({  
                             url:"ajax_read_shoping_card.php",  
                              method:"post",
                              async: true,
                             
                              success:function(data){  
                                      $("#shop_cart").html(data); 
                                       }  
                                   });  


                    }

             ReadArticles_fromDB();
          
    //-----------END of counting shopingcard items for user-------------------------------

});
  
  
  
  
  
  
  
  
  

  
  
  </script>

 <!--END OF JAVASCRIPT/JQUERY-->             
      
    </body><!--END OF BODY ELEMENT-->
</html>
