<?php
session_start();
spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    require_once $className . '.php';
});
$pdo = new \PDO("mysql:dbname=your_database;host=your_localhost", "your_username", "your_password");
$db = new \Database\PDODatabase($pdo);
