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
    <title>E-commerce</title>
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
                        <a href="admin_index.php" class="nav-link" onclick="scrollToDownload()">
                            <i class="now-ui-icons education_paper"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_products.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Cart</p>
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
        <div class="page-header">
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
                        <h2 class="title">Products</h2>
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
                        $query = "SELECT * FROM products ORDER BY prod_name ASC";
                        $result = mysqli_query($dbconn,$query);
                        while($res = mysqli_fetch_array($result)) {  
                            $prod_id=$res['prod_id'];
                        
                    ?>   
                        <div class="row-sm-3">
                            <div class="thumbnail">
                                <?php if($res['prod_pic1'] != ""): ?>
                                <img src="../uploads/<?php echo $res['prod_pic1']; ?>" width="200px">
                                <?php else: ?>
                                <img src="../uploads/default.png" width="200px">
                                <?php endif; ?>
                            <div class="caption">
                              <h5><b><?php echo $res['prod_name'];?></b></h5>
                              <h6><a class="btn btn-success btn-round" title="Click for more details!" href="user_product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">Rupees <?php echo $res['prod_price']; ?></medium></h6>
                            </div>

                            </div>
                          <hr color="orange">
                          </div>
                                 
                    <?php }?> 

                          </ul>
                      </div>


        </div>
    </div>     
</div>
        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                   
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