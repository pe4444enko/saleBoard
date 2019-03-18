<?php 
    require_once("header.php");  
       ?>





<form method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label>Cover</label>
    <input type="file" class="form-control" placeholder="image" name="image">
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Name" name="Name">
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" placeholder="Title" name="Title">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
</form>
<?php
        if ($_SERVER["REQUEST_METHOD"]=="POST")
        {
            require_once("dbConfig.php");
            $conn = new mysqli(servername, username, password, dbname);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    
        $maxFileSize=1024*1024*5;
    
        if($_FILES["image"]["size"] <= $maxFileSize &&
            preg_match("/^image\/(svg|png|jpg|gif|jpeg)$/",$_FILES["image"]["type"]))
            {
                move_uploaded_file ($_FILES["image"]["tmp_name"],
                "uploads/".$_FILES["image"]["name"]);
            }
        
        $sql = "INSERT INTO  announcement (`coverURL`,`Name`, `Title`) VALUES ('". "uploads/".$_FILES["image"]["name"]."','".$_POST["Name"]."', '".$_POST["Title"]. "')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

$conn->close(); 
}


?>


<?php 
    require_once("footer.php");  
?>