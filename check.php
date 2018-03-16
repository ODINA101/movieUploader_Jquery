
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Database</title>
</head>
<body>
<div class="container">
           
  
    <?php
session_start();
 
    if(isset($_SESSION["name"])){
       if($_SESSION["name"] == "irakli") {

       }else{
      header("location:index.php");
         
       }
    }else{
      header("location:index.php");
    }
    
 
$servername = "localhost";
$username = "u593824949_admin";
$password = "notfound22";

try {
    $conn = new PDO("mysql:host=$servername;dbname=u593824949_movie;charset=utf8;", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

 if(isset($_POST['rebtn'])) {
$videosd = $_POST['videosd'];
$videohd = $_POST['videohd'];

 $sql = "UPDATE home SET videoHD='$videohd', videoSD='$videosd' WHERE id=15";

$conn->query($sql);
 }

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    

 


?>





<form action="" method="POST">
  <div class="form-group">
    <label for="text1">იმ ფილმის ფოტო რომელშიც ლინკებს ვცვლით:</label>
    <input type="text" placeholder="ფოტოს ლინკი" class="form-control" id="text1" name="sadac">
  </div>
  <div class="form-group">
    <label for="link1">ლინკები:</label>
    <input type="text" placeholder="videoSD" class="form-control" id="link1" name="videosd">
    </div>
 
   <div class="form-group">
  
    <label for="link2"></label>
      <input class="form-control" placeholder="videoHD" type="text" id="link2" name="videohd">

  </div>
  <button type="submit" class="btn btn-primary" name="rebtn">რედაქტირება</button>
</form>

     
</div>

</body>
</html>
