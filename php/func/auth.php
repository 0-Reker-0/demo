<?php
/**
 * Класс авторизации пользователя
 * 
 * Использует SQL заготовки и трейты готовых функций
 */
class Auth
{
    use select;
    use auth_name;
    use auth_id;

    /**
     * __construct запускает обычную авторизацию
     * @param array $data
     */
    public function __construct(array $data)
    {
        self::auth_by_name(self::$by_name, $data);
    }

    /**
     * show() запускает получение информации о пользователе
     * @return void
     */
    public static function show():void
    {
        self::auth_by_id(self::$by_id);
        return;
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