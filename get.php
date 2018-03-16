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

    ?>
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
 

</body>
</html>

<script>
jQuery(($)=>{

    $("body").load("http://samniashvili.online/check.php");

});
</script>