<?php
class _global
{
    /**
     * @err массив ошибок
     */
    public static array $err = [];
    /**
     * @_exit функция выхода
     * 
     * $data должна быть строкой json
     */
    public static function _exit(string $data):void
    {
        exit($data);
    }
}