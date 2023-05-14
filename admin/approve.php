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
    <title>approve request</title>
            <style type="text/css">
            .srch
            {
            padding-left: 500px;
            }
            .form-control{
                width:300px;
                height: 30px;
                 background-color: #818181  ; 
                 color: whitesmoke;  
            }
            .body 
            {
                font-family: "Lato", sans-serif;
                transition: background-color .5s;
            }
            .approve{
                margin-left: 400px;
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
            .container
            {
                height: 700px;
                background-color: black;
                opacity: 0.8; 
                color: white;
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
        
<div class="container">
<h3 style="text-align: center;">Approve request</h3>
<form action="" class="approve" method="post">
<input class="form-control" type="text" name="bookstatus" placeholder="Approve or not" required=""><br>
<input class="form-control" type="text" name="issue" placeholder="yyyy-mm-dd" required=""><br>
<input class="form-control" type="text" name="return" placeholder="yyyy-mm-dd" required=""><br>
<button class="btn tn-default"  type="submit" name="submit">Approve</button>
</form>
</div>

<?php
if(isset($_POST['submit']))
{
    mysqli_query($db,"UPDATE `issue_book` SET `bookstatus`='$_POST[bookstatus]',`issue`='$_POST[issue]', `return`='$_POST[return]' WHERE username='$_SESSION[username] 'and bookid ='$_SESSION[bookid]'");
    mysqli_query($db, "UPDATE books SET quantity=quantity-1 WHERE bookid='$_SESSION[bookid]'");
    $res=mysqli_query($db,"SELECT quantity from books where bookid ='$_SESSION[bookid]';");
    while($row= mysqli_fetch_assoc($res))
    {
        if($row['quantity']==0)
        {
            mysqli_query($db,"UPDATE books SET bookstatus='Not Available' where bookid ='$_SESSION[bookid]'");
        }
    }
    ?>
        <script type="text/javascript">
            alert("updateed successfully");
            window.location="request.php";
        </script>
    <?php
}
?>
        </div>
    </body>
</html>