<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['home'] = 'nmapController/index';
$route['do'] = 'nmapController/executeCommand';

$route['logout'] = 'auth/logout';
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
