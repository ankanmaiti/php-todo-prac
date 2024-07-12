<?php
use core\App;
use core\Database;
use core\Validator;
use core\Router;

$db = App::resolve(Database::class);

// find the corrosponding note
$note = $db->query(
  query: "select * from notes where id=:id", 
  params: [
    'id' => $_POST['id']
  ]
)->get(abortWhenFail: true);

// authorization
$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);

// validate form
$errors = [];

if (!Validator::string( value: $_POST['title'], max: 100)) {
  $errors['title'] = 'need only 100 chars';    
}

// if error then display error
if(!!$errors) {

  load_view(
    'notes/edit.view.php', 
    [
      'heading' => 'Create Note',
      'errors' => $errors,
      'note' => $note
    ]
  );

  die();
}

// update in db
$db->query(
  "update notes set body=:noteBody where id=:noteId",
  [
    "noteId" => $_POST['id'],
    "noteBody" => $_POST['body'],
  ]
);

// redirect
Router::redirect('/notes');
