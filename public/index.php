<?php

// Autoload Composer
require_once __DIR__.'/../vendor/autoload.php';

//Init silex application
$app = new Silex\Application();


//Debug
$app['debug'] = true;

//load config
require_once __DIR__.'/../config/database.php';

//init Database
$app['sql'] = new Blog\Sql(
    $config['server'],
    $config['database'],
    $config['id'],
    $config['password']
);

//Register twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

//Création route home
$app->get('/', function () use ($app) {
    $c = new HomeController($app);
    return $c->getIndex();
});

//Création route /admin
$app->get('/admin', function () use ($app) {
    $c = new AdminController($app);
    return $c->getArticle();
});

//route post /admin
$app->post('/admin', function () use ($app) {
    $c = new AdminController($app);
    return $c->postArticle();
});

//run app
$app->run();
