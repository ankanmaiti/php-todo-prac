<?php

use core\Response;
use core\Router;

// dump and die
function dd($dumpable)
{
    echo "<pre>";
    var_dump($dumpable);
    echo "</pre>";

    die();
}


function authorize(bool $condition, int $status = Response::FORBIDDEN): ?bool {
  if (! $condition) {
    Router::abort($status);
  }

  return $condition;
}

function base_path( string $path): string {
  return BASE_PATH . $path;
}

function load_view(string $path, array $attributes = []) {
  // turns assocoiative array a set of variables
  // where key is variable name
  extract(array: $attributes);

  require base_path("views/{$path}");
}
