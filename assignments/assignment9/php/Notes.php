<?php
require_once '../classes/Db_conn.php';
require_once '../classes/Pdo_methods.php';

class Notes extends PdoMethods {

    public function addNote($noteContent, $dateTime) {
        if (empty($noteContent) || empty($dateTime)) {
            return "Both note and date/time are required!";
        }

        $timestamp = date("Y-m-d H:i:s", strtotime($dateTime)); 

        $sql = "INSERT INTO notes (note_content, created_at) VALUES (:noteContent, :timestamp)";
        $bindings = [
            [":noteContent", $noteContent, "str"],
            [":timestamp", $timestamp, "str"]
        ];

        $result = $this->otherBinded($sql, $bindings);

        if ($result === 'noerror') {
            return "Note added successfully!";
        } else {
            return "Error adding note!";
        }
    }

    public function getNotes($startDate, $endDate) {
        if (empty($startDate) || empty($endDate)) {
            return "Both start and end date are required!";
        }

        $sql = "SELECT * FROM notes WHERE created_at BETWEEN :startDate AND :endDate ORDER BY created_at DESC";
        $bindings = [
            [":startDate", $startDate, "str"],
            [":endDate", $endDate, "str"]
        ];

        $notes = $this->selectBinded($sql, $bindings);

        if ($notes === 'error') {
            return "Error fetching notes!";
        }

        return $notes;
    }
}
?>
