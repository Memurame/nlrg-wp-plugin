<?php


require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/NLRG/class.churchtools.php';

use \NLRG\ChurchTools\RestApi as ChurchTools;

$ini = parse_ini_file('config.ini');

$api = new ChurchTools($ini['ct_url'], $ini['ct_token']);
$api->getEvents('20211111', 6, ['gottesdienst']);



?>
