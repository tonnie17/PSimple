<?php

include __DIR__ . '/config.php';

function autoloading($class)
{
    $importDirs = get_config()['import'];
    foreach ($importDirs as $key => $dir) {
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . '.php';
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $fileName);
        if (is_file($fileName)) {
            require_once $fileName;
        }
    }
}

spl_autoload_register('autoloading');
