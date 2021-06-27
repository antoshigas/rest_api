<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Controller\Api\DeviceController;

require 'vendor/autoload.php';
require __DIR__ . "/inc/config.php";

echo (new DeviceController())->run();