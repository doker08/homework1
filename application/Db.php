<?php

/**
 * Created by PhpStorm.
 * User: sokol_000
 * Date: 06.12.2016
 * Time: 16:21
 */
class Db
{
    public static function getConnection(){
        $configPath = SITE_PATH."/config/db_config.php";
        $params = include($configPath);

        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        $db->exec('SET CHARACTER SET utf8');

        return $db;
    }
}