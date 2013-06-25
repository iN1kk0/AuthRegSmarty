<?php

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
$smarty->assign("title", "Login");

// Выводим шаблон
$smarty->display('login.tpl');

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = mysql_real_escape_string($_POST['login']);
    $password = md5($_POST['password']);

    // ищем юзера с таким же логином и паролем

    $query = "SELECT `id`, `login`
            FROM `users`
            WHERE `login`='{$login}' AND `password`='{$password}'
            LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());

    if (mysql_num_rows($sql) == 1) {
        $row = mysql_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['login'];
    }
}

if (isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">
            window.location = "profile.php"
          </script>';
} else {
    echo "<a href='\'>Registration</a><br />";
    echo "<a href='forgot.php'>Forgot password?</a>";
}