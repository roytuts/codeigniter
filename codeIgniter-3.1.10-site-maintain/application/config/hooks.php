<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_system'][] = array(
	'class' => 'site_offline', // name of the class - site_offline
	'function' => 'is_offline', // function which will be executed in the class - site_offline
	'filename' => 'site_offline.php', // filename for the class - site_offline
	'filepath' => 'hooks' // filepath - where the classfile resides
);