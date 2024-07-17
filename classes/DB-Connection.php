<?php
require_once '../config.php';
require_once '../vendor/autoload.php'; // Include Composer's autoloader
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DBConnection
{
    private $sServername = DB_HOST;
    private $sUsername = DB_USER;
    private $sPassword = DB_PASSWORD;
    private $sDatabase = DB_DATABASE;
    public $conn;

    function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $config = new Configuration();
            $connectionParams = [
                'dbname' => $this->sDatabase,
                'user' => $this->sUsername,
                'password' => $this->sPassword,
                'host' => $this->sServername,
                'driver' => 'pdo_mysql', // Change this based on your database type
            ];
            $this->conn = DriverManager::getConnection($connectionParams, $config);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

}
