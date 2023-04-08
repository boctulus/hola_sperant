<?php

use boctulus\SW\libs\Alia;
use boctulus\SW\core\libs\Date;
use boctulus\SW\core\libs\Files;
use boctulus\SW\core\libs\ApiClient;
use boctulus\SW\core\libs\Validator;
use boctulus\SW\libs\AliaBotQuestions;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (php_sapi_name() != "cli"){
	// return; 
}

require_once __DIR__ . '/app.php';

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', realpath(__DIR__ . '/../../..') . DIRECTORY_SEPARATOR);

	require_once ABSPATH . '/wp-config.php';
	require_once ABSPATH .'/wp-load.php';
}

/////////////////////////////////////////////////

// ...

function test_hola(){
	$client = ApiClient::instance()
	->setHeaders([
		'Authorization: PRHN5lqx7B5TraYBOjCv13U48tgNbqLJaRpI6m8S',
		'Content-Type: application/json'
	]);

	$client
	->disableSSL()
	//->cache()
	//->redirect()
	->setBody([
		"fname" => "Tomas",
		"lname" => "Cruz",
		"email" => "cruz_t@gmail.com",
		"input_channel_id" => 8,
		"source_id" => 2,
		"interest_type_id" => 4,
		"project_id" => 540,
		"extra_fields" => [
			"rango_de_presupuesto" => "2M-3M"
		]            
	])
	->setUrl('https://api.eterniasoft.com/v3/clients')
	->post()
	->getResponse();

	$status = $client->getStatus();

	if ($status != 201 && $status != 200){
		throw new \Exception($client->error());
	}

	dd(
		$client->data()         
	);  
}

test_hola();