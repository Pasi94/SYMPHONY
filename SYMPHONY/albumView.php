<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}

if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}
$size = count($_SESSION['cart_Items']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>
    </head>
    <body>
   <?php
        $bt = '';
        if (empty($_SESSION['username'])) {
            $bt = "<a href='SignUpForm.php' class='btn btn-danger'/>Sign Up</a> "
                    . "<a href='SignInForm.php' class='btn btn-warning'/>Sign In</a> ";
        } else {
            $bt = "<div Style='color:white;'>" . $_SESSION['username'] . "&nbsp;&nbsp;<a href='signout.php' class='btn btn-info'/>Sign Out</a>&nbsp;&nbsp;         <a href='shoppingCart.php'><span class='glyphicon glyphicon-shopping-cart'></span>Cart&nbsp;<span class='badge'>" . $size . "</span></a>
</div>
             ";
        }
        ?>
        <?php
        include_once('./albumController.php');
        $album = getAlbumDetails($_GET['albumID']);

        if (!empty($album[0])) {
            $albumID = $album["albumID"];

            $button = "";
            if (($key = array_search($_GET['albumID'], $_SESSION['cart_Items'])) !== false) {
                $button = '<button type="submit" class="btn btn-success" disabled>Added
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </button>';
            } else {
                $button = ' <form  role = "form"  
                           action = "addToCart.php" method = "get">           
                        <input type="hidden" value=' . $albumID . ' name="albumID"/>
                        <button type="submit" class="btn btn-warning" >Add to Cart
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </button>
                    </form>';
            }
            $albumName = $album["name"];
            $price = $album["price"];
            $url = $album["url"];
            $artist = $album["artistName"];
            $publishDate = $album["publishDate"];
            $desc = $album["desc"];

            $songs = getAlbumSongs($_GET['albumID']);
            $list = '<table align="center" border="" style="background-color:;border-collapse:collapse;border:px solid #D7B360;color:#FEFEFE;" cellpadding="0" cellspacing="0">
               <tr><th colspan="3" class=" text-center">List of songs</th></tr>
               <tr><th  width="50" height="40" align="center">No</th>
                <th width="600" height="40" align="center">Song</th>
                <th width="50" height="40"align="center">Duration</th></tr>
                ';
            $count = 0;
            $totalLength = 0;
            foreach ($songs as $row) {
                $id = $row["id"];
                $name = $row["name"];
                $duration = $row["duration"];
                $list.='<tr>
		<td width="50" height="40" align="center">' . ++$count . '</td>
		<td width="600" height="40" align="center">' . $name . '</td>
		<td width="50" height="40" align="center">' . $duration . '</td>';
            }
            $list.='</table>';
        }
        ?>
 <div style="float:right; padding: 5px; width: 40%;">
            <div class="container col-lg-6">
                <div class="row">		
                    <form id="search"  role = "form"  
                          action = "home.php" method = "get">           
                        <div id="custom-search-input">                        
                            <div class="input-group col-md-12">
                                <input type="text" class="search-query form-control" placeholder="Search"  name="search"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <?php
                echo $bt;
                ?>
            </div>
        </div>
        <br>
        <br>
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
                        <li><a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">

            <div class="row">
                <!-- <div class="box">-->
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text01 text-center"><?php echo $artist; ?> <strong><?php echo $albumName; ?></strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-responsive img-border" src="<?php echo $url; ?>" alt="">

                </div>
                <?php
                ?>
                <div class="col-lg-6">
                    <p Style="color: white;">
                        Price: <?php echo "US $" . $price; ?></p>
                    <?php echo $button; ?>
                </div>
            </div>
            <div  Style="color: white;">
                <b  Style="color: yellow;">Product Details</b>
                <br>
                Album:<?php echo $albumName; ?><br>  
                Artist Name :<?php echo $artist; ?><br>  
                Release Date:<?php echo $publishDate; ?><br>

                <div class="centerDiv">Description : <?php echo $desc ?></div>
                <br>
            </div>
        </div>
        <hr>
        <?php
        echo $list;
        ?>



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
