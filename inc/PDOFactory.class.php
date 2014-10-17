<?php

class PDOFactory {

    // public static function getMysqlConnexion() {
    //     $db = new \PDO(__MYSQL_ACCESS__, __MYSQL_USER__, __MYSQL_PASSWD__, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //     $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    //     return $db;
    // }

    public static function getSQLiteConnexion() {
        $db = new \PDO('sqlite:' . SQLITE_DB);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

}

?>
