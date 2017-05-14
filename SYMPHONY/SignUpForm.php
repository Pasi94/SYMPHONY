<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/style.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>

        <title>Register</title>
    </head>
    <body> 
        <?php
        include_once('./userController.php');
        if (isset($_POST['signUp']) && !empty($_POST['username']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['contact'])) {
            $userName = $_POST['username'];
            $fName = $_POST['fname'];
            $lName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $contact = $_POST['contact'];

            $value = addNewRegisteredUser($userName, $fName, $lName, $email, $password, $contact);
            if ($value == 1) {
                header("Location: ./home.php");
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
                        <li><a href="contact.html">Contact</a>
                        </li>
                        <li><a href="vote.php">Vote</a>
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
                    <h2 class="text-center intro-text">Create new Account</h2>
                    <hr>
                    <form id="createform" role = "form" 
                          action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
        ?>" method = "post">   
                        <div class="form-group">
                            <label>User Name</label> 
                            <input class="form-control input-sm" id="username" type="text" name="username" placeholder="Enter User Name" maxlength="30"/>       
                            <span id="div1"></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label> 
                            <input class="form-control input-sm" id="fname" type="text" name="fname" placeholder="Enter First Name" maxlength="30"/>       
                            <span id="div2"></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label> 
                            <input class="form-control input-sm" id="lname" type="text" name="lname" placeholder="Enter Last Name" maxlength="30"/>       
                            <span id="div3"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label> 
                            <input class="form-control input-sm" id="email" type="email" name="email" placeholder="Enter email" maxlength="40"/>       
                            <span id="div4"></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label> 
                            <input class="form-control input-sm" type="password" id="password" name="password" placeholder="Enter Password" maxlength="30"/>       
                            <div id="div5"></div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label> 
                            <input class="form-control input-sm" type="password" id="cnfpassword" name="cnfpassword" placeholder="Re Type Password" maxlength="30"/>       
                            <div id="div6"></div>
                        </div>
                        <div class="form-group">
                            <label>Contact No</label> 
                            <input class="form-control input-sm" id="contact" type="tel" name="contact" placeholder="Enter Contact No" maxlength="12"/>       
                            <span id="div7"></span>
                        </div>
                        <div class="form-group">

                            <input type="checkbox" id="checkbox1">
                            I agree to the symphony <a href=""> Terms of Service </a>. 

                            <span  id="div8">                
                            </span>
                        </div> 
                        <div id="crdiv">
                            <input type="submit" class="btn btn-danger" style="float: right" id="createbtn"  name = "signUp" value="Create"/>    
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
    <script type="text/javascript" src="static/js/SignUpScripts.js"></script>
</html>
