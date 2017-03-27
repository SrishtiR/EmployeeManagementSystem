<?php session_start();
        $_SESSION['name'] = "matt";
?>
 
<?php
        if(isset($_POST['submit'])){
                
                $con = mysqli_connect("localhost","root","","Picture");
                $q = mysqli_query($con,"UPDATE pictures SET image = '".$_FILES['file']['name']."' WHERE name = '".$_SESSION['name']."'");
        }
?>
 
<!DOCTYPE html>
<html>
        <head>
       
        </head>
        <body>
                <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" name="submit">
                </form>
               
               
                <?php
                        $con = mysqli_connect("localhost","root","","Picture");
                        $q = mysqli_query($con,"SELECT * FROM users");
                        while($row = mysqli_fetch_assoc($q)){
                                echo $row['name'];
                                if($row['image'] == ""){
                                        echo "<img width='100' height='100' src='pictures/default.jpg' alt='Default Profile Pic'>";
                                } else {
                                        echo "<img width='100' height='100' src='pictures/".$row['image']."' alt='Profile Pic'>";
                                }
                                echo "<br>";
                        }
                ?>
        </body>
</html>
