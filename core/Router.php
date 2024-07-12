<?php

namespace core;


class Router {
  protected $routes = [];

  protected function add(string $method, string $url, string $controller) {

    $this->routes[] = [
      "url" => $url,
      "controller" => $controller,
      "method" => $method,
    ]; 

  }

  public function get(string $url, string $controller) {
    $this->add('GET', $url, $controller);
  }

  public function post(string $url, string $controller) {
    $this->add('POST', $url, $controller);
  }

  public function put(string $url, string $controller) {
    $this->add('PUT', $url, $controller);
  }

  public function patch(string $url, string $controller) {
    $this->add('PATCH', $url, $controller);
  }

  public function delete(string $url, string $controller) {
    $this->add('DELETE', $url, $controller);
  }

  public function route(string $url, string $method) {
    foreach ($this->routes as $route) {

      if($route['url'] === $url && $route['method'] === strtoupper($method)) {
        return require base_path('controllers/' . $route['controller']);
      }
    }
    // abort
    $this->abort();
  }

  public static function abort(int $statusCode = 404) {
      http_response_code($statusCode);
      require base_path("views/{$statusCode}.view.php");
      die();
  }

  public static function redirect(string $url, bool $isPermanent = true) {

    // either permanent or temporary
    $status = $isPermanent ? Response::MOVED_PERMANENTLY : Response::FOUND;

    header('location: ' . $url, true, $status);
    die();
  }
}
