<?php
use core\App;
use core\Database;

$db = App::resolve(Database::class);


$note = $db->query(
  query: "select * from notes where id=:id", 
  params: [
    'id' => $_GET['id']
  ]
)->get(abortWhenFail: true);


$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);


load_view(
 "notes/show.view.php",
  [
    'heading' => htmlspecialchars($note['title']),
    'content' => htmlspecialchars($note['body']),
    'noteId' => $_GET['id']
  ]
);
