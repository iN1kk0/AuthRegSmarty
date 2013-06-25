<?php

define('SMARTY_DIR', '../libs/');

// Подключаем конфиг
include(SMARTY_DIR . "config.php");
// Подключаем Smarty
require_once(SMARTY_DIR . 'Smarty.class.php');

// Создаем объект класса Smarty
$smarty = new Smarty;


$smarty->template_dir = '../templates/';
$smarty->compile_dir = '../templates_c/';
$smarty->config_dir = '../configs/';
$smarty->cache_dir = '../cache/';

// Задаем настройки Smarty
//$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = false; // Не кэшируем, т.к. содержимое страницы меняется в зависимости от результата регистрации
$smarty->cache_lifetime = 120;

// Устанавливаем значение переменной Title
$smarty->assign("title", "Registration page");

// Получаем значение переменных без пробелов
$login = trim($_POST['login']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

/* if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
  echo "Email so bad!";
  } */

// Проверка данных
if (isset($_POST['submit']) && strlen($login) > 0 && strlen($email) && strlen($password) > 0 && preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
    // Добавление данных в БД
    $query = "INSERT INTO USERS(login,email,password) VALUES ('" . mysql_escape_string($login) . "', '" . mysql_escape_string($email) . "','" . md5($password) . "')";
    $result = mysql_query($query);
} else {
    $result = false;
}

// Устанавливаем значение переменной Reg (true,false)
$smarty->assign("reg", $result);

// Выводим шаблон
$smarty->display('registr.tpl');
?>