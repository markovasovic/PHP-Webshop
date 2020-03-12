
<html lang="en">
    <head>
        <meta charset="utf-8">
      
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
          <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <style>
              
              p,h2,label{
                  color: silver;
              }
              
          </style>
    </head>
    
    <body style="background: url(img/wallpaper/phonebox.jpg); background-repeat: no-repeat; background-size:cover; background-position: center; height: 100%;" >
        
        <div class="container">
            <div class="row">
                <div class="col-lg-8 " style=" background-color: rgba(51,51,102, 0.7); width: 500px; height: 500px; right: 250px; margin-top: 90px;  ">
                    <h2>Contact</h2> 
                    <p> Please send your message below if you have any questions. We will get back to you at the earliest! </p>
                  
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"> Message:</label>
                                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7" style=" background-color: rgba(248,248,225,0.4) "></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name:</label>
                                <input style=" background-color: rgba(248,248,225,0.6);" type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input style=" background-color: rgba(248,248,225,0.6);" type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class=" btn btn-info btn-lg  pull-right" id="send" name="send" style=" background-color: rgba(102,153,255,0.9);" >Send &rarr;</button>
                            </div>
                        </div>
                   
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your message successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>
                </div>
            </div>
        </div>
           <script>
          
          $("#send").on("click", function(){
              
                   name = $("#name").val();
                        email = $("#email").val();
                        message = $("#message").val();

                      $.ajax({

                                url : 'contact_ajax.php',
                                type : 'POST',
                                data : {
                                    'name' : name, 'email' : email, message: message
                                },
                                dataType:'html',
                                success : function() {              
                                   swal("MESSAGE SENT !!!", " we will get back to you soon !   ", "success").then(function(){window.location="http://localhost/Web_shop/contact.php"});

                                }
                   });
                
           
              
          });
          
          
      
           
           
           </script>
    </body>


<!--server side-->


