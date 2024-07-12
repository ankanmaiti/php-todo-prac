<?php

use core\App;
use core\Database;
use core\Router;

$db = App::resolve(Database::class);

$note = $db->query(
  query: "select * from notes where id=:id", 
  params: [
    'id' => $_GET['id']
  ]
)->get(abortWhenFail: true);

// authorization
$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);


//delete the note
$db->query(
  query: "delete from notes where id=:id",
  params: [
    'id' => $_POST['noteId']
  ]
);

Router::redirect('/notes');
