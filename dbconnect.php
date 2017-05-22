<?php
$dsn = 'mysql:dbname=assignment3week;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// PDOExceptionが使用可能になる。この中にエラー分が格納される
$dbh->query('SET NAMES utf8');
?>