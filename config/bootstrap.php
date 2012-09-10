<?php

ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);

define('LIBRARY_PATH', APP_PATH . DS . 'libraries');

// 1. sanitise (remove magic quotes, slashes, global vars)
// 2. do the routing - convert path into controller and action
// 3. autoload objects
// 4. error level/reporting

// include routes
$routes = array();
$routes['#^/$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/home$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/home/index$#i'] = array('controller' => 'home', 'action' => 'index');
$routes['#^/form1$#i'] = array('controller' => 'form1', 'action' => 'view');
$routes['#^/form1/view$#i'] = array('controller' => 'form1', 'action' =>'view');

?>

