<?php
/**
 * Класс обновления позьзователя
 * включает заготовки SQL и заготовленные функции
 */
class Update_user
{
    /**
     * Выполняет обновление
     */
    public function __construct(array $data)
    {
        $sql = "UPDATE `users` SET {$data['data']} = ? WHERE `users`.`id` = ?;";
        $init = db_conn::$pdo->prepare($sql);
        $init -> bindParam(1, $data['value']);
        $init -> bindParam(2, $_SESSION['uid']);
        $init -> execute();
        if(!$init){
            array_push(_global::$err, (db_conn::$pdo->errorInfo()));
            return;
        }
    }
}