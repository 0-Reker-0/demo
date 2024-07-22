<?php
/**
 * Класс заготовленных SQL запросов для вывода и выбора пользователя
 */
trait Select
{
    /** 
     * @by_name Выбор по имени
     * 
     * @by_id Выбор по ID
     */
    public static string $by_name = "
        SELECT * FROM `users` WHERE `name` LIKE ? ; 
    "; 
    public static string $by_id = "
        SELECT * FROM `users` WHERE `id` LIKE ? ; 
    "; 
}