<?php
use core\App;
use core\Database;

$db = App::resolve(Database::class);



$notes = $db->query(
  query: "select * from notes where user_id=:userId",
  params: [ 'userId' => 1 ]
)->get(many: true);



load_view(
  'notes/index.view.php', 
  [
    'heading' => 'Notes',
    'notes' => $notes
  ]
);
