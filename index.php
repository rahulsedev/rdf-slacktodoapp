<?php
require 'vendor/autoload.php';
require 'config.php';
require 'TodoInterface.php';
require 'Todo.php';

Flight::register('Todo', 'Todo', [], function($todo) {
});

Flight::route('/', function() {
});

Flight::route('/addtodo', function($route) {
    if (IS_LOCAL_ENV === true)
    $_POST = defined('addtodo') ? addtodo : [];
    
    return Flight::Todo()->addtodo($_POST??[]);
}, true);

Flight::route('/marktodo', function($route) {
    if (IS_LOCAL_ENV === true)
    $_POST = defined('marktodo') ? marktodo : [];    
    
    return Flight::Todo()->marktodo($_POST??[]);
}, true);

Flight::route('/listtodos', function($route) {
    if (IS_LOCAL_ENV === true)
    $_POST = defined('listtodos') ? listtodos : [];
    
    return Flight::Todo()->listtodos($_POST??[]);
}, true);
Flight::start();
  