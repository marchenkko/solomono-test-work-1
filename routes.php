<?php

/**
 * @param $controller
 * @param $action
 * @return void
 */
function call($controller, $action)
{
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'main':
            require_once('models/category.php');
            require_once('models/products.php');
            $controller = new MainController();
            break;
    }

    $controller->{$action}();
}

$controllers = [
    'main' => ['home', 'getProductsByIdCategory'],
];

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('main', 'error');
    }
} else {
    call('main', 'error');
}