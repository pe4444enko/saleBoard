<form name="comment" action="comments.php" method="post" enctype="multipart/form-data">
  <p>
    <label>Имя:</label>
    <input type="text" name="Name" />
    <input name="postDate" value="<?php echo date('Y-m-d H:i:s')?>"/>
  </p>
  <p>
    <label>Комментарий:</label>
    <br />
    <textarea name="Text" cols="30" rows="50"></textarea>
  </p>
  <p>
    <input type="hidden" name="announcementID" />
    <input type="submit" value="Отправить" />


  </p>
  <select name="selectComment"> <?php
require_once("dbConfig.php");

$conn = new mysqli( servername,  username,  password, dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from announcement";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    while($row = $result->fetch_assoc()) {
        ?>
        <div>
            <option><?php echo $row["announcementID"];?></option>
        </div>
        <?php
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?></select>
</form>



<?php
        if ($_SERVER["REQUEST_METHOD"]=="POST")
        {
            require_once("dbConfig.php");
            $conn = new mysqli(servername, username, password, dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO comments (`Name`, `Text`, `announcementID`,`postDate`) VALUES ('".$_POST["Name"]."', '".$_POST["Text"]. "', '".$_POST["selectComment"]. "','".$_POST["postDate"]. "')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

$conn->close(); 
}


?>
