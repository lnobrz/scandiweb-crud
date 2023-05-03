<?php
include_once "../model/Response.php";

class Database 
{
    private static $writeDatabaseConnection;
    private static $readDatabaseConnection;

    public static function connectWriteDatabase()
    {
        if (self::$writeDatabaseConnection == NULL) {
            self::$writeDatabaseConnection = new PDO('mysql:host=localhost;dbname=scandiweb;charset=utf8', "root", "root");
            self::$writeDatabaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$writeDatabaseConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$writeDatabaseConnection;
    }

    public static function connectReadDatabase()
    {
        if (self::$readDatabaseConnection == NULL) {
            self::$readDatabaseConnection = new PDO('mysql:host=localhost;dbname=scandiweb;charset=utf8', "root", "root");
            self::$readDatabaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$readDatabaseConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$readDatabaseConnection;
    }
}
