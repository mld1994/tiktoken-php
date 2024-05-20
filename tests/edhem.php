<?php

require __DIR__ . '../../vendor/autoload.php';

// Define the autoloader
spl_autoload_register(function ($class) {    
    $prefix = 'Yethee\\Tiktoken\\';
    $base_dir = __DIR__ . '../../src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Use the class
use Yethee\Tiktoken\EncoderProvider;

$provider = new EncoderProvider();


$encoder = $provider->get('gpt2');
$tokens = $encoder->encode('Hello world!');
print_r($tokens);
// OUT: [15496, 995, 0]

