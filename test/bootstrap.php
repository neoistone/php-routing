<?php

require_once __DIR__ . '/../src/functions.php';

spl_autoload_register(function ($class) {
    if (strpos($class, 'Neoistone\\') === 0) {
        $dir = strcasecmp(substr($class, -4), 'Test') ? 'src/' : 'test/';
        $name = substr($class, strlen('Neoistone'));
        require __DIR__ . '/../' . $dir . strtr($name, '\\', DIRECTORY_SEPARATOR) . '.php';
    }
});
