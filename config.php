<?php
function pr ($dt) { echo '<pre>';print_r($dt);}
define('IS_LOCAL_ENV', !(
    in_array($_SERVER['HTTP_HOST'], array('localhost','127.0.0.1')) === false &&
    $_SERVER['REMOTE_ADDR'] !== '127.0.0.1' &&
    $_SERVER['REMOTE_ADDR'] !== '::1'
));
if (IS_LOCAL_ENV === true) {
    define('DATABASE', [
        'DSN' => 'mysql:dbname=slack_todo;host=localhost',
        'USER' => 'admin',
        'PASS' => 'admin'
    ]);
} else {
    define('DATABASE', [
        'DSN' => 'mysql:dbname=id7118233_slack_todo;host=localhost',
        'USER' => 'id7118233_rddeveloper7',
        'PASS' => 'rddeveloper7_database'
    ]);
}
define('MESSAGES', [
    'TODO_ADDED_ERR' => 'Todo couldn\'t be added',
    'TODO_ADDED' => 'Todo added',
    'TODO_MARKED_DONE' => 'Todo marked as done',
    'TODO_MARKED_ERR' => 'Todo couldn\'t be marked as done',
    'TODO_NOT_FOUND' => 'Todo couldn\'t be marked as done',
    'NO_TODO_EXISTS' => 'Todo list is empty',
    'TODO_LIST' => 'Below is the list of todos: '
]);
if (IS_LOCAL_ENV === true) {
    // add todo demo post data
    define('addtodo', json_decode('{"token":"sFQEvNgHhIOhzDaoXf24XsFz","team_id":"TCRJKL3CZ","team_domain":"fullstackrd","channel_id":"DCT7JH687","channel_name":"directmessage","user_id":"UCREB2HME","user_name":"rddeveloper7","command":"\/addtodo","text":"this is messges\'as","response_url":"https:\/\/hooks.slack.com\/commands\/TCRJKL3CZ\/434626591700\/e4goVPvCXisJ34IdkUupqL59","trigger_id":"434717569491.433631683441.a4dbf96dc199abeafda620e12e15259b","status":"hitted"}', 1));
    define('marktodo', json_decode('{"token":"sFQEvNgHhIOhzDaoXf24XsFz","team_id":"TCRJKL3CZ","team_domain":"fullstackrd","channel_id":"DCT7JH687","channel_name":"directmessage","user_id":"UCREB2HME","user_name":"rddeveloper7","command":"\/marktodo","text":"this is test task","response_url":"https:\/\/hooks.slack.com\/commands\/TCRJKL3CZ\/435011125298\/FY8FqmHEF4qhoZiiUEiqnidb","trigger_id":"434430567937.433631683441.3c1db813eca5edea86f79797b2979547","custom-action":"marktodo"}', 1));
    define('listtodos', json_decode('{"token":"sFQEvNgHhIOhzDaoXf24XsFz","team_id":"TCRJKL3CZ","team_domain":"fullstackrd","channel_id":"DCT7JH687","channel_name":"directmessage","user_id":"UCREB2HME","user_name":"rddeveloper7","command":"\/listtodos","text":"","response_url":"https:\/\/hooks.slack.com\/commands\/TCRJKL3CZ\/434286507392\/jwQ4CsfIHPq934ru7lpubwvs","trigger_id":"435011443810.433631683441.828ac633031dba812e3ac802eee51e71","custom-action":"listtodos"}', 1));
}