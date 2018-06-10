<?php
use DI\ContainerBuilder;
use Aura\SqlQuery\QueryFactory;
use League\Plates\Engine;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    Engine::class => function() {
        return new Engine('../app/views');
    },
    QueryFactory::class => function() {
        return new QueryFactory('mysql');
    },
    PDO::class => function() {
        return new PDO('mysql:host=localhost;dbname=marlin', 'root', '');
    }
]);

$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/notes', ["App\HomeController", "index"]);
    $r->addRoute('GET', '/notes/{id}', ["App\HomeController", "show"]);
    $r->addRoute('GET', '/note/{id}', ["App\HomeController", "edit"]);
    $r->addRoute('GET', '/create', ["App\HomeController", "create"]);
    $r->addRoute('POST', '/store', ["App\HomeController", "store"]);
    $r->addRoute('POST', '/update/note/{id}', ["App\HomeController", "update"]);
    $r->addRoute('GET', '/delete/note/{id}', ["App\HomeController", "delete"]);

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        dd('Page not found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        dd('Method Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        $container->call($handler, $vars);
        break;
}
