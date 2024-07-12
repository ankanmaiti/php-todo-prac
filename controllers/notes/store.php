<?php

use core\App;
use core\Database;
use core\Validator;
use core\Router;

$db = App::resolve(Database::class);
$errors = [];


if (!Validator::string( value: $_POST['title'], max: 100)) {
  $errors['title'] = 'need only 100 chars';    
}

// if error then display error
if(!!$errors) {

  load_view(
    'notes/create.view.php', 
    [
      'heading' => 'Create Note',
      'errors' => $errors
    ]
  );

  die();
}


$db->query(
  'INSERT INTO notes(user_id, title, body) VALUES (:userId, :title, :body)',
  [
    'userId' => 1,
    'title' => $_POST['title'],
    'body' => $_POST['body']
  ]
);


Router::redirect('/notes');
