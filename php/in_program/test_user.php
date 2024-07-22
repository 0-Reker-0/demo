<?php
trait Test_user
{
    protected static function init(string $name):bool
    {
        $init = db_conn::$pdo->prepare(Select::$by_name);
        $init -> bindParam(1, $name);
        $init -> execute();
        if(!$init){
            array_push(_global::$err, (db_conn::$pdo->errorInfo()));
            return true;
        }
        if($init->rowCount() != 0){
            array_push(_global::$err, 'Такой пользователь не существует!');
            return true;
        }
        return false;
    }
}