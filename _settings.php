<?php
/**
 * Created by PhpStorm.
 * User: sTaRs
 * Date: 13.04.2017
 * Time: 11:52
 */

Use Zehir\Settings\Setup;

date_default_timezone_set('Europe/Istanbul');

Setup::configure([
    'test' => Array(
        'host' => 'localhost',
        'name' => 'product',
        'user' => 'root',
        'pass' => '',
        'port' => 3306,
        'adapter' => 'mysql'
    ),
]);

Setup::$SMTP = [
    'Host' => 'localhost',
    'SMTPAuth' => true,
    'Username' => 'localhost',
    'Password' => 'localhost',
    'Port' => 587,
    'DevMail' => 'seyhan@digitalpanzehir.com'
];

define('base', __DIR__);
function initial()
{
    if (defined('DEVMOD') && DEVMOD || Setup::$target != 'prod') {
        // test ve geliştirme ortamı ayarları
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        Setup::addCustom('sendSms', false);
    } else {
        // PRODUCT Mod ayarları
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
        Setup::$redis = true;
    }
}

function available_queue()
{
    $setting = Setup::getConnectionsSettings();
    return (Setup::custom('queue') && isset($setting['mq'])) ? true : false;
}