<?php
include('autoload.php');

use Routing\Route;
use Controllers\Api\SiteController;

//API routes
Route::add('/api/getStatistics/([0-9]+)',function($id){
    $controller = new SiteController();
    return $controller->getStatistics($id);
});

Route::run('/');