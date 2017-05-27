<?php

// get the request uri (ex. /catalog/shoes?filter-brand=adidas)
$route = $_SERVER['REQUEST_URI'];
if (strchr($_SERVER['REQUEST_URI'], '?')) {
	// /catalog/shoes?filter-brand=adidas => $route = /catalog/shoes
	$route = strstr($route, '?', true);
}

if ($route === '/') {
	// go to default action (was set in index.php)
	$action = $defaultAction;
} else {
	// search in routes array (in its keys)
	if (!in_array($route, array_keys($routes))) {
		// route not found, run page not found action (ex.: IndexController@pageNotFound)
		$action = $pageNotFoundAction;
	} else {
		// run action (ex.: IndexController@index)
		$action = $routes[$route];
	}
}

// ex.: $controllerName = IndexController, $method = index. explode('@', 'IndexController@index') === ['IndexController', 'index']
list($controllerName, $method) = explode('@', $action);
if (file_exists('controller/' . $controllerName . '.php')) {
    // asta da eroare pt ca nu mai exista clasa IndexController;
    // cand i-ai pus namespace a devenit App\Controller\IndexController
    // !!! maxima atentia la case sensitivity (litera mare sau mica). pe windows nu tine cont. pe linux da eroare. controller !== Controller
	include_once 'controller/' . $controllerName . '.php';
    // aici e erorare la linia de jos
    // $controller = new IndexController - gresit
    // $controller = new App\Controller\IndexController - corect
    $controllerNamespace = 'App\\Controller\\' . $controllerName;
    $controller = new $controllerNamespace;
    // ai inteles? ish

    // call controller->method (ex.: IndexController->index())
    call_user_func_array([$controller, $method], []);
} else {
	echo 'Error: controller "controller/' . $controllerName . '.php" not found.';
}

//aici parsez rutele
// aici