<?php
    $shortUrl = $_GET["shortUrl"];

    $db = new PDO("mysql:host=localhost;dbname=urls", "root", "");
    $sql = "SELECT inputUrl FROM urlshortener WHERE shortUrl='$shortUrl'";
    $result = $db->query($sql);
    $row = $result->fetch();

    if ($row) {
        echo "Your short URL is: <a href='$row[0]'>localhost/" . "$shortUrl</a>";
    }
?>