<?php
class Delite_user
{
    use Delite;
    public function __construct()
    {
        $init = db_conn::$pdo->prepare(self::$dell);
        $init -> bindParam(1, $_SESSION['uid']);
        $init -> execute();
        if(!$init){
            array_push(_global::$err, (db_conn::$pdo->errorInfo()));
            return;
        }
    }
}