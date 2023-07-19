<?php
    $db_connect = mysqli_connect("localhost", "root", "", "urls");
    if(!$db_connect){
        die("Connection failed: ".mysqli_connect_error());
    }

    $rewrite_url = "";
    if(isset($_GET)) {
        foreach($_GET as $key => $value) {
            $val = mysqli_real_escape_string($db_connect, $key);
            $rewrite_url = str_replace('/', '', $val);
        }

        $sql = mysqli_query($db_connect, "SELECT inputUrl FROM urlshortener WHERE shortUrl = '{$rewrite_url}'");
        if(mysqli_num_rows($sql) > 0) {
            $inputUrl = mysqli_fetch_assoc($sql);
            header("Location: ".$inputUrl['inputUrl']);
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body>
    <h1>URL Shortener</h1>
    <h2>Input a URL to shorten it</h2>
    <form action="shortUrl.php" method="post">
        <input type="text" name="inputUrl" placeholder="Enter URL" autocomplete="off" size="80" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>