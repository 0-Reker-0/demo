<?php
/*автолоудер классов*/
include './in_program/autoloader.php';

/*проверяем корректность запроса*/
test_haedrs::init($_SERVER) == true ? 
_global::_exit(json_encode([
    'acces' => 'denay', 
    'err' => 'not server rule'
])):

/*запуск API*/
init(json_decode(file_get_contents('php://input'), true));

function init($data):void
{
    /*запускаем сессию и инициализируем подключение к БД*/
    session_start();
    db_conn::init();

    /*
    *   коды инициализации
    *   в общей концепции коды повторяют структуру, однако выполняют разные задачи
    */
    switch($data['code']){
        case 'add':
            /*массив введённых данных*/
            $input = array(
                'name' => $data['name'],
                'pass' => hasher::create($data['pass']),
                'd1' => $data['d1'],
                'd2' => $data['d2'],
                'd3' => $data['d3']
            );
            /*создание пользователя*/
            new New_user($input);

            /*проверки на наличие ошибок*/
            if(empty(_global::$err))
                exit(json_encode(['acces' => 'granted']));
            else
                _global::_exit(json_encode([
                    'acces' => 'denay', 
                    'err' => end(_global::$err)
                ]));
        
        case 'upd':
            

        case 'dell':


        case 'show':
            

        case 'auth':
            /*массив введённых данных*/
            $input = array(
                'name' => $data['name'],
                'pass' => $data['pass']
            );

            /*авторизация пользователя*/
            new Auth($input);
            
            /*проверки на наличие ошибок*/
            if(empty(_global::$err))
                exit(json_encode(['acces' => 'granted', 'data' => _user_info::$info]));
            else
                _global::_exit(json_encode([
                    'acces' => 'denay', 
                    'err' => end(_global::$err)
                ]));

        default:
            exit('403');
    }
}