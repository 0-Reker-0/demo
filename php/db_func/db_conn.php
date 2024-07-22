<?php
class db_conn
{
    private static string $dsn = 'mysql:dbname=demo_db;host=127.0.0.1';
    private static string $user = 'root';
    private static string $pass = '';
    public static $pdo;

    public static function init():void
    {
        try {
            self::$pdo = new PDO(
                self::$dsn,
                self::$user,
                self::$pass,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'"
                ]
            );
        }
        catch(PDOException $e){
            _global::_exit(json_encode([
                'acces' => 'denay', 
                'err' => $e
            ]));
        }
    }
}