<?php

class Concert
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "timbiebs");

        if ($this->db->connect_error) {
            http_response_code(500);
            die("Database connection error: {$this->db->connect_error}");
        }
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function read()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $query = "SELECT * FROM concert ORDER BY concert_name ASC LIMIT {$page}, 6";
        $sql = $this->db->query($query);

        $data = [];
        while ($row = $sql->fetch_assoc()) {
            if (file_exists("../asset/img/card/{$row['concert_id']}.png")) {
                $row['image'] = "../asset/img/card/{$row['concert_id']}.png";
            } else {
                $row['image'] = "../asset/img/primary.png";
            }
            array_push($data, $row);
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function create($data)
    {
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = strlen($value) > 0 ? $value : NULL;
        }

        $query = "INSERT INTO concert VALUES (NULL, ?, ?, ?, ?, ?, ?)";

        $sql = $this->db->prepare($query);
        $sql->bind_param(
            'ssisss',
            $data['concert_name'],
            $data['description'],
            $data['artist_id'],
            $data['date'],
            $data['venue'],
            $data['country'],
        );

        try {
            $sql->execute();
        } catch (Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }

        $sql->close();
    }

    public function detail($id)
    {
        $query = "SELECT * FROM concert WHERE concert_id = {$id}";
        $sql = $this->db->query($query);

        $data = $sql->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function update($data)
    {
        foreach ($data as $key => $value) {
            $value = is_array($value) ? trim(implode(',', $value)) : trim($value);
            $data[$key] = strlen($value) > 0 ? $value : NULL;
        }

        $query = "UPDATE concert SET concert_name = ?, description = ?, artist_id = ?, date = ?, venue = ?, country = ? WHERE concert_id = ?";

        $sql = $this->db->prepare($query);

        $sql->bind_param(
            'ssisssi',
            $data['concert_name'],
            $data['description'],
            $data['artist_id'],
            $data['date'],
            $data['venue'],
            $data['country'],
            $data['concert_id']
        );

        try {
            $sql->execute();
        } catch (Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }

        $sql->close();
    }

    public function delete($id)
    {
        $query = "DELETE FROM concert WHERE concert_id = ?";
        $sql = $this->db->prepare($query);

        $sql->bind_param("i", $id);

        try {
            $sql->execute();
        } catch (Exception $e) {
            $sql->close();
            http_response_code(500);
            die($e->getMessage());
        }

        $sql->close();
    }

    public function search($data)
    {
        $query = "SELECT * FROM concert INNER JOIN
        artist ON concert.artist_id = artist.artist_id
        WHERE concert_name LIKE '%{$data['concert_name']}%' AND artist_name LIKE '%{$data['artist']}%' AND country LIKE '%{$data['country']}%' ORDER BY {$data['sort']}";

        $sql = $this->db->query($query);

        $data = [];
        while ($row = $sql->fetch_assoc()) {
            if (file_exists("img/{$row['concert_id']}.png")) {
                $row['image'] = "img/{$row['concert_id']}.png";
            } else {
                $row['image'] = "../static/img/primary.png";
            }
            array_push($data, $row);
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}

$concert = new Concert();
$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
    case 'create':
        $concert->create($_POST);
        break;
    case 'detail':
        $concert->detail($_GET['id']);
        break;
    case 'update':
        $concert->update($_POST);
        break;
    case 'delete':
        $concert->delete($_POST['id']);
        break;
    case 'search':
        $concert->search($_POST);
        break;
    default:
        $concert->read();
        break;
}
