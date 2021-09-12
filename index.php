<?php

require __DIR__ . '/vendor/autoload.php';


use Cg\Http\Routing\Route;
use Cg\Controllers\Api\SiteController;

//API routes
Route::add('/api/getStatistics/([0-9]+)', function ($id) {
    $controller = new SiteController();
    return $controller->getStatistics($id);
});

Route::add('/api/getPageViews/([0-9]+)', function ($id) {
    $controller = new SiteController();
    return $controller->getPageViews($id);
});

Route::add('/api/getLocations/([0-9]+)', function ($id) {
    $controller = new SiteController();
    return $controller->getLocations($id);
});


Route::run('/');