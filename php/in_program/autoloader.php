<?php
function autolad(){
	include_once('./db_func/db_conn.php');
	include_once('./db_func/querys/insert.php');
	include_once('./db_func/querys/select.php');
	include_once('./db_func/querys/delite.php');

	include_once('./func/new_usser.php');
	include_once('./func/auth.php');
	include_once('./func/update_user.php');
	include_once('./func/delite.php');
	include_once('./func/asist_func/hasher.php');
	include_once('./func/asist_func/auth_func/auth_id.php');
	include_once('./func/asist_func/auth_func/auth_name.php');
    
	include_once('./in_program/test.php');
	include_once('./in_program/global.php');
	include_once('./in_program/test_user.php');
}
spl_autoload_register('autolad');