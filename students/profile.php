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
    width: 400px;
    margin: 0 auto;
    color: white;
}
</style>
</head>
<body style="background-color: #004528;">
    <div class="container">
            <form action="" method="post">
                <button class="btn btn-default" style="flaot:right;" name="submit1" width="70px;">
                Edit
            </button>
            </form>
            <div class="wrapper" >
                <?php
                    $q=mysqli_query($db,"SELECT* FROM `login` where username='$_SESSION[login_user]'; ");
                ?>
                <h1 style="text-align:centre  ;">
                    My profile
                </h1>
            </div>

    </div>
    
</body>
</html>