<?php

namespace Neoistone;

require __DIR__ . '/functions.php';

spl_autoload_register(function ($class) {
    if (strpos($class, 'Neoistone\\') === 0) {
        $name = substr($class, strlen('Neoistone'));
        require __DIR__ . strtr($name, '\\', DIRECTORY_SEPARATOR) . '.php';
    }
});
