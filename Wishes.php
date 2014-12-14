<?php
	require_once('php/connect.php');
	require_once('php/constants.php');
	require_once('php/user.php');
	if(!isset($_SESSION)){
		session_start();
	}
	
	$loginStatus = $NO_LOGIN;
	
	if(isset($_SESSION['email']) && isset($_SESSION['password'])){
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
               <div class="CSSTableGenerator">
               
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
				<?php
					if($loginStatus === $LOGIN_SUCCESS){
						$wishes = genWish();
						$i = 1;
						while($row = $wishes -> fetch_assoc()){
							echo "<tr>";
							echo "<td>$i</td>";
							++$i;
							echo "<td>$row[title]</td>";
							echo "<td><img src='$row[image_url]' alt='$row[title]' title='$row[title]' width='100px' height='100px' /></td>";
							echo "<td>$row[desc]</td>";
							echo "<td>S&#36;$row[price]</td>";
							echo 
								"<td>
									<a onclick='return confirm(\"Confirm delete?\");' href ='php/del_wish.php?wid=$row[wid]' class='table_icon_delete'>Delete</a> 
									<a href ='#' class='table_icon_edit'>Edit</a>
								</td>";
							echo "</tr>";
						}
					}
				?>
				<!--
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
				-->
			 </table>
            </div>
               
               <!-- END of Manage Wish Menu -->
               
               <!-- Wish List Items -->
				<div class="wrapper">
					<section class="col-1-3">
					<div class="wrap-col">
                     	
						<div class="wrapper pad_bot2">
                            
							<h3><span class="dropcap">1</span>Beats Headphones</h3>
							<figure><img src="images/dummy_images/img6_beats_headphones.jpg" alt=""></figure>
							<p class="pad_bot1">Posted by <b><a href="#"> Jay-Z</a></b><br> Date posted 07/12/2014</p>
							<a href="#" class="link1">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">4</span>OneOfAKind Hoodie</h3>
							<figure><img src="images/dummy_images/img9_one_of_a_kind_hoodie.jpg" alt=""></figure>
							<p class="pad_bot1">Posted by <b><a href="#"> G-Dragon</a></b><br> Date posted 11/11/2014</p>
							<a href="#" class="link1">Read More</a>
						</div>
					</div>
					</section>
					<section class="col-1-3">
					<div class="wrap-col">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">2</span>Java Textbook</h3>
							<figure><img src="images/dummy_images/img11_java_textbook.jpg" alt=""></figure>
							<p class="pad_bot1">Posted by <b><a href="#"> Mark Zuckerberg</a></b><br> Date posted 03/12/2014</p>
							<a href="#" class="link1">Read More</a>
						</div>
						<div class="wrapper">
							<h3><span class="dropcap">5</span>Twilight Series</h3>
							<figure><img src="images/dummy_images/img2_twilight_books.jpg" alt=""></figure>
							<p class="pad_bot1">Posted by <b><a href="#"> Edward Cullen</a></b><br> Date posted 01/11/2014</p>
							<a href="#" class="link1">Read More</a>
						</div>
					</div>
					</section>
					<section class="col-1-3">
					<div class="wrap-col">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">3</span>Mini Penguin Speaker</h3>
							<figure><img src="images/dummy_images/img5_mini_penguin_speaker.jpg" alt=""></figure>
							<p class="pad_bot1">Posted by <b><a href="#"> Minion</a></b><br> Date posted 02/12/2014</p>
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

<!-- Wish Item description field / Read more form -->

<div id="wish_description_field">
	<form id="WishDescriptionForm" method="post">
        <h2 class="wish_title">Beats Headphone</h2>
		<div>
			<div class="wrapper">
				<div><center><img src="images/dummy_images/img6_beats_headphones.jpg" /></center></div><br>
			</div>
			<div class="wrapper">
				<span><b>Posted By: </b></span>
				<span><b><a href="#">Jay-Z</a></b></span><br>
			</div>
			<div class="wrapper">
				<span><b>Date Posted: </b></span>
				<span>07/12/2014</span><br>
			</div>
			<div class="wrapper">
				<span><b>Description: </b></span>
				<div class="long_text"><br>Clearer sound. Deeper bass. Beats Solo HD headphones are the only Beats by Dr. Dre that come with not one, but two speakers inside each can. That means you get crystal clear highs and deep, rumbling lows in high definition Every pair is now constructed of super-durable, flexible material, reinforced with a metal strip to make sure it never comes apart Built-In mic for calls. Switch easily between songs and incoming calls. No need to take off your headphones or talk into the phone like a walkie-talkie Remote control. Take calls, skip songs and adjust volume right from the cord of your Beats Solo HD headphones. No more searching for your phone or music player just to find the right song</div><br>
			</div>
			<div  class="wrapper">
				<span><b>Desired Price: </b></span>
				<span>SGD $50 </span>
			</div>
			<div  class="wrapper">
				<span><b>Other Wishes posted by <a href="#">Jay-Z</a>: </b></span>
				<img src="images/dummy_images/img5_mini_penguin_speaker.jpg" width="100px" height="100px">
			</div>
			<div  class="wrapper">
				<span><b>Items for Exchange posted by <a href="#">Jay-Z</a>: </b></span>
				<img src="images/dummy_images/img3_phone_charger.jpg" width="100px" height="100px">
				<img src="images/dummy_images/img1_harry_potter_books.jpg" width="100px" height="100px">
			</div>
			<div  class="wrapper">
				<h3 class="wish_comments">Comments:</h3>
				 <hr>
				<textarea class="add_wish_comment" placeholder="Type your comment here..."> </textarea>
			</div>
			<a href="#" id='wish_desc_close_button' class="close_button">Close</a>
			<a href="#" class="grantit_button">GrantIt!</a>
			<div class="no-float"> </div>
			<br />
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
			<a href="#" id='add_wish_submit_button'>Add Wish</a>
			<a href="#" id='add_wish_close_button'>Close</a>
			<div class="no-float"> </div>
			<br />
		</div>
	</form>
</div>

<script src='script/main.js'></script>
<script src='script/wishes.js'></script>
</body>
</html>