<?php
/**
 * Класс заготовленных SQL запросов для вывода и выбора пользователя
 */
trait Select
{
    /** 
     * @by_name Выбор по ID
     */
    public static string $by_name = "
        SELECT * FROM `users` WHERE `name` LIKE ? ; 
    "; 
}