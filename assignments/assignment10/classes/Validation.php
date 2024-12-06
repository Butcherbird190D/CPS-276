<?php

class Validation{
    /* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
    private $error = false;

    /* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
    public function checkFormat($value, $regex)
    {
        switch($regex){
            case "name": return $this->name($value); break;
            case "phone": return $this->phone($value); break;
            case "address": return $this->address($value); break;
            case "city": return $this->city($value); break;
            case "email": return $this->email($value); break;
            case "dob": return $this->dob($value); break;
            case "state": return $this->state($value); break;
            case "ageRange": return $this->ageRange($value); break;
            case "password": return $this->password($value); break;  // Added password validation case
        }
    }

    /* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS */
    private function name($value){
        // Regex for name: only letters, spaces, and hyphens
        $match = preg_match('/^[a-zA-Z\s\-]+$/', $value);
        return $this->setError($match);
    }

    private function phone($value){
        // Regex for phone: pattern like 123.456.7890
        $match = preg_match('/^\d{3}\.\d{3}\.\d{4}$/', $value);
        return $this->setError($match);
    }

    private function address($value){
        // Regex for address: allows words, spaces, commas, periods, apostrophes, and hyphens
        $match = preg_match('/^[\w\s\.,\'\-]+$/', $value);
        return $this->setError($match);
    }

    private function city($value){
        // Regex for city: only letters, spaces, apostrophes, and hyphens
        $match = preg_match("/^[a-zA-Z\s\-']+$/", $value);
        return $this->setError($match);
    }

    private function email($value){
        // Regex for email: general email format
        $match = preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value);
        return $this->setError($match);
    }

    private function dob($value){
        // Assuming the value is in YYYY-MM-DD format (HTML date input type already formats this)
        $match = preg_match('/^\d{4}-\d{2}-\d{2}$/', $value);
        return $this->setError($match);
    }

    private function state($value){
        // Assuming state is selected from a dropdown and no regex is required.
        // You can add checks for specific states or leave it as an empty validation.
        if (empty($value)) {
            $this->error = true;
            return "error";
        } else {
            return "";
        }
    }

    private function ageRange($value){
        // Age range is selected via radio buttons, so we just need to check if it has a value.
        if (empty($value)) {
            $this->error = true;
            return "error";
        } else {
            return "";
        }
    }

    private function password($value)
    {
        $match = preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $value);
        return $this->setError($match);
    }

    /* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
    private function setError($match){
        if(!$match){
            $this->error = true;
            return "error";
        }
        else {
            return "";
        }
    }

    /* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
    public function checkErrors(){
        return $this->error;
    }
}
