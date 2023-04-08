<?php

namespace boctulus\SW\models;

use boctulus\SW\core\libs\DB;

class ExampleModel 
{
    /*
        Devuelve array de operaciones pendientes de notificar por categoria
    */
    static function getEnqueuedOperationsByCategoryId(int $cat_id){
        return table('product_updates')
        ->where(["category_id" => $cat_id])
        ->orderByRaw("id DESC")
        ->get();
    }

    /*
        Devuelve array de user_ids suscriptos a una categoria 
    */
    static function getSubscriptedUsersByCategoryId(int $cat_id){
        $sql = table('user-categories')
        ->select(['user_id'])
        ->whereRaw("JSON_CONTAINS(`categories`, '?')", [$cat_id])
        ->dd();

        $rows = DB::select($sql);
        
        if ($rows === false){
            return [];
        }

        return array_column($rows, 'user_id');
    }

    static function getSubscriptedCategoriesByUserId(int $user_id){
        $categos = table('user-categories')
        ->select(['categories'])
        ->where([
            'user_id' => $user_id
        ])
        ->value('categories');

        return json_decode($categos);
    }
}