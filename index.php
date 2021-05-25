<?php

require_once 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('products', 'DefaultController');
Routing::get('recipes', 'DefaultController');
Routing::get('account', 'DefaultController');
Routing::get('productForm', 'DefaultController');
Routing::get('recipeForm', 'DefaultController');
Routing::get('map', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addProduct', 'ProductController');
Routing::post('addRecipe', 'RecipeController');

Routing::run($path);

