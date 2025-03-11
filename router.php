<?php

require_once("./config/routes.php");

$availableRoutesNames = array_keys(AVLAIBLE_ROUTES);

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutesNames , true)){
    $page_name = $_GET['page'];
    $controller = AVLAIBLE_ROUTES[$page_name]["template"];
    $seo = AVLAIBLE_ROUTES[$page_name]["seo"];

}
else{
    $controller = DEFAULT_ROUTE["template"];
    $seo = DEFAULT_ROUTE["seo"];
}


require './Controller/' . $controller;