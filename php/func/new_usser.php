<?php
/**
 * Класс предназначен для создания пользователя
 * 
 * Использует заготовленный запрос SQL
 */
class New_user
{
    use Insert;
    /**
     * @data array
     * 
     * Принимает массив параметров. 
     * Может быть именнованным, но не обязательно :)
     */
    public function __construct(
        array $data
    )
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