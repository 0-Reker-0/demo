<?php
class test_haedrs
{
    public static function init(array $data):bool
    {
        if(empty($data['HTTP_REFERER ']))
            return false;
        else
            return true;
    }
}