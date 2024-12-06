<?php
require_once 'DB.php';

class Todo
{
    private $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    // Barcha vazifalarni olish
    public function get()
    {
        $stmt = $this->db->conn->prepare("SELECT * FROM todo ORDER BY due_date ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ID bo'yicha vazifani olish
    public function getById($id)
    {
        $stmt = $this->db->conn->prepare("SELECT * FROM todo WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Vazifa qo'shish
    public function store($title, $due_date, $status)
    {
        $stmt = $this->db->conn->prepare("INSERT INTO todo (title, due_date, status) VALUES (:title, :due_date, :status)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':due_date', $due_date, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Vazifani yangilash
    public function update($id, $title, $due_date, $status)
    {
        $stmt = $this->db->conn->prepare("UPDATE todo SET title = :title, due_date = :due_date, status = :status WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':due_date', $due_date, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Vazifani o'chirish
    public function delete($id)
    {
        $stmt = $this->db->conn->prepare("DELETE FROM todo WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
