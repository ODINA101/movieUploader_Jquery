 
        
<?php
 
$servername = "localhost";
$username = "u593824949_admin";
$password = "korkota123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=u593824949_movie;charset=utf8;", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_GET['q']) {
       
        $sql = "SELECT * FROM ".$_GET['q']."";
        $result = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
       
        $return = [];
        foreach ($result as $row) {
            $return[] = [ 
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'photo' => $row['photo'],
                'videoHD' => $row['videoHD'],
                'videoSD' => $row['videoSD'],
                'imdb' =>$row['imdb']
                
                
            ];
        }
        $conn = null;
        
        echo json_encode($return,JSON_UNESCAPED_UNICODE);
    }
 

 


    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
   