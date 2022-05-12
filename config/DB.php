<?php
require_once('query.php');

class Database {

    private static $db;
    private MySQLi $connection;

    private function __construct() {
        require_once('configDb.php');
        if(!isset($db_config)) {
            echo 'Не удалось подключить файл config.php';
            die();
        }
        $this->connection =
            new MySQLi
        (
            $db_config["servername"],
            $db_config["username"],
            $db_config["password"],
            $db_config["currentBase"]
        );
    }

    function __destruct() {
        $this->connection->close();
    }

    public static function getConnection()
    {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }
    public static function getPageCount($radio, $limit)
    {
        $query = getQuery($radio);
        $result_count = mysqli_query(self::getConnection(), $query);
        $total_pages = mysqli_num_rows($result_count);
        return ceil($total_pages / $limit);
    }
    public static function getPage($radio, $page_number, $limit = 20)
    {
        $query = getQuery($radio);
        $offset = ($page_number-1) * $limit;
        $query .= " LIMIT  $limit";
        $query .= " OFFSET $offset";
        return mysqli_query(self::getConnection(), $query);
    }


}