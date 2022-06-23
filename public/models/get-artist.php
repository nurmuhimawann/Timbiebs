<?php

require_once 'connection.php';

class Artist
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->db->connect_error) {
            http_response_code(500);
            die("Database connection error: {$this->db->connect_error}");
        }
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function getAll()
    {
        $query = "SELECT * FROM artist";
        $sql = $this->db->query($query);

        $data = [];
        foreach ($sql as $row) {
            $data[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}


$artist = new Artist();
$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
    case 'getAll':
        $artist->getAll();
        break;
    default:
        $artist->getAll();
        break;
}
