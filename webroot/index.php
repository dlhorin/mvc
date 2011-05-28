<?php

define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', dirname(dirname(__FILE__)));

$url = '/';
if (isset($_GET['url'])) {
  $url .= $_GET['url'];
}

require_once (APP_PATH . DS . 'config' . DS . 'bootstrap.php');

// run dispatcher

$routed = false;
foreach ($routes as $route_regex => $path) {

  $matches = array();
  // if (preg_match($route_regex, $url, $matches, PREG_OFFSET_CAPTURE, 1)) {
  if (preg_match($route_regex, $url, $matches)) {
    $route = $path;
    $routed = true;
  }
}

if (!$routed) {
  echo 'route does not exist';
  exit;
}

$controller = ucfirst($route['controller']) . 'Controller';
$action = $route['action'];
$params = array();
if (isset($matches[1])) {
  $params['id'] = $matches[1];
}

require_once(APP_PATH . '/controllers/' . $controller . '.php');

$dispatch = new $controller();

if ((int)method_exists($controller, $action)) {
  call_user_func_array(array($dispatch, $action), $params);
} else {
  echo 'action ' . $action . ' is not defined';
  exit;
}