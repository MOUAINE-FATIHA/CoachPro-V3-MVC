<?php
use Core\Router;
$router->get('/sport-mvc/public/', 'HomeController@index');
$router->get('/sport-mvc/public/login', 'AuthController@login');
$router->post('/sport-mvc/public/login', 'AuthController@login');
$router->get('/sport-mvc/public/register', 'AuthController@register');
$router->post('/sport-mvc/public/register', 'AuthController@register');


$router->get('/sport-mvc/public/coach/dashboard', 'CoachController@dashboard');
$router->get('/sport-mvc/public/coach/profile', 'CoachController@profile');
$router->get('/sport-mvc/public/coach/seances', 'CoachController@seances');

$router->get('/sport-mvc/public/coach/seances/create', 'CoachController@createSeance');
$router->post('/sport-mvc/public/coach/seances/create', 'CoachController@createSeance');

$router->get('/sport-mvc/public/coach/reservations', 'CoachController@reservations');
$router->get('/sport-mvc/public/coach/profile', 'CoachController@profile');
$router->post('/sport-mvc/public/coach/profile/update', 'CoachController@updateProfile');



$router->get('/sport-mvc/public/sportif/dashboard', 'SportifController@dashboard');
?>