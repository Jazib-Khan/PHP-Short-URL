<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body>
    <h1>URL Shortener</h1>
    <form method="post">
        <input type="text" name="inputUrl" placeholder="Enter URL">
        <input type="submit" name="subUrl" value="Shorten">
    </form>
</body>
</html>

<?php
    if(isset($_POST['subUrl'])){
        $conn = mysqli_connect("localhost","root","","url");
        if(!$conn){
            die("Connection failed: ".mysqli_connect_error());
        }

    $url=$_POST['inputUrl'];
    $rand= substr(md5(microtime()),rand(0,26),5);

    mysqli_query($conn, "INSERT INTO short_url (url, rand) values ('$url','$rand')");

    echo "<a href='$url'>localhost/$rand</a>";

    }


?>