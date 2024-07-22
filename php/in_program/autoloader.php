<?php
function autolad(){
	include_once('./db_func/db_conn.php');
	include_once('./db_func/querys/insert.php');
	include_once('./db_func/querys/select.php');

	include_once('./func/new_usser.php');
	include_once('./func/asist_func/hasher.php');
	include_once('./func/auth.php');
    
	include_once('./in_program/test.php');
	include_once('./in_program/global.php');
}
spl_autoload_register('autolad');