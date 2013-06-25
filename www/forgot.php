<?php

define('SMARTY_DIR', '../libs/');

// Подключаем Samrty
require_once(SMARTY_DIR . 'Smarty.class.php');

// Подключаем конфиг
include(SMARTY_DIR . "config.php");

// Создаем объект класса Smarty
$smarty = new Smarty;

$smarty->template_dir = '../templates/';
$smarty->compile_dir = '../templates_c/';
$smarty->config_dir = '../configs/';
$smarty->cache_dir = '../cache/';
// Задаем настройки Smarty
//$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

// Устанавливаем значение переменной Title
$smarty->assign("title", "Forgot password?");

// Выводим шаблон
$smarty->display('forgot.tpl');


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    if (empty($_POST['email'])) {
        echo "EMPTY EMAIL!";
    } else {
        $query = "SELECT `login`, `password`, `email`
                  FROM `users`
                  WHERE `email`='{$email}'
                  LIMIT 1";
        $sql = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_assoc($sql);
        /* echo $row['email'] . "<br/>";
          echo $row['login'] . "<br/>";
          echo $row['password']; */
        $email = $row['email'];
        $subject = "Hello, " . $row['login'] . "! Forgot password? <br />";
        $message = "Your password: " . $row['password'];
        mail($email, $subject, $message);
        echo "Hello, " . $row['login'] . "! Your password will be sent on email: " . $row['email'];
    }
}
