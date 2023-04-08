<?php

global $wpdb;

use boctulus\SW\core\libs\DB;
use boctulus\SW\core\libs\Files;
use boctulus\SW\core\libs\Schema;

/*
    php install.php {crear_tablas} {ejecutar_seeders}

    0 0  no crea tablas ni ejecuta seeders
    1 0 crea tablas
    1 1 crea tablas y ejecuta seeders

    * Los parametros son posicionales
*/


$config = include __DIR__ . "/../config/config.php";

try {
    $mode = config()['debug'] ? 'development' : 'production';

    Files::logger('Installing plugin...');
    Files::logger("Mode: $mode");

    DB::getConnection();

    $table = "{$wpdb->prefix}xxxxxxx";

    // Tabla de interacciones
    if (Schema::hasTable($table)) {
        Files::logger("Dropping old table '$table' ...");
        DB::statement("DROP TABLE `$table`");
    }

    if (!Schema::hasTable($table)){
        Files::logger("Creating table '$table'...");
    }   
    
    DB::statement(
        "CREATE TABLE IF NOT EXISTS ........"
    );

} catch (\Throwable $th) {
    if (env('MODE') == 'development'){
        if (isset($model)){
            _dd($model->getLog());
        }
    }

    Files::logger($th->getMessage() . "Statement: ". DB::getLog());
}
