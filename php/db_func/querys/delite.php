<?php
/**
 * SQL для удаления пользователя
 */
trait Delite
{
    protected static string $dell = "
        DELETE FROM users WHERE `users`.`id` = ?;
    ";
}