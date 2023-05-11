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
    
  
  <style type="text/css">
    .srch
    {
      padding-left: 1000px;
    }
  </style>   
</head>
<body>
    <!--__________________________search bar_____________________________________-->
    <div class="srch" >
            <form class="navbar-form" method="post" name="form1">
             
                <input class="form-control" type="text" name="search" placeholder="search books..." required="" >
                <button style="background-color:#6db6b9e6 " type ="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
              </button>
              

            </form>
       </div>
    <h2>LIST OF BOOKS</h2>
    <?PHP
          if(isset($_POST['submit']))
          {
            $q=mysqli_query($db,"SELECT * from books where booksname like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
              {
                echo "sorry! no books found .try searching again.";
              }
            else
              {
                echo "<table class='table table-striped table-hover'>";
                echo "<tr style='background-color: #6db6b9e6;'>";
				        //Table header
				        echo "<th>"; echo " Book-ID";	echo "</th>";
				        echo "<th>"; echo "Book-Name";  echo "</th>";
				        echo "<th>"; echo "Authors Name";  echo "</th>";
				        echo "<th>"; echo "Subject";  echo "</th>";
				        echo "<th>"; echo "Quantity";  echo "</th>";
			          echo "</tr>";	

			           while($row=mysqli_fetch_assoc($q))
			              {
				              echo "<tr>";
				              echo "<td>"; echo $row['book id']; echo "</td>";
				              echo "<td>"; echo $row['booksname']; echo "</td>";
				              echo "<td>"; echo $row['authors name']; echo "</td>";
				              echo "<td>"; echo $row['subject']; echo "</td>";
				              echo "<td>"; echo $row['quantity']; echo "</td>";
				              echo "</tr>";
			              }
		            echo "</table>";
              }
               /*if button is not pressed.*/
          
          }
          else
          {
            $res=mysqli_query( $db,"SELECT * FROM `books` ORDER BY `books`.`booksname` ASC;");
            echo "<table class='table table-striped table-hover'>";
            echo "<tr style='background-color: #6db6b9e6;'>";
                    //Table header
                  echo "<th>"; echo " Book-ID";	echo "</th>";
                  echo "<th>"; echo "Book-Name";  echo "</th>";
                  echo "<th>"; echo "Authors Name";  echo "</th>";
                  echo "<th>"; echo "Subject";  echo "</th>";
                  echo "<th>"; echo "Quantity";  echo "</th>";
                  echo "</tr>";	
    
              while($row=mysqli_fetch_assoc($res))
              {
                  echo "<tr>";
                  echo "<td>"; echo $row['book id']; echo "</td>";
                  echo "<td>"; echo $row['booksname']; echo "</td>";
                  echo "<td>"; echo $row['authors name']; echo "</td>";
                  echo "<td>"; echo $row['subject']; echo "</td>";
                 
                  echo "<td>"; echo $row['quantity']; echo "</td>";
                  
    
                  echo "</tr>";
               }
                  echo "</table>";
          }
          	?>
</body>

</html>