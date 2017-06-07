<?php


$route = $_SERVER['REQUEST_URI'];
if (strchr($_SERVER['REQUEST_URI'], '?')) {

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
   
	include_once 'controller/' . $controllerName . '.php';
   
    $controllerNamespace = 'App\\Controller\\' . $controllerName;
    $controller = new $controllerNamespace;

    call_user_func_array([$controller, $method], []);
} else {
	echo 'Error: controller "controller/' . $controllerName . '.php" not found.';
}

