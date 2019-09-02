<?php

use  Zehir\Settings\Setup as setup;
use  Zehir\System\App;

include "../vendor/autoload.php";
include "../_settings.php";

setup::$bundles = [
    'zehir' => 'zehir'
];

Setup::$search_extend = ['pages' => 'page'];
Setup::$enableLanguages = [
    ['id' => 1, 'lang' => 'TR', 'text' => 'TÜRKÇE'],
    ['id' => 3, 'lang' => 'DE', 'text' => 'DEUTSCH'],
    ['id' => 2, 'lang' => 'EN', 'text' => 'ENGLISH'],
    ['id' => 6, 'lang' => 'ES', 'text' => 'ESPAÑOL'],
    ['id' => 4, 'lang' => 'FR', 'text' => 'FRANÇAIS'],
    ['id' => 5, 'lang' => 'IT', 'text' => 'ITALIANO'],
    ['id' => 8, 'lang' => 'NL', 'text' => 'NEDERLANDS'],
    ['id' => 7, 'lang' => 'PT', 'text' => 'PORTUGUÊS'],
];
Setup::$langId = 1; //default langId

Setup::$installParameters = ['pages'];
//çoklu dil devrede
Setup::$multiLang = true;

initial();
App::run();