<?php
$router->post('/persons', 'PersonsController@store');
$router->get('/persons', 'PersonsController@index');
$router->get('/persons/{id}', 'PersonsController@show');
