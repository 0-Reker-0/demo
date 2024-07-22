<?php
class hasher
{
    public static function create(string $data):string
    {
        return password_hash($data, PASSWORD_ARGON2ID);;
    }
    public static function test($pass, $hash):bool
    {
        return password_verify($pass, $hash);
    }
}