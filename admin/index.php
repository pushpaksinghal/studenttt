<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Library Management System
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style type="text/css">
	nav
	{
		float: right;
		word-spacing: 30px;
		padding: 20px;
	}
	nav li 
	{
		display: inline-block;
		line-height: 80px;
	}
</style>
</head>


<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<img src="images/Screenshot (30).png">
			<h1 style="color: white;">GLA UNIVERSITY LIBRARY</h1>
		</div>
		
		 <?php
			if (isset($_SESSION['login_user']))
			{?>
				<nav>
				    
				   <ul> 
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
					<li><a href="">
                       <div style="color:dark grey">
                        <?php
                        echo "WELCOME-".$_SESSION['login_user'];
                        ?>
                       </div>
                    </a></li>
				   </ul>
			    </nav>
				<?php
				
			}	
			else
				{ 
					?>
					<nav>
						<ul>
							<li><a href="index.php">HOME</a></li>
							<li><a href="books.php">BOOKS</a></li>
							<li><a href="admin_login.php">ADMIN-LOGIN</a></li>
						</ul>
					</nav>
				    <?php
				}
				?>
		
		</header>
		<section>
		<div class="sec_img">
			<br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcome to library</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 15:00 </h1><br>
			</div>
		</div>
		</section>
		<footer>
			<p style="color:white;  text-align: center; ">
				<br><br>
				Email: Online.library@gmail.com <br>
				Mobile: +880182417840
			</p>
		</footer>
	</div>
</body>
<div></div>
</html>