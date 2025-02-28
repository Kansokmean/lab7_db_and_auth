<?php
require_once 'config/database.php';

class labSeven {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("Database connection failed: " . $err->getMessage());
        }
    }

    function create($tbname, $data) {
        try {
            $fields = implode(", ", array_keys($data));
            $placeholders = ":" . implode(", :", array_keys($data));

            $sql = "insert into $tbname ($fields) values ($placeholders)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($data);
            echo "Create successfully </br>";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function update($tbname, $data, $column, $value) {
        try {
            $checkSql = "select count(*) from $tbname where $column = :value";
            $checkStmt = $this->pdo->prepare($checkSql);
            $checkStmt->execute(['value' => $value]);
            $count = $checkStmt->fetchColumn();
    
            if ($count > 0) {
                $setClause = "";
                foreach ($data as $field => $val) {
                    $setClause .= "$field = :$field, ";
                }
                $setClause = rtrim($setClause, ", ");
                $sql = "update $tbname set $setClause where $column = :value";
                $stmt = $this->pdo->prepare($sql);
    
                $data['value'] = $value;
                $stmt->execute($data);
    
                echo "Update successfully";
            } else {
                echo "Error: Record not found!";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    function delete($tbname, $column, $value) {
        try {
            $checkSql = "select count(*) from $tbname where $column = :value";
            $checkStmt = $this->pdo->prepare($checkSql);
            $checkStmt->execute(['value' => $value]);
            $count = $checkStmt->fetchColumn();
    
            if ($count > 0) {
                $sql = "delete from $tbname where $column = :value";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['value' => $value]);
    
                echo "Delete successfully";
            } else {
                echo "Error: Record not found!";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    

    function getAll($tbname) {
        try {
            $sql = "select * from $tbname";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo  json_encode($data);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function getById($tbname, $column, $value) {
        try {
            $sql = "select * from $tbname where $column = :value";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['value' => $value]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                echo  json_encode($data);
            } else {
                echo "No record found.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function login($tbname, $username, $password) {
        try {
            $sql = "select * from $tbname where username = :username";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['username' => $username]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                if (password_verify($password, $data['password'])) {
                    echo "Login successfully!";
                } else {
                    echo "Wrong password!";
                }
            } else {
                echo "User not found!";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
