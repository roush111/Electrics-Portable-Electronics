<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Electricks</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    
    <link href="../assets/style.css" rel="stylesheet"/>
    <!--     inserted     -->

</head>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="user_index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Serve(8) Web Solutions, Inc." data-placement="bottom" target="">
                    Electrics - Portable Electronics
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo ''.$row['firstname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_products.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons files_box"></i>
                            <p>Transactions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter">
            <div class="page-header-image" data-parallax="true" style="background-image: url('data:image/jpeg;base64,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');">
            
                <div class="container">
                    <div class="content-center brand">
                        <img src="../assets/img/ecom3.png" width="300px" alt="Circle Image" class="rounded-circle">
                        <br><br>
                        <h3>Smartphones, Laptops and Headphones</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                    <br>
                    <div class="col-md-12">
                        <h2 class="title">Portable Electronics</h2>
                        <div class="typography-line">
                            <p>
                            “In today’s modern world, people are either asleep or connected.”
                            </p>
                        </div>
                        <br>

                        
                        <center>
                        <label><b>Search Product: &nbsp</b></label>       
                                <form method="POST" action="user_index_search.php" >
                                    <input type="image" title="Search" src="../assets/img/search.png" alt="Search" />
                                    <input type="text" name="search" class="search-query" placeholder="Enter product name">
                                </form>
                        </center>
                    </div>
                    <br><hr color="orange">

                    <div class="tab-pane  active" id="">
                        <ul class="thumbnails">
                            <?php
                            if (isset($_POST['search'])){
                                                            
                            $search=$_POST['search'];
                                                                
                            $query="SELECT * FROM products WHERE category LIKE '%$search%' OR prod_name LIKE '%$search%' OR prod_desc LIKE '%$search%'";
                            $result = mysqli_query($dbconn,$query);
                            while($res=mysqli_fetch_array($result)){
                                $prod_id=$res['prod_id'];
                            ?> 

                            <div class="row-sm-3">
                                <div class="thumbnail">
                                    <?php if($res['prod_pic1'] != ""): ?>
                                    <img src="../uploads/<?php echo $res['prod_pic1']; ?>" width="300px" height="200px">
                                    <?php else: ?>
                                    <img src="../uploads/default.png" width="300px" height="200px">
                                    <?php endif; ?>
                                <div class="caption">
                                  <h5><b><?php echo $res['prod_name'];?></b></h5>
                                  <h6><a class="btn btn-success btn-round" title="Click for more details!" href="user_product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">Php<?php echo $res['prod_price']; ?></medium></h6>
                                </div>

                                </div>
                              <hr color="orange">
                              </div>
                                     
                                <?php }?> 
                            <?php }?> 

                        </ul>
                    </div>




        </div>
    </div>     
</div>
        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="" target="_blank">
                               Hello
                            </a>
                        </li>
                        <li>
                            THERE
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Roushan Prasad
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>



   <!---  inserted  -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/google-code-prettify/prettify.js"></script>
    <script src="../assets/js/application.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    <script src="../assets/js/bootstrap-affix.js"></script>
    <script src="../assets/js/jquery.lightbox-0.5.js"></script>
    <script src="../assets/js/bootsshoptgl.js"></script>
     <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>

    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
     <!--  inserted  -->

</html>