<?php
use core\App;
use core\Database;
use core\Validator;
use core\Router;


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// validate form inputs
$errors = [];

if (!Validator::email( $email )) {
  $errors['email'] = 'invalid email';    
}

if (!Validator::string( $password, 7, 10 )) {
  $errors['password'] = 'invalid password';    
}

// if error then display error
if(!!$errors) {

  load_view(
    'auth/create.view.php', 
    [
      'errors' => $errors
    ]
  );

  die();
}

// check if already exists
$db = App::resolve(Database::class);

$user = $db->query(
  'select * from users where email=:email',
  [
    'email' => $email,
  ]
)->get();

// if yes then redirect to login page
if ($user) {
  Router::redirect('/');
}

// if not then save in db and then log the user and redirect

$db->query(
  'insert into users (name, email, password) values (:name, :email, :password)',
  [
    'name' => $name,
    'email' => $email,
    'password' => $password
  ]
);

// after register login / mark the user as login
$_SESSION['user'] = [
  'name' => $name,
  'email' => $email,
];

Router::redirect('/notes');
