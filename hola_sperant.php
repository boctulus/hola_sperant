<?php

use boctulus\SW\core\Router;

/*
	Plugin Name: Hola Sperant
	Description: 
	Version: 0.0.1
	Author: hola! and boctulus
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

require_once __DIR__ . '/app.php';


register_activation_hook( __FILE__, function(){
	require_once __DIR__ . '/on_activation.php';
});

db_errors(false);


require_once __DIR__ . '/main.php';

/*
	Router
*/

$routes = include __DIR__ . '/config/routes.php';

Router::routes($routes);
Router::getInstance();
