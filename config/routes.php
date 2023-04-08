<?php

/*
    Routes for Router

    Nota: la ruta mas general debe colocarse al final
*/

return [
    '/api/v1/greetings/hi'           => 'boctulus\SW\controllers\Saludator@saludar',
    '/api/v1/greetings/whore'        => 'boctulus\SW\controllers\Saludator@insultar',
    '/api/v1/greetings'              => 'boctulus\SW\controllers\Saludator',
];
