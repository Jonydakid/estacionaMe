<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '36360112674-fhdp3m1btvr00fsefv4rsnieo2u0vuov.apps.googleusercontent.com';
$config['google']['client_secret']    = 'tQ2eDk_oKT6TEvVCo5849l19';
$config['google']['redirect_uri']     = 'gauth';
$config['google']['application_name'] = 'estaci-on';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();