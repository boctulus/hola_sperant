<?php

namespace boctulus\SW\controllers;

class Saludator
{
    function saludar(){
        dd('Te saludo');
    }

    function insultar(){
        return 'Te insulto';
    }

    function index(){
        return 'Saludo generico';
    }
}