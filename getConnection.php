<?php
class connectionHandle {
  private static $instance = null;
  private $conn;

  private $host = 'localhost';
  private $user = 'gscchurc_test_user';
  private $pass = 'Hunter#695';
  private $name = 'gscchurc_GSC_Forms';

  // 🔒 Private constructor prevents direct instantiation
  private function __construct() {
    $this->conn = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->pass);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  // 🚪 Public static method to access the instance
  public static function getInstance() {
    if (self::$instance === null) {
      self::$instance = new connectionHandle();
    }
    return self::$instance;
  }

  // 🔌 Create connection
  public function connectionHandle() {
    return $this->conn;
  }

  // 🛡️ No cloning
  private function __clone() {}

  // 🛡️ No unserialization
  private function __wakeup() {}
}
