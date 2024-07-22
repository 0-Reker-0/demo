<?php
/**
 * Класс авторизации пользователя
 * 
 * Использует SQL заготовки
 */
class Auth
{
    use select;
    public function __construct(array $data)
    {
        $init = db_conn::$pdo->prepare(self::$by_name);
        $init -> bindParam(1, $data['name']);
        $init -> execute();
        if(!$init){
            array_push(_global::$err, (db_conn::$pdo->errorInfo()));
            return;
        }
        $res = $init->fetchAll();
        if(hasher::test($data['pass'], $res[0]['pass']) == false){
            array_push(_global::$err, ('Пароль неверный!'));
            return;
        }
        else{
            array_push(_user_info::$info, $res[0]['d1']);
            array_push(_user_info::$info, $res[0]['d2']);
            array_push(_user_info::$info, $res[0]['d3']);
            $_SESSION['uid'] = $res[0]['id'];
        }
    }
}

class _user_info
{
    /**
     * Информация о пользователе
     * @info array
     */
    public static array $info = [];
}