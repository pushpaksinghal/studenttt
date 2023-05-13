<?php
    include "connect.php";
    include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style type="text/css">
    .srch
    {
      padding-left: 1000px;
    }
    body {
        background-color:burlywood;
        font-family: "Lato", sans-serif;
        
        }
.book
{
   width: 400px;
   margin: 0 auto;
}

.sidenav {
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
         <div class="h"><a href="add.php">Add Books</a></div> 
          <div class="h"><a href="delete.php">Delete Books</a></div>
         <div class="h" > <a href="#">Request</a></div> 
          <div class="h"><a href="#">Issue</a></div>
        </div>

        <div id="main">
          <span style="font-size:30px;cursor:pointer;color:black;" onclick="openNav()">&#9776; MENU</span>
            <div class="container">
              <h2 style="color:black;font-family:lucida console; text-align:center;"> ADD NEW BOOKS.</h2>
              <form action="" class="book" method="post"><br>
                <input type="text" name="booksname" class=" form-control" placeholder="book name" required=""><br>
                <input type="text" name="authorsname" class=" form-control" placeholder="auther name" required=""><br>
                <input type="text" name="quantity" class=" form-control" placeholder="quantity" required=""><br>
                <input type="text" name="bookid" class=" form-control" placeholder="bookID" required=""><br>
                <input type="text" name="subject" class=" form-control" placeholder="department" required=""><br>

                <button style="text-align:center;" class="btn btn-default" type="submit" name="submit">ADD</button>
              </form>
            </div>


            <?php
            if(isset($_POST['submit'])){
                if(isset($_SESSION['login_user']))
                {
                    mysqli_query($db,"INSERT INTO books VALUES ('$_POST[booksname]','$_POST[authorsname]','$_POST[bookid]','$_POST[quantity]','$_POST[subject]');");
                    ?>
                    <script type="text/javascript">
                        alert("Book added Successfully");
                    </script>
                    <?php
                }
                else{
                    ?>
                    <script type="text/javascript">
                        alert("You Need TO LOGIN First")
                    </script>
                    <?php
                }
            }
            
            ?>
        </div>

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
        
    </body>
    </html>