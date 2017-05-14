<?php
session_start();
if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Your Cart</title>

        <!-- Bootstrap core CSS -->
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>

        <!-- Add custom CSS here -->
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>
    </head>

    <body>

        <div class="brand">SYMPHONY</div>
        <div class="address-bar">Get Your Favorite Music Album Now</div>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home</a>
                        </li>
                        <li><a href="categoryView.php">Categories</a>
                        </li>
                        <li><a href="about.html">About</a>
                        </li>
                        <li><a href="quiz.html">Quiz</a>
                        </li>
                        <li><a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <?php
        include_once('./albumController.php');
        $albums = $_SESSION['cart_Items'];
        $view = "";
        if (empty($albums)) {
            $view = '<div class="col-lg-12">                    
                    <h2 class="intro-text02 text-center"><b>Your shopping cart is empty, but it doesnt have to be.</b></h2>
                    </div><p align="center">There are lots of great deals and one-of-a-kind items just waiting for you.
                    Start shopping, and look for the "Add to cart" button. You can add several items to your cart and pay for them all at once.</p>';
        } else {

            $total = 0;
            $view = '<hr>
                        <h2 class="intro-text text-center">Cart <strong>Summary</strong> </h2>
                        <hr>
                        <table align="center" width="90%" cellpadding="20">
                        <tr>
                        <th  width="20%" height="40" ><p  class=" text-center intro-text">Album ID</p></th>
                        <th  width="50%" height="40" ><p  class=" text-center intro-text">Album</p></th>
                        <th  width="30%" height="40"  ><p  class=" text-center intro-text">Price</p></th>
                        </tr>';


            foreach ($albums as $value) {
                $albumID = $value;                   
                $album = getAlbumDetails($albumID);
                $name = $album["name"];
                $price = $album["price"];
                $url = $album["url"];
                $artist = $album["artistName"];
                $total += $price;
                $view.='<tr>'
                        . '<td   width="10%" height="40" align="center">' . $albumID . '</td>'
                        . '<td width="50%" height="40" align="center"><p style="font-size:15px;"><img class="img-responsive" src=' . $url . ' alt="" align="left" width="50" height="100"><strong>' . $name . '</strong><br>'
                        . $artist . '</p></td>'
                        . '<td width="30%" height="40" align="center">' . $price . '</td>'
                       . '<td   width="10%" height="40" align="center"><a href="removeFromCart.php?albumID='.$albumID.'">remove</a></td>'
                        . '</tr>';
            }
            $view.='<tr><td width="10%" height="40"></td>'
                    . '<td width="50%" height="40" align="right"><br><br><p><strong>Total:</strong></p></td>'
                    . '<td width="10%" height="40" align="center"><hr><p><strong >US $'.$total.'</strong></p></td>'
                    . '<td width="10%" height="40" align="center"><br><br><form id="createform"  role = "form"  
                          action = "checkout.php" method = "post"> <button type=submit" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Proceed to checkout</form></td></tr>    '
                    . '</table><hr>';
        }
        ?>
      
        <div class="container">
            <div class="row">
                <div class="box">
<?php echo $view; ?>


                   
                    
                    </div>
                </div>
            </div>





        <!-- /.container -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; 2016 <a href="index.html"> www.symphony.com </a> All rights reserved | Website Design by <a href="#"> DESIGN </a> Company.</p>
                    </div>
                </div>
            </div>
        </footer>

    </body>

</html>
