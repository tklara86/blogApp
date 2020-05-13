<?php

/**
 * PDO Databse Class
 * Connect to Database
 * Create prepared statements
 * Bind Values
 * Return rows and results
 */

class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $password = DB_PASSWORD;
  private $db_name = DB_NAME;
  // private $db_port = DB_PORT;

  private $connection;
  private $stmt;
  private $error;

  public function __construct()
  {
    // Set dsn
    // $dsn = 'pgsql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name . ';user=' . $this->user . ';password=' . $this->password . '';
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    // Create PDO instance
    try {
      $this->connection = new PDO($dsn, $this->user, $this->password, $options);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  // Prepare statement with query
  public function query($sql)
  {
    $this->stmt = $this->connection->prepare($sql);
  }

  // Bind values
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  // Execute the prepared statement
  public function execute()
  {
    return $this->stmt->execute();
  }

  // Get result set as associative array
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll();
  }

  // Get single record 
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch();
  }

  // Get row count
  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
