<?php
	require_once('php/connect.php');
	require_once('php/constants.php');
	if(!isset($_SESSION)){
		session_start();
	}
	
	$loginStatus = $NO_LOGIN;
	
	if(isset($_GET['loginFailed']) && $_GET['loginFailed'] === '1'){
		$loginStatus = $LOGIN_FAILED;
		unset($_SESSION['full_name']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['notify']);
	} else if(isset($_SESSION['email']) && isset($_SESSION['password'])){
		$result = mysqli_query($SQL, "select * from users where email='$_SESSION[email]' and password='$_SESSION[password]';");
		if($result -> num_rows === 1){
			$entry = $result -> fetch_assoc();
			if($_SESSION['email'] === $entry['email'] && $_SESSION['password'] === $entry['password']){
				$loginStatus = $LOGIN_SUCCESS;
			} else{
				$loginStatus = $LOGIN_FAIL;
				unset($_SESSION['full_name']);
				unset($_SESSION['email']);
				unset($_SESSION['password']);
				unset($_SESSION['notify']);
			}
		}
	} else if(isset($_GET['logout']) && $_GET['logout'] === '1'){
		$loginStatus = $LOGOUT;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GrantIt!</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/zerogrid.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/responsiveslides.css" />
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_400.font.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_700.font.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/tms-0.3.js"></script>
<script type="text/javascript" src="js/tms_presets.js"></script>
<script type="text/javascript" src="js/jcarousellite.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="js/css3-mediaqueries.js"></script>
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.bg{ behavior: url(js/PIE.htc); }
	</style>
  <![endif]-->
	<!--[if lt IE 7]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
		</div>
	<![endif]-->
	
	<script src="js/responsiveslides.js"></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			maxwidth: 960,
			namespace: "centered-btns"
		  });
		});
	</script>
</head>

<body id="page1">

<script src="script/msg_box.js"></script>
<script src="script/global_vars.js"></script>
<script type='text/javascript'>
// SCRIPTS ADDED BY PHP
<?php
	if($loginStatus === $LOGIN_FAILED){
		echo "isLogin = false;";
		echo "createAlert('Login attempt failed!');";
	} else if($loginStatus === $LOGIN_SUCCESS){
		echo "isLogin = true;";
		echo "fullName = '$_SESSION[full_name]';";
		
		if(isset($_SESSION['notify']) && $_SESSION['notify'] === 1){
			$_SESSION['notify'] = 0;
			echo "createNotif('Login success!');";
		}
	} else if($loginStatus === $LOGOUT){
		echo "isLogin = false;";
		echo "createNotif('You have successfully logout.');";
	}
?>
</script>

<div class="body1">
	<div class="body2">
		<div class="main zerogrid">
<!-- header -->
			<header>
				<div class="wrapper row">
				<h1><a href="index.php" id="logo"><img src="images/logo.png" /></a></h1>
				<nav>
					<ul id="menu">
						<li id="nav1" class="active"><a href="index.php">Home<span>Welcome!</span></a></li>
						<li id="nav4"><a href="Wishes.php">Wishes<span>Grant It!</span></a></li>
                        <li id="nav3"><a href="Exchange.php">Exchange<span>List</span></a></li>
						<li id="nav5"><a href="Contacts.php">Contacts<span>Our Address</span></a></li>
                        <li id="nav2"><a href="#">Profile<span>Me</span></a></li> <!-- After login -->
                        <li id="nav6"><a href="#">Login/Sign Up<span>Become a Member</span></a></li> <!-- Before login -->
					</ul>
				</nav>
				</div>

				<div class="wrapper row">
					<div class="slider">
					  	<div class="rslides_container">
							<ul class="rslides" id="slider">
								<li><img src="images/img1.png" alt=""></li>
								<li><img src="images/img2.png" alt=""></li>
								<li><img src="images/img3.png" alt=""></li>
							</ul>
						</div>
					</div>
				</div>
			</header>
<!-- header end-->
		</div>
	</div>
</div>
	<div class="body3">
		<div class="main zerogrid">
<!-- content -->
			<article id="content">
				<div class="wrapper row">
					<section class="col-1-4">
						<div class="wrap-col">
							<h3><span class="dropcap">A</span>Become<span>a Member</span></h3>
							<p class="pad_bot1">Be a Granter or Wisher of <b>GrantIt</b>! Enjoy the unique online shopping experience within your community. </p>
						</div>
					</section>
                    <section class="col-1-4">
						<div class="wrap-col">
							<h3><span class="dropcap">B</span>Update your<span>Profile</span></h3>
							<p class="pad_bot1">Manage your account and connect with people around you.</p>
						</div>
					</section>
					<section class="col-1-4">
						<div class="wrap-col">
							<h3><span class="dropcap">C</span>Post your<span>Wishes</span></h3>
							<p class="pad_bot1">Having difficulties finding your desired items? List <b>three</b> desired things you wish to buy and let granters help you to find it.</p>
						</div>
					</section>
					<section class="col-1-4">
						<div class="wrap-col">
							<h3><span class="dropcap">D</span>List things<span>for Exhange</span></h3>
							<p class="pad_bot1">Save Environment! List your things for exchange (up to 10 things). These things can be used for payment options</p>
						</div>
					</section>
					
				</div>
				<div class="wrapper row">
					<section class="col-3-4">
						<div class="wrap-col">
							<h2 class="under">Welcome, dear Wishers and Granters!</h2>
							<div class="wrapper">
								<figure class="left marg_right1"><img src="images/logo2.png" alt=""></figure>
								<p class="pad_bot1">GrantIt! provides a reverse online auction platform for people to get their desired item within their budget.</p>
								<p class="pad_bot1">Instead of e-shoppers having to browse through the items they want to purchase; you can simply post their desired items in the form of wish list and determine their budget for each items. The granters will browse through the site and fulfil the buyers’ wish at the agreeable price. </p>
                                <p class="pad_bot1">Besides creating their wish list and sharing it with others, it also serves as a platform
where people can exchange the desired items with their own items (either first-hand or second-hand items).</p>
							</div>
						</div>
					</section>
					<section class="col-1-4">
						<div class="wrap-col">
							<h2>Testimonials</h2>
							<div class="testimonials">
							<div id="testimonials">
							  <ul>
								<li>
									<div>
										“Best experience for shopping.”
									</div>
									<span><strong class="color1">Andy Lau,</strong> <br>
									Granter</span>
								</li>
								<li>
									<div>
										“Please make my wish come true! Save my wallet!.”
									</div>
									<span><strong class="color1">James Cook,</strong> <br>
									Wisher</span>
								</li>
								<li>
									<div>
										“I love green. Allows me to exchange stuff.”
									</div>
									<span><strong class="color1">Barnie Armstrong,</strong> <br>
									Wisher</span>
								</li>
							  </ul>
							</div>
							<a href="#" class="up"></a>
							<a href="#" class="down"></a>
							</div>
						</div>
					</section>
				</div>
			</article>
		</div>
	</div>
	<div class="body4">
		<div class="main zerogrid">
			<article id="content2">
				<div class="wrapper row">
					<section class="col-1-4">
					<div class="wrap-col">
						<h4>Why Us?</h4>
						<ul class="list1">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Exchange List</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
					</section>
					<section class="col-1-4">
					<div class="wrap-col">
						<h4>Address</h4>
						<ul class="address">
							<li><span>Country:</span>Singapore</li>
							<li><span>Phone:</span>(+65) 8888 8888</li>
							<li><span>Email:</span><a href="mailto:grantit@gmail.com">grantit@gmail.com</a></li>
						</ul>
					</div>
					</section>
					<section class="col-1-4">
					<div class="wrap-col">
						<h4>Follow Us</h4>
						<ul id="icons">
							<li><a href="#"><img src="images/icon1.jpg" alt="">Facebook</a></li>
							<li><a href="#"><img src="images/icon2.jpg" alt="">Twitter</a></li>
							
						</ul>
					</div>
					</section>
					<section class="col-1-4">
					<div class="wrap-col">
						<h4>Newsletter</h4>
						<form id="newsletter" method="post">
							<div>
								<div class="wrapper">
									<input class="input" type="text" value="Type Your Email Here"  onblur="if(this.value=='') this.value='Type Your Email Here'" onfocus="if(this.value =='Type Your Email Here' ) this.value=''" >
								</div>
								<a href="#" class="button" onclick="document.getElementById('newsletter').submit()">Subscribe</a>
							</div>
						</form>
					</div>
					</section>
				</div>
			</article>
<!-- content end -->
		</div>
	</div>
		<div class="main zerogrid">
<!-- footer -->
			<footer>
            	Created by: Stephanie and Peter <br>
				Credits to: <a href="http://www.templatemonster.com" target="_blank"> Templatemonster</a> and <a href="http://www.zerotheme.com" target="_blank">Zerotheme</a><br>
                
			</footer>
<!-- footer end -->
		</div>
<script type="text/javascript"> Cufon.now(); </script>


<!-- sign up form -->

<div id="sign_up_field">
	<form id="SignUpForm" method="post">
        <h2 class="sign_up">Sign Up!</h2>
		<div>
			<div  class="wrapper">
				<span>Full Name:</span><br>
				<input id="sign_up_full_name" type="text" class="input" >
			</div>
			<div  class="wrapper">
				<span>Email:</span><br>
				<input id="sign_up_email" type="text" class="input" >
				</div>
			<div  class="wrapper">
				<span>Password:</span><br>
				<input id="sign_up_password" type="text" class="input" >
				</div>
			<div  class="wrapper">
				<span>Confirm Password:</span><br>
				<input id="sign_up_confirm_password" type="text" class="input" >
			</div>
			<a href="#" id='sign_up_submit_button'>Sign Up!</a>
			<a href="#" id='sign_up_close_button'>Close</a><br>
            <a href="#" id='login_simple_link'>Already a member? Sign In!</a>
            <div class="no-float"> </div>
                
		</div>
	</form>
</div>

<!-- login form -->

<div id="login_field">
	<form id="LoginForm" method="post">
        <h2 class="login">Login!</h2>
		<div>
			<div  class="wrapper">
				<span>Email:</span> <br>
				<input id="login_email" type="text" class="input" >
				</div>
			<div class="wrapper">
				<span>Password:</span> <br>
				<input id="login_password" type="text" class="input" >
			</div>
               <a href="#" id='login_submit_button'>Login</a>
               <a href="#" id='login_close_button'>Close</a>
               <br><a href="#" id='sign_up_simple_link'>Not a member? Sign Up!</a>
            <div class="no-float"> </div>
		</div>
	</form>
</div>

<script src='script/main.js'></script>
</body>
</html>