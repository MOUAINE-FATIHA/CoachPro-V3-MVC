<?php
use Core\Router;
$router->get('/sport-mvc/public/', 'HomeController@index');

//auth
$router->get('/sport-mvc/public/login', 'AuthController@login');
$router->post('/sport-mvc/public/login', 'AuthController@login');

$router->get('/sport-mvc/public/register', 'AuthController@register');
$router->post('/sport-mvc/public/register', 'AuthController@register');

$router->get('/sport-mvc/public/logout', 'AuthController@logout');

//coach
$router->get('/sport-mvc/public/coach/dashboard', 'CoachController@dashboard');

$router->get('/sport-mvc/public/coach/profile', 'CoachController@profile');
$router->post('/sport-mvc/public/coach/updateProfile', 'CoachController@updateProfile');

$router->get('/sport-mvc/public/coach/seances', 'CoachController@seances');
$router->get('/sport-mvc/public/coach/seances/create', 'CoachController@createSeance');
$router->post('/sport-mvc/public/coach/seances/create', 'CoachController@createSeance');
$router->get('/sport-mvc/public/coach/seances/edit', 'CoachController@editSeance');
$router->post('/sport-mvc/public/coach/seances/update', 'CoachController@updateSeance');
$router->get('/sport-mvc/public/coach/seances/delete', 'CoachController@deleteSeance');

$router->get('/sport-mvc/public/coach/reservations', 'CoachController@reservations');

//sportif
$router->get('/sport-mvc/public/sportif/dashboard', 'SportifController@dashboard');
$router->get('/sport-mvc/public/sportif/coaches', 'SportifController@coaches');
$router->get('/sport-mvc/public/sportif/seances', 'SportifController@seances');
$router->get('/sport-mvc/public/sportif/reserver', 'SportifController@reserver');
$router->get('/sport-mvc/public/sportif/history', 'SportifController@history');

$router->get('/sport-mvc/public/logout', 'AuthController@logout');

?>
