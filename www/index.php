<?php

session_start();
define('SMARTY_DIR', '../libs/');

// Подключаем Samrty
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
$smarty->caching = true;
$smarty->cache_lifetime = 120;

// Устанавливаем значение переменной Title
$smarty->assign("title", "Registration");

//проверка на логин
if (isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">
window.location = "profile.php"
</script>';
} else {
    $smarty->display('index.tpl');
}
?>