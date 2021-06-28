<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/login';
$route['user/complete'] = 'user/complete';
$route['user/(.+)'] = 'user/user_pages/$1';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
