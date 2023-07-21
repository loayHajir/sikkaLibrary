<?php

$serverName = 'localhost';
$userName = 'root'; 
$password = '';
$db = 'sikka library';


// To create your own variables related to you own environment. Copy this file to `config.local.php` and set your variables there.
// This file will be added to .gitignore and used locally to set your own config variables without affecting the live settings
if (file_exists('config.local.php')) {
  include 'config.local.php';
}
