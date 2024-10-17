<?php
session_start(); // Start session to store the names across requests

class AddNamesProc {
    private $names = [];

    // Constructor to load existing names from the session
    public function __construct() {
        if (isset($_SESSION['names'])) {
            $this->names = $_SESSION['names'];
        }
    }

    // Method to add or clear names based on the submitted form
    public function addClearNames() {
        if (isset($_POST['add'])) {
            $this->addName($_POST['name']);
        } elseif (isset($_POST['clear'])) {
            $this->clearNames();
        }
        return $this->formatNames(); // Return the formatted name list
    }

    // Adds a name to the list and stores it in the session
    private function addName($name) {
        $nameParts = explode(' ', $name); // Split the input into firstname and lastname
        if (count($nameParts) == 2) {
            $lastname = $nameParts[1];
            $firstname = $nameParts[0];
            $formattedName = "$lastname, $firstname"; // Format: lastname, firstname
            $this->names[] = $formattedName; // Add to the list
        }
        $this->sortNames(); // Sort the names after adding
        $_SESSION['names'] = $this->names; // Store the updated list in session
    }

    // Clears all the names from the list and the session
    private function clearNames() {
        $this->names = [];
        $_SESSION['names'] = []; // Reset session data
    }

    // Sorts the names alphabetically by lastname, firstname
    private function sortNames() {
        sort($this->names);
    }

    // Formats the list of names for the textarea
    private function formatNames() {
        return implode("\n", $this->names); // Join the names with new lines
    }
}