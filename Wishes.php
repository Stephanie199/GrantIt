<?php
	require_once('php/connect.php');
	require_once('php/constants.php');
	session_start();
	
	$loginStatus = $NO_LOGIN;
	
	if(isset($_GET['loginFailed']) && $_GET['loginFailed'] === '1'){
		$loginStatus = $LOGIN_FAILED;
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
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>GrantIt! | Wishes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/zerogrid.css">
<link rel="stylesheet" href="css/responsive.css">
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_400.font.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_700.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
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

</head>

<body id="page4">

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
	}
?>
</script>

	<div class="body1">
	<div class="body2">
	<div class="body5">
		<div class="main zerogrid">
<!-- header -->
			<header>
				<div class="wrapper rơw">
				<h1><a href="index.php" id="logo"><img src="images/logo.png" /></a></h1>
				<nav>
					<ul id="menu">
						<li id="nav1"><a href="index.php">Home<span>Welcome!</span></a></li>
						<li id="nav4" class="active"><a href="Wishes.php">Wishes<span>Grant It!</span></a></li>
                        <li id="nav3"><a href="Exchange.php">Exchange<span>List</span></a></li>
						<li id="nav5"><a href="Contacts.php">Contacts<span>Our Address</span></a></li>
                        <li id="nav2"><a href="#">Profile<span>Me</span></a></li> <!-- After login -->
                        <li id="nav6"><a href="#">Login/Sign Up<span>Become a Member</span></a></li> <!-- Before login -->
					</ul>
				</nav>
				</div>
			</header>
<!-- header end-->
		</div>
	</div>
	</div>
	</div>
	<div class="body3">
		<div class="main zerogrid">
<!-- content -->
			<article id="content">
          	   <!-- Manage Wish Button -->
                 	<div class="manage_wish">
                         <a href="#" id="manage_wish_button" class="wish_button">Manage Wish List</a>
                    </div>
                    <div class="no-float"> </div>
               <!-- END of Manage Wish Button -->
               
               <!-- Manage Wish Button -->
                 	<div class="add_wish">
                         <a href="#" class="add_button" id='add_wish_button'>Add Wish List</a>
                    </div>
                    <div class="no-float"> </div>
               <!-- END of Manage Wish Button -->
               
               <!-- Manage Wish Menu -->
               <div class="CSSTableGenerator" >
               
                <table id='wish_table'>
                    <tr>
                        <td>
                            No.
                        </td>
                        <td >
                            Wish Title
                        </td>
                        <td>
                            Images
                        </td>
                        <td>
                            Description
                        </td>
                        <td>
                            Desired Price (SGD)
                        </td>
                        <td width="25%">
                            
                        </td>
                    </tr>
                    <tr>
                        <td >
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                        <td>
                            Row 1
                        </td>
                         <td>
                            Row 1
                        </td>
                         <td>
                            Row 1
                        </td>
                         <td>
                            <a href ="#" id="wish_table_icon_delete" class="table_icon_delete">Delete</a> 
                             <a href ="#" id="wish_table_icon_delete" class="table_icon_edit">Edit</a>
                        </td>
                    </tr>
                </table>
            </div>
               
               <!-- END of Manage Wish Menu -->
               
               <!-- Wish List Items -->
				<div class="wrapper">
					<section class="col-1-3">
					<div class="wrap-col">
                     	
						<div class="wrapper pad_bot2">
                            
							<h3><span class="dropcap">1</span>Wish Title 1</h3>
							<figure><img src="images/page4_img1.jpg" alt=""></figure>
							<p class="pad_bot1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
							<a href="#" class="link1">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">4</span>Product name</h3>
							<figure><img src="images/page4_img2.jpg" alt=""></figure>
							<p class="pad_bot1">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese- runt mollit anim id est laborum.</p>
							<a href="#" class="link1">Read More</a>
						</div>
					</div>
					</section>
					<section class="col-1-3">
					<div class="wrap-col">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">2</span>Product name</h3>
							<figure><img src="images/page4_img3.jpg" alt=""></figure>
							<p class="pad_bot1">Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exea.</p>
							<a href="#" class="link1">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">5</span>Product name</h3>
							<figure><img src="images/page4_img4.jpg" alt=""></figure>
							<p class="pad_bot1">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
							<a href="#" class="link1">Read More</a>
						</div>
					</div>
					</section>
					<section class="col-1-3">
					<div class="wrap-col">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">3</span>Product name</h3>
							<figure><img src="images/page4_img5.jpg" alt=""></figure>
							<p class="pad_bot1">Commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
							<a href="#" class="link1">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">6</span>Product name</h3>
							<figure><img src="images/page4_img6.jpg" alt=""></figure>
							<p class="pad_bot1">Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
							<a href="#" class="link1">Read More</a>
						</div>
					</div>
					</section>
				</div>
				<!--END OF Wrapper -->
                
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
<script>
	$(document).ready(function() {
		tabs.init();
	})
</script>

<!-- sign up form -->

<div id="sign_up_field">
	<form id="SignUpForm" method="post">
        <h2 class="sign_up">Sign Up!</h2>
		<div>
			<div  class="wrapper">
				<span>Full Name:</span>
				<input id="sign_up_full_name" type="text" class="input" >
			</div>
			<div  class="wrapper">
				<span>Email:</span>
				<input id="sign_up_email" type="text" class="input" >
				</div>
			<div  class="wrapper">
				<span>Password:</span>
				<input id="sign_up_password" type="text" class="input" >
				</div>
			<div  class="wrapper">
				<span>Confirm Password:</span>
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
				<span>Email:</span>
				<input id="login_email" type="text" class="input" >
				</div>
			<div class="wrapper">
				<span>Password:</span>
				<input id="login_password" type="text" class="input" >
			</div>
               <a href="#" id='login_submit_button'>Login</a>
               <a href="#" id='login_close_button'>Close</a>
               <br><a href="#" id='sign_up_simple_link'>Not a member? Sign Up!</a>
            <div class="no-float"> </div>
		</div>
	</form>
</div>

<!--
<script src='script/constants.js'></script>
<script src='script/connect.js'></script>
-->
<script src='script/main.js'></script>

<!-- Exchange Item description field / Read more form -->

<div id="wish_description_field">
	<form id="WishDescriptionForm" method="post">
        <h2 class="wish_title">Wish List Title</h2>
		<div>
        	<div class="wrapper">
				<div><center><img src="images/page2_img3.jpg" /></center></div><br>
			</div>
       	 	<div class="wrapper">
				<span><b>Description: </b></span>
				<div class="long_text">adfkajsdfkljadlkfjsadfjajflsajflksajfkjaklfjasjfksadjfajdfkjskfjakdfjklsajflkajfljdkfjkajdfkajfkjaklfdjakdfjkafjklajfklajkljsakfjadklfjksdjfkjdfkljadfkljadklfjadfkajsdfkljadlkfjsadfjajflsajflksajfkjaklfjasjfksadjfajdfkjskfjakdfjklsajflkajfljdkfjkajdfkajfkjaklfdjakdfjkafjklajfklajkljsakfjadklfjksdjfkjdfkljadfkljadklfj adfkajsdfkljadlkfjsadfjajflsajflksajfkjaklfjasjfksadjfajdfkjskfjakdfjklsajflkajfljdkfjkajdfkajfkjaklfdjakdfjkafjklajfklajkljsakfjadklfjksdjfkjdfkljadfkljadklfj  </div><br>
			</div>
			<div  class="wrapper">
				<span><b>Desired Price: </b></span>
				<span>SGD $100 </span>
			</div>
               <a href="#" class="close_button">Close</a>
               <a href="#" class="grantit_button">GrantIt!</a>
           <div class="no-float"> </div>
		</div>
	</form>
</div>

<!-- add wish form -->

<div id="add_wish_field">
	<form id="AddWishForm" method="post">
		<h2 class="add_wish">Add Wishes!</h2>
		<div>
			<div  class="wrapper">
				<span>Wish Title:</span>
				<input id="add_wish_title" type="text" class="input" >
			</div>
			<div class="wrapper">
				<span>Image Link:</span>
				<input id="add_wish_image_link" type="text" class="input" >
			</div>
			<div  class="wrapper">
				<span>Desired Price:</span>
				<input id="add_wish_price" type="text" class="input" >
			</div>
			<div  class="wrapper">
				<span>Description:</span><br>
				<textarea id="add_wish_description"> </textarea>
			</div>
			<a href="#" id='add_wish_submit_button'>Sign Up!</a>
			<a href="#" id='add_wish_close_button'>Close</a>
			<div class="no-float"> </div>   
		</div>
	</form>
</div>

<script src='script/main.js'></script>
<script src='script/wishes.js'></script>
</body>
</html>