<?php


// Define your routes and corresponding actions/pages
// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/contact' => 'controllers/contact.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/notes/create' => 'controllers/notes/create.php',
//     '/note' => 'controllers/notes/show.php',
// ];
//
//
//

// static pages
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'about.php');

// notes pages
$router->get('/notes', 'notes/index.php');

$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

// auth pages
$router->get('/register', 'auth/create.php');
$router->post('/register', 'auth/store.php');
