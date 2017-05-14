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
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Categories</title>

        <!-- Bootstrap core CSS -->
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>

        <!-- Add custom CSS here -->
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
        include_once('./categoryController.php');
            $query = getAllCategories();
            $list = '';
    $i = 0;
    foreach ($query as $row) {
        $id = $row["id"];
        $name = $row["name"];      
        $url = $row["url"];     
        $view ="<div class='col-sm-4 text-center'><a href='home.php?catID=" .$id . "'> <img class='img-responsive img-border img-full' src=" . $url . " alt=''><h3>" . $name . "
             </h3></a></div>";
        if ($i % 3 == 0) {
            $list .=$view ."<BR>";
        } else {
            $list .=$view;
        }

        $i++;
    }
        ?>
      
       <div class="row">
            <!-- <div class="box">-->
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text01 text-center">Latest <strong>Categories</strong>
                </h2>
                <hr>
            </div>

            <div>
                <p><?php echo $list; ?></p>

            </div>



            <div class="clearfix"></div>
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
