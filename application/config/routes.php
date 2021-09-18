<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'pages/login';
$route['login'] = 'pages/login';
// $route['admin/(.+)'] = 'admin/admin_pages/$1';
$route['admin/(.+)'] = 'admin/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
