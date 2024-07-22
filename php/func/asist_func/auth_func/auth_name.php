<?php
trait auth_name
{
    protected static function auth_by_name(
        string $sql,
        array $data
    ):bool
    {
        $init = db_conn::$pdo->prepare($sql);
        $init -> bindParam(1, $data['name']);
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
        if(hasher::test($data['pass'], $res[0]['pass']) == false){
            array_push(_global::$err, ('Пароль неверный!'));
            return false;
        }
        else{
            array_push(_user_info::$info, $res[0]['d1']);
            array_push(_user_info::$info, $res[0]['d2']);
            array_push(_user_info::$info, $res[0]['d3']);
            $_SESSION['uid'] = $res[0]['id'];
            return true;
        }
    }
}