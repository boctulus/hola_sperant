<?php


function get_api_key_from_request() 
{
    $headers = apache_request_headers();    
    return $headers['X-API-KEY'] ?? null;
}

