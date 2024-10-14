<?php
session_start(); 

class AddNamesProc {
    private $names = [];

    
    public function __construct() {
        if (isset($_SESSION['names'])) {
            $this->names = $_SESSION['names'];
        }
    }

    public function addClearNames() {
        if (isset($_POST['add'])) {
            $this->addName($_POST['name']);
        } elseif (isset($_POST['clear'])) {
            $this->clearNames();
        }
        return $this->formatNames(); 
    }

    
    private function addName($name) {
        $nameParts = explode(' ', $name); 
        if (count($nameParts) == 2) {
            $lastname = $nameParts[1];
            $firstname = $nameParts[0];
            $formattedName = "$lastname, $firstname"; 
            $this->names[] = $formattedName; 
        }
        $this->sortNames();
        $_SESSION['names'] = $this->names; 
    }

   
    private function clearNames() {
        $this->names = [];
        $_SESSION['names'] = []; 

    }
    private function sortNames() {
        sort($this->names);
    }


    private function formatNames() {
        return implode("\n", $this->names); 
    }
}