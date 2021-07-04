<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'pages/login';
$route['login'] = 'pages/login';
$route['signup'] = 'pages/signup';
$route['user/register'] = 'CompleteRegistration/register';
$route['user/complete'] = 'CompleteRegistration/complete';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
