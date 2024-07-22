<?php
trait Insert
{
    protected static string $new_user = "
        INSERT INTO `users` (`id`, `name`, `pass`, `d1`, `d2`, `d3`) VALUES (NULL, ?, ?, ?, ?, ?);
    ";
}