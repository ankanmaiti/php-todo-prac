<?php

namespace core;

use PDO;

// connect to the mysql database
// execute query
class Database {
  /** @var PDO Database connection instance */
  public $connection;

  /** @var PDOStatement|null Prepared statement object */
  public $statement = null;


  /**
     * @param array $config An associative array containing database configuration:
     *                      - host: Hostname of the database server
     *                      - port: Port number of the database server
     *                      - dbname: Name of the database
     *                      - charset: Character set used for the connection
     * @param string username for the database connection
     * @param string password for the database connection
    */
  public function __construct(array $config ) {
    // separating username & password
    // since $dsn shoudn't get username & password
    $username = $config['username']; 
    $password = $config['password'];

    unset($config['username']);
    unset($config['password']);

    // creating $dsn
    // look like : "mysql:host=localhost;port=3306;dbname=myapp"
    $dsn = 'mysql:'. http_build_query(
      data: $config,
      arg_separator: ';'
    ); 

    $this->connection = new PDO(
      dsn: $dsn, 
      username: $username, 
      password: $password, 
      options: [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ]
    );
  } 
  
  public function query(string $query, ?array $params = []): self {
    
    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);
    
    return $this;
  }

  public function get(bool $many = false, bool $abortWhenFail = false) : ?array {
    $res = $many ? $this->statement->fetchAll(): $this->statement->fetch();

    if ($abortWhenFail && !$res) {
      abort(Response::NOT_FOUND);
    }

    return !!$res ? $res : [];
  }

}
