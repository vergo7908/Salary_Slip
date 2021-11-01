<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
if(!isset($_SESSION['user_name'])){
header("LOCATION:../index.php");
exit();
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Multimind Creations | Salary Slip</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
            .dz-default{
                display:none;
            }
        </style>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.php"><img class="main-logo" src="../images/icons/logo.png" style="height:40px;width:160px;margin-top:5px;" alt="" /></a>
            </div><hr>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.php">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Salary Slip</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Create" href="salary_slip.php"><span class="mini-sub-pro">Create Salary Slip</span></a></li>
                            </ul>
                        </li>
                        
                    </ul>
                   
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="../images/icons/logo.png" style="height:40px;width:160px;" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <!-- Mobile Menu end -->

        </div>
   
        <div class="courses-area mg-b-15 mg-t-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div style="width:100%">
                            <div style='float:left;width:50%'><h3 class="box-title">Welcome to Multimind Creations</h3></div>
                            <div style='float:left;width:50%;text-align:right;'><a class="btn btn-primary" href='logout.php'>Logout</a></div>
                            </div>                                                  
                        </div>
                    </div>
                </div>
            </div>
        </div> 
      
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Create Salary Slip</a></li>
                               
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="generate_salary_slip.php" method="post"  target="_blank" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">


                                                        
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <h4 style="color:#006DF0;">PAYSLIP FOR THE MONTH OF(MM/YY)</h4>
                                                  
                                                                <div class="form-group" style="width:32%;">
                                                                    <label for="month_year" >Month and Year :</label>
                                                                    <input id="month_year" name="month_year" type="month" class="form-control" placeholder="Month and Year">
                                                                </div>
                                                                
                                                               
                                                            </div><!--###########-->
                                                         


                                                    
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                            <h4 style="color:#006DF0;">Basic Details</h4>
                                                            <hr>
                                                                <div class="form-group">
                                                                    <label for="name" >Name :</label>
                                                                    <input id="name" name="name" type="text" class="form-control" placeholder="Name">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="empId" >Employee ID :</label>
                                                                    <input type="text" id="empId" name="empId" class="form-control" placeholder="Employee ID" >
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="joinDate" >Joining Date :</label>
                                                                    <input type="date" id="joinDate" name="joinDate" class="form-control" placeholder="Joining Date" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="bankName" >Bank Name :</label>
                                                                    <input type="text" id="bankName" name="bankName" class="form-control" placeholder="Bank Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="accountNo " >Account No :</label>
                                                                    <input type="text" id="accountNo" name="accountNo" class="form-control" placeholder="Account No">
                                                                </div>
                                                               
                                                            </div><!--###########--><br>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><br>
                                                            <hr>
                                                                <div class="form-group">
                                                                    <label for="ifsc " >IFSC :</label>
                                                                    <input type="text" id="ifsc" name="ifsc" class="form-control" placeholder="IFSC">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="leftDate" >Left Date :</label>
                                                                    <input type="date" id="leftDate" name="leftDate" class="form-control" placeholder="Left Date">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="panNo" >PAN No :</label>
                                                                    <input type="text" id="panNo" name="panNo" class="form-control" placeholder="PAN No" >
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="department" >Department :</label>
                                                                    <input type="text" id="department" name="department" class="form-control" placeholder="Department" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="designation" >Designation :</label>
                                                                    <input type="text" id="designation" name="designation" class="form-control" placeholder="Designation">
                                                                </div>                                                                                                                           
                                                            </div><!--###########-->
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><br>
                                                            <hr>
                                                                <div class="form-group">
                                                                    <label for="arrearDays" >Arrear Days :</label>
                                                                    <input id="arrearDays" name="arrearDays" type="text" class="form-control" placeholder="Arrear Days">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="location" >Location :</label>
                                                                    <input type="text" id="location" name="location" class="form-control" placeholder="Location" >
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="loanBalance" >Loan Balance :</label>
                                                                    <input type="text" id="loanBalance" name="loanBalance" class="form-control" placeholder="Loan Balance" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="daysPaid" >Days Paid :</label>
                                                                    <input type="text" id="daysPaid" name="daysPaid" class="form-control" placeholder="Days Paid">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="daysLWP " >Days LWP :</label>
                                                                    <input type="text" id="daysLWP" name="daysLWP" class="form-control" placeholder="Days LWP">
                                                                </div>
                                                            </div>
                                                        </div><!--###########################-->
                                                        <hr>
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <h4 style="color:#006DF0;">Salary Rates(Rs)</h4>
                                                                <div class="form-group">
                                                                    <label for="basic" >Basic :</label>
                                                                    <input type="number" id="basic" name="basic" class="form-control" placeholder="Basic">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="hra" >HRA :</label>
                                                                    <input type="number" id="hra" name="hra" class="form-control" placeholder="HRA" >
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="other" >Other :</label>
                                                                    <input type="number" id="other" name="other" class="form-control" placeholder="Other" >
                                                                </div>                                                                                                                           
                                                            </div><!--###########################-->
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <h4 style="color:#006DF0;">Earning Current Month(Rs)</h4>
                                                                <div class="form-group">
                                                                    <label for="basicSalary" >Basic Salary :</label>
                                                                    <input type="number" id="basicSalary" name="basicSalary" class="form-control" placeholder="Basic Salary">
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="ecm_hra" >HRA :</label>
                                                                    <input type="number" id="ecm_hra" name="ecm_hra" class="form-control" placeholder="HRA" >
                                                                </div>                                                               
                                                                <div class="form-group">
                                                                <label for="ecm_other" >Other :</label>
                                                                    <input type="number" id="ecm_other" name="ecm_other" class="form-control" placeholder="Other" >
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="incentive" >Incentive :</label>
                                                                    <input type="number" id="incentive" name="incentive" class="form-control" placeholder="Incentive" >
                                                                </div>
                                                            </div>
                                                            <!--###########################-->
                                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <h4 style="color:#006DF0;">Deduction(Rs)</h4>
                                                                <div class="form-group">
                                                                    <label for="pf" >PF :</label>
                                                                    <input type="number" id="pf" name="pf" class="form-control" placeholder="PF">
                                                                </div>   
                                                                <div class="form-group">
                                                                    <label for="esi" >ESI :</label>
                                                                    <input type="number" id="esi" name="esi" class="form-control" placeholder="ESI">
                                                                </div>   
                                                                <div class="form-group">
                                                                    <label for="tds" >TDS :</label>
                                                                    <input type="number" id="tds" name="tds" class="form-control" placeholder="TDS">
                                                                </div>                                                        
                                                        </div>
                                                       
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                <hr>
                                                                
                                                                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                        <p>Copyright © 2020. All rights reserved by <a href="http://multimindcreations.com">Multimind Creations</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
</body>

</html>