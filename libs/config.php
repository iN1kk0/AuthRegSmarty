<?php

// Настройки подлючения к БД

$dbHost = "localhost"; // хост
$dbUser = "root"; // пользователь
$dbPassword = ""; // пароль
$dbName = "smarty"; // имя БД

$con = mysql_connect($dbHost, $dbUser, $dbPassword);
$sel = mysql_select_db($dbName, $con) or mysql_error();

/*
 * Create table useres:
 * 
  CREATE TABLE USERS (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  login VARCHAR( 255 ) NOT NULL ,
  email VARCHAR( 255 ) NOT NULL ,
  password VARCHAR( 255 ) NOT NULL ,
  created_on TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  NOT NULL DEFAULT CURRENT_TIMESTAMP
  );
 */
?>