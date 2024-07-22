<?php
/**
 * Класс предназначен для создания пользователя
 * 
 * Использует заготовленный запрос SQL
 */
class New_user
{
    use Insert;
    use Test_user;
    /**
     * @data array
     * 
     * Принимает массив параметров. 
     * Может быть именнованным, но не обязательно :)
     * 
     * проверяет наличе пользователя в БД после чего вызывет функцию записи или 
     * завершает свою работу
     */
    public function __construct(
        array $data
    )
    {
        if(Test_user::init($data['name']) == true){
            array_push(_global::$err, (db_conn::$pdo->errorInfo()));
            return;
        }
        else
            self::insert($data);
    }
    
    /**
     * вставка данных пользователя
     * @data массив данных пользователя
     */
    private static function insert(
        array $data
    ):void
    {
        $init = db_conn::$pdo->prepare(self::$new_user);
        $i = 1;
        foreach($data as $inf => &$val){
            $init->bindParam($i, $val);
            $i++;
        }
        $init -> execute();
        if (!$init)
            array_push(_global::$err, (db_conn::$pdo->errorInfo()));
        else
            $_SESSION['uid'] = db_conn::$pdo->lastInsertId();
    }
}