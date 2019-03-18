<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="stylex.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    <?php
        if (!isset($_SERVER['PHP_AUTH_USER']))
            {
                header('WWW-Authenticate:Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
            }
    ?>
    <?php require_once("header.php");?>
    <?php require_once("dbConfig.php");
        $conn = new mysqli( servername,  username,  password, dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "SELECT * from announcement";
        $result = $conn->query($sql);
             if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                {
    ?>
    <div>
    <h1><?php echo $row["Name"];?></h1>
    <h2><?php echo $row["Title"];?></h2>
    <img style="transform: translateX(35px);" src='<?php echo $row["coverURL"];?>'/>
    <p>
    <?php 
        $sql2 = "SELECT * from comments WHERE announcementID=".$row["announcementID"];
        $resultComments = $conn->query($sql2);
            if ($resultComments->num_rows > 0) 
                {
                    while($row2 = $resultComments->fetch_assoc()) {
    ?>
                            <div>
                                <h1><?php echo $row2["announcementID"];?></h1>
                                <h2><?php echo $row2["Name"];?></h2>
                                <p><?php echo $row2["Text"]?></p>
                                <p><?php echo $row2['postDate']?></p>
                            </div>
                            <?php
                            
                        }
                        echo "</table>";    
                    }
                ?></p>
            </div>
            <?php
            
        }
        echo "</table>";    
    }
    $conn->close();
    ?>

    <?php require_once("footer.php");  ?>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>






