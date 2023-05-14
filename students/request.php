<?php
    include "connect.php";
    include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>book request</title>
            <style type="text/css">
            .srch
            {
            padding-left: 1000px;
            }
            .body 
            {
                font-family: "Lato", sans-serif;
                transition: background-color .5s;
            }
            .sidenav
            {
                height: 100%;
                margin-top:50px;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #222;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: #f1f1f1;
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            #main {
                transition: margin-left .5s;
                padding: 16px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }
            .h:hover
            {
            color:white;
            width:200px;
            height:50px;
            background-color:grey ;

            }
            </style>
</head>
<body>
    <!--________________________________sidenav________________________________________________-->
  <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div style="color:grey; margin-left:30px; font-size:20px;">
              <?php
              if(isset($_SESSION['login_user']))
              {
                echo $_SESSION['login_user'];
              }
              ?>
          </div>
          <br><br>
         <div class="h"><a href="books.php">BOOKS</a></div> 
         <div class="h" > <a href="request.php">REQUEST</a></div> 
          <div class="h"><a href="issue.php">Issue</a></div>
        </div>

        <div id="main">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
       

        <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "200px";
          document.getElementById("main").style.marginLeft = "200px";
          document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
          document.body.style.backgroundColor = "white";
        }
        </script>
        <?php
         if(isset($_SESSION['login_user']))
          {
            $q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' ;");
            if(mysqli_num_rows($q)==0)
              {
                echo "there is no pending request.";
              }
            else
              {
                echo "<table class='table table-striped table-hover'>";
                echo "<tr style='background-color: #6db6b9e6;'>";
				        //Table header
				        echo "<th>"; echo " Book-ID";	echo "</th>";
				        echo "<th>"; echo "status";  echo "</th>";
				        echo "<th>"; echo "Issue Date";  echo "</th>";
				        echo "<th>"; echo "Return Date";  echo "</th>";
			          echo "</tr>";	

			           while($row=mysqli_fetch_assoc($q))
			              {
				              echo "<tr>";
				              echo "<td>"; echo $row['bookid']; echo "</td>";
				              echo "<td>"; echo $row['bookstatus']; echo "</td>";
				              echo "<td>"; echo $row['issue']; echo "</td>";
				              echo "<td>"; echo $row['return']; echo "</td>";
				              echo "</tr>";
			              }
		            echo "</table>";
              }
               /*if button is not pressed.*/
          
          }
          else
          {
             echo "<br>";
            echo "<h2>";
            echo " Please login first to see the request ";
            echo "</h2>";
          }
          ?>
</body>
</html>