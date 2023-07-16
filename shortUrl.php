<?php

$db = new PDO('mysql:host=localhost;dbname=urls;charset=utf8mb4', 'root', '');

$inputUrl = $_POST['inputUrl'];
$shortUrl = substr(md5(microtime()), rand(0, 26), 5);

$sql = "INSERT INTO urlshortener (inputUrl, shortUrl) VALUES ('$inputUrl', '$shortUrl')";
$db->exec($sql);

header("Location: confirmationPage.php?shortUrl=$shortUrl");
?>