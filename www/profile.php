<?php

//страница доступна только зарегистрированному пользователю user_name

session_start();

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
$smarty->assign("title", "User Profile");

echo "Hello, " . $_SESSION['user_name'] . "<br/>";

// Выводим шаблон
$smarty->display('profile.tpl');

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $current = $_SESSION['user_name'];
    if (empty($_POST['login'])) {
        echo "Login empty";
    } else {
        $query = "UPDATE `users`
                  SET `login`='{$login}'
                  WHERE `login`='{$current}'";
        $result = mysql_query($query) or die(mysql_error());
        echo "<br/>Login changed. <a href=\"/logout.php\">Logout</a>, please, and login with new name";
    }
}

