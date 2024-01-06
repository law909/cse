<?php

$router->map('GET', '', 'homeController#view');
$router->map('POST', '/search', 'searchController#search');