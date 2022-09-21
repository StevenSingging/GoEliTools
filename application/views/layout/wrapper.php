<?php
// proteksi halaman dengan library My_login
$this->my_login->check_login();
// menggabungkan seluruh bagian layout menjadi satu
require_once('head.php');
require_once('header.php');
require_once('menu.php');
require_once('content.php');
require_once('footer.php');