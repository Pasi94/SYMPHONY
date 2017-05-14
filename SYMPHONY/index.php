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
        <link type="text/css" rel="stylesheet" href="static/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="static/css/MainStyles.css"/>
        <title>Symphony</title>

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
        include_once ('./categoryController.php');
        ;
        $head = "Latest <strong>Albums</strong>";
        $rows = getRawCount()[0];
        if ((isset($_GET['catID']) && !empty($_GET['catID']))) {
            $catName = getCategoryName($_GET['catID']);
            $head = "Latest Albums For <strong>"
                    . $catName[0] . "</strong>";
            $rows = getRawCountByCategory($_GET['catID'])[0];
        } elseif ((isset($_GET['search']) && !empty($_GET['search']))) {
            $head = "Search Result For <strong>"
                    . $_GET['search'] . "</strong>";
            $rows = getRawCountForSearch($_GET['search'])[0];
        }
        $page_rows = 9;

        $last = ceil($rows / $page_rows);
        if ($last < 1) {
            $last = 1;
        }
        $pagenum = 1;
        if (isset($_GET['pn'])) {
            $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
        }
        if ($pagenum < 1) {
            $pagenum = 1;
        } else if ($pagenum > $last) {
            $pagenum = $last;
        }
        $itemLimit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;

        $query = getAllAlbums($itemLimit);
        if ((isset($_GET['catID']) && !empty($_GET['catID']))) {
            $query = getAllAlbumsByCategory($itemLimit, $_GET['catID']);
        } elseif ((isset($_GET['search']) && !empty($_GET['search']))) {
            $query = getAllAlbumsForSearch($itemLimit, $_GET['search']);
        }
        $paginationCtrls = '';
        if ($last != 1) {
            if ($pagenum > 1) {
                $previous = $pagenum - 1;
                $paginationCtrls .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $previous . '">Previous</a></li>';
                for ($i = $pagenum - 4; $i < $pagenum; $i++) {
                    if ($i > 0) {
                        $paginationCtrls .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '">' . $i . '</a> </li>';
                    }
                }
            }
            $paginationCtrls .= '<li class="active"><a href="#">' . $pagenum . ' </a></li>';
            for ($i = $pagenum + 1; $i <= $last; $i++) {
                $paginationCtrls .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $i . '">' . $i . '</a></li>';
                if ($i >= $pagenum + 4) {
                    break;
                }
            }
            if ($pagenum != $last) {
                $next = $pagenum + 1;
                $paginationCtrls .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?pn=' . $next . '">Next</a> </li>';
            }
        }
        $list = '';
        $i = 0;
        foreach ($query as $row) {
            $albumID = $row["albumID"];
            $name = $row["name"];
            $price = $row["price"];
            $url = $row["url"];
            $artist = $row["artistName"];
            $view = "<div class='col-sm-4 text-center'><a href='albumView.php?albumID=" . $albumID . "'> <img class='img-responsive' src=" . $url . " alt=''><h3 class='Artist-name'>" . $artist . "<br>  <small>" . $name . "</small><br><small>US $" . $price . "</small>
             </h3></a></div>";
            if ($i % 3 == 0) {
                $list .=$view . "<BR>";
            } else {
                $list .=$view;
            }

            $i++;
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

        <div class="container">
            <?php
            require('./orderController.php');
            $result = getMostDownloads();
            $albumID = '';
            $style = '';
            $name = '';
            $price = '';
            $url = '';
            $artist = '';
            $publishDate = '';
            $arr = array();
            $i = 0;
            if (!empty($result)) {
                foreach ($result as $row) {
                    $albumID = $row["Album_albumID"];
                    $album = getAlbumDetails($albumID);
                    if (!empty($album[0])) {
                        $arr[i] = $album;
                        $i++;
                    }
                }
            } else {
                $style = 'style="display: none;"';
            }
            ?>
            <div class="row"  <?php echo $style; ?>>
                <div class="box">
                    <div class="col-lg-12 text-center">
                        <div id="carousel-example-generic" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators hidden-xs">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" id="slideDiv">
                                <div class="item active">
                                    <div class="col-lg-6">
                                        <img class='img-responsive' src="<?php echo $arr[0]["url"]; ?>" alt=''>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4><?php echo $arr[0]["artistName"]; ?> </h4><br>
                                        <h3> <?php echo $arr[0]["name"]; ?></h3><br>
                                        <h5><?php echo $arr[0]["price"]; ?></h5>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-lg-6">
                                        <img class='img-responsive' src="<?php echo $arr[1]["url"]; ?>" alt=''>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4><?php echo $arr[1]["artistName"]; ?> </h4><br>
                                        <h3> <?php echo $arr[1]["name"]; ?></h3><br>
                                        <h5><?php echo $arr[1]["price"]; ?></h5>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-lg-6">
                                        <img class='img-responsive' src="<?php echo $arr[2]["url"]; ?>" alt=''>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4><?php echo $arr[2]["artistName"]; ?> </h4><br>
                                        <h3> <?php echo $arr[2]["name"]; ?></h3><br>
                                        <h5><?php echo $arr[2]["price"]; ?></h5>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-lg-6">
                                        <img class='img-responsive' src="<?php echo $arr[3]["url"]; ?>" alt=''>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4><?php echo $arr[3]["artistName"]; ?> </h4><br>
                                        <h3> <?php echo $arr[3]["name"]; ?></h3><br>
                                        <h5><?php echo $arr[3]["price"]; ?></h5>

                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-lg-6">
                                        <img class='img-responsive' src="<?php echo $arr[4]["url"]; ?>" alt=''>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4><?php echo $arr[4]["artistName"]; ?> </h4><br>
                                        <h3> <?php echo $arr[4]["name"]; ?></h3><br>
                                        <h5><?php echo $arr[4]["price"]; ?></h5>

                                    </div>                           
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="icon-prev"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="icon-next"></span>
                            </a>
                        </div>
                        <h1>
                            <span class="brand-name">&#9835 Popular Downloads &#9835 </span>
                        </h1>
                        <hr class="tagline-divider">

                    </div>
                </div>
            </div>

            <div class="row">
                <!-- <div class="box">-->
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text01 text-center"><?php echo $head; ?>
                    </h2>
                    <hr>
                </div>

                <div>
                    <p><?php echo $list; ?></p>

                </div>



                <div class="clearfix"></div>
            </div>

            <div id="pagination_controls" class="center">
                <ul class="pagination pagination-sm"><?php echo $paginationCtrls; ?>
                </ul></div>
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

        <!-- JavaScript -->
        <script type="text/javascript" src="static/js/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        <script>
            // Activates the Carousel
            $('.carousel').carousel({
                interval: 5000
            })
        </script>

    </body>

</html>

