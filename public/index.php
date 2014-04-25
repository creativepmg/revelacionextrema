<?php

require_once '../vendor/autoload.php';
Mustache_Autoloader::register();

$mustache = new Mustache_Engine(array(
    // 'template_class_prefix' => '__MyTemplates_', // default: __Mustache_
    'cache' => dirname(__FILE__).'/../cache',
    'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
    'cache_lambda_templates' => true,
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/../views'),
    'partials_loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/views/partials'),
    'helpers' => array('i18n' => function($text) {
        // do something translatey here...
    }),
    'escape' => function($value) {
        return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
    },
    'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
    'strict_callables' => true,
));

$tpl = $mustache->loadTemplate('index'); // loads __DIR__.'/../views/index.mustache';
echo $tpl->render(array('bar' => 'Este es el texto'));
?>
Lo que sea