<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = "";
}

if (!isset($_SESSION['cart_Items'])) {
    $_SESSION['cart_Items'] = array();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/style.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>

        <title>LogIn</title>
    </head>
    <body>
        <?php
        include_once('./userController.php');
        include_once('./shoppingCartcontroller.php');
        $msg = "";
        if (isset($_POST['signIn']) && !empty($_POST['name']) && !empty($_POST['txtpassword'])) {
            $userName = $_POST['name'];
            $password = $_POST['txtpassword'];
            $value = signIn($userName, $password);
            if ($value == 1) {
                header("Location: ./index.php");
                $_SESSION['username'] = $userName;
                $values = getCartData($userName);
                foreach ($values as $album){
                 array_push($_SESSION['cart_Items'],$album[0]);
                }
                deleteCartData($userName);
            } else {
                $msg = "Invalid UserName or Password";
            }
        }
        ?>
        <div class="brand">SYMPHONY</div>
        <div class="address-bar">Get Your Favorite Music Album Now</div>

        <nav class="navbar navbar-default">
            <div class="container">          

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div> <!--class="collapse navbar-collapse navbar-ex1-collapse ">-->
                    <ul class="nav navbar-nav navbar-color ">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><a href="categoryView.php">Categories</a>
                        </li>
                        <li><a href="about.html">About</a>
                        </li>
                        <li><a href="quiz.html">Quiz</a>
                        </li>
                        <li><a href="contact.php">Contact</a>
                        </li>
                        <li><a href="vote.html">Vote</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="row">
            <div class="box" >
                <div class="centerDiv">
                    <hr>
                    <h2 class="text-center intro-text">Log In</h2>
                    <hr>
                    <form id="createform"  role = "form"  
                          action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">           

                        <div class="form-group">
                            <label>User Name or Email </label> 
                            <input class="form-control input-sm" id="name" type="text" name="name" placeholder="Enter user name or email address" maxlength="30"/>       
                            <span id="divUserName" class="red-font"></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label> 
                            <input class="form-control input-sm" type="password" id="txtpassword" name="txtpassword" placeholder="Enter Password" maxlength="30"/>       
                            <div id="divPassword" class="red-font"> <?php echo "<br><p style='color: red;font-size: 15px;'>" . $msg . "</p>"; ?></div>
                        </div>                    
                        <div id="crdiv" style="float: right">
                            <a class="btn btn-warning" id="createbtn" href="SignUpForm.php" />Create Account</a> 
                            <input type="submit" class="btn btn-success" id="logInbtn" name = "signIn" value="Sign In"/> 

                        </div>
                    </form>

                </div>
            </div>


        </div>

        <!-- /.container -->
        <footer style="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; 2016 <a href="index.html"> www.symphony.com </a> All rights reserved | Website Design by <a href="#"> DESIGN </a> Company.</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="static/js/SignInScripts.js"></script>
</html>
