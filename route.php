<?php
    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case '/':
            require __DIR__.'Index.php';
            break;
        case '/login':
            require __DIR__.'loginpage.php';
            break;
        case '/register':
            require __DIR__.'registerpage.php';
            break;
    }
?>