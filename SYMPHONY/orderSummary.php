<?php
session_start();
include_once('./orderController.php');
include_once ('./albumController.php');
include_once('./userController.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}
if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}
$val = $_GET['val'];

$msg = "";

if ($val != -1) {
    
    $albums = getOrderDetails($val);
   

    $total = 0;
    $date = date("Y-m-d");
    $userName = $_SESSION['username'];
    $userDetail = getUserData($userName);
    $firstName = $userDetail['fName'];
    $lastName = $userDetail['lName'];
    $msg .= '<hr>
                        <h2 class="intro-text text-center">Order <strong>Summary</strong> </h2>
                        <hr>
                        <p>
                        Order Id : ' . $val . '<br>'
            . 'Date :' . $date . '<br>
                        User Name: ' . $userName . '<br>
                        First Name:' . $firstName . '<br>             
                        Last Name:' . $lastName . '<br>  
                        
                         </p>
                        <table align="center" width="90%" cellpadding="20">
                        <tr>
                        <th  width="20%" height="40" ><p  class=" text-center intro-text">Album ID</p></th>
                        <th  width="50%" height="40" ><p  class=" text-center intro-text">Album</p></th>
                        <th  width="30%" height="40"  ><p  class=" text-center intro-text">Price</p></th>
                        </tr>';


    foreach ($albums as $value) {
        $albumID = $value['Album_albumID'];
        $album = getAlbumDetails($albumID);
        $name = $album["name"];
        $price = $value['price'];
        $url = $album["url"];
        $artist = $album["artistName"];
        $total += $price;
        $msg.='<tr>'
                . '<td   width="10%" height="40" align="center">' . $albumID . '</td>'
                . '<td width="50%" height="40" align="center"><p style="font-size:15px;"><img class="img-responsive" src=' . $url . ' alt="" align="left" width="50" height="100"><strong>' . $name . '</strong><br>'
                . $artist . '</p></td>'
                . '<td width="30%" height="40" align="center">' . $price . '</td>'
                . '\'</tr>';
    }
    $msg.='<tr><td width="10%" height="40"></td>'
            . '<td width="50%" height="40" align="right"><br><br><p><strong>Total:</strong></p></td>'
            . '<td width="10%" height="40" align="center"><hr><p><strong >US $' . $total . '</strong></p></td>'
            . '</table><hr>';
} else {
    $msg = "Transaction Filed";
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Order Details</title>

        <!-- Bootstrap core CSS -->
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>

        <!-- Add custom CSS here -->
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>
    </head>

    <body>

        <div class="brand">SYMPHONY</div>
        <div class="address-bar">Get Your Favorite Music Album Now</div>
        <div class="container">
            <div class="row">
                <div class="box">
<?php echo $msg ?>; 
<a href="index.php" class="btn btn-primary" style="float: right;"><span class='glyphicon glyphicon-chevron-left'></span><strong>Back To Home</strong></a>
                </div>
            </div>
        </div>
    </body>
</html>