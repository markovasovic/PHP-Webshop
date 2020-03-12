<?php


session_start();

// čita samo ID i imšplementira se u query na dnu strane...//
function read_ID(){
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

 $id__ = read_ID();
 // sesija će se koristiti za shopingcard_webpage.php i iščitanje korpe korisnika, odnosno za kod ispod //
$_SESSION['user_id'] = $id__;


//računa items-e za individualnog korisnika

    $con = mysqli_connect("localhost:3306","root","марко") or die(mysql_error($con));
            mysqli_select_db($con, "web_shop");
            $query_ = mysqli_query($con, " SELECT count(article_id) FROM web_shop.shoping_card where user_id = '$id__' ; ") or die(mysqli_error($con));
            while ($row = mysqli_fetch_row($query_)) {
                   
                    $data = $row[0];
                    
            }


            mysqli_close($con);

            echo  $data;




?>

