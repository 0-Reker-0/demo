<?php
trait auth_id
{
    protected static function auth_by_id(
        string $sql
    ):bool
    {
        $init = db_conn::$pdo->prepare($sql);
        $init -> bindParam(1, $_SESSION['uid']);
        $init -> execute();
        if(!$init){
            array_push(_global::$err, (db_conn::$pdo->errorInfo()));
            return false;
        }
        if($init->rowCount() == 0){
            array_push(_global::$err, 'Такой пользователь не существует!');
            return false;
        }
        $res = $init->fetchAll();
        array_push(_user_info::$info, $res[0]['d1']);
        array_push(_user_info::$info, $res[0]['d2']);
        array_push(_user_info::$info, $res[0]['d3']);
        return true;
    }
}