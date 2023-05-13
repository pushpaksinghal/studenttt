<?php
     include "connect.php";
     include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>profile</title>
<style>
    .wrapper
{
    width: 200px;
    margin: 0 auto;
    color: white;
}
</style>
</head>
<body style="background-color: #004528;">
    <div class="container">
            <form action="" method="post">
                <button class="btn btn-default" style="float:right;" name="submit1" width="70px;">
                Edit
            </button>
            </form>
            <div class="wrapper" >
                <?php
                    $q=mysqli_query($db,"SELECT* FROM `admin` where username='$_SESSION[login_user]'; ");
                ?>
                <h1 style="text-align:centre  ;">
                    My profile
                </h1>
                
                   <?php
                       $raw=mysqli_fetch_assoc($q);
                    echo "<div style='text-align: center '><img  class='img-circle profile-img' height=110 width=120    src='images/userprofilephoto.jpeg'</div>";
                    ?>
                <div  style="text-align:centre;"><b>Welcome</b>
                  <h4>
                    <?php
                      echo $_SESSION['login_user'];

                    ?>
                  </h4>
                </div>
                <?php
                echo"<b>";
                echo "<table class='table'>";
                echo "<tr>";
                        echo "<td>";
                            echo "<b>  EmailID:  </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $raw['emailID'];
                        echo "</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>";
                            echo "<b>  StudentNumber:  </b>";
                        echo "</td>";

                        echo "<td>";
                            echo $raw['moile no.'];
                        echo "</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>";
                        echo "<b>  Fathher'sName:  </b>";
                        echo "</td>";

                        echo "<td>";
                        echo $raw['father_name'];
                        echo "</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>";
                        echo "<b>  branch:  </b>";
                        echo "</td>";

                        echo "<td>";
                        echo $raw['branch'];
                        echo "</td>";
                echo "</tr>";
                echo "<tr>";
                        echo "<td>";
                        echo "<b>  password:  </b>";
                        echo "</td>";

                        echo "<td>";
                        echo $raw['password'];
                        echo "</td>";
                echo "</tr>";
                echo "</table>";
                echo"</b>";
                ?>
            </div>

    </div>
    
</body>
</html>