<?php 

class Calculator {

    public function calc($operator = null, $num1 = null, $num2 = null) {
        
        
        if ($operator === null || $num1 === null || $num2 === null) {
            return "<p>Cannot perform operation. You must provide an operator and two numbers.</p>";
        }

        
        if (!in_array($operator, ['+', '-', '*', '/'])) {
            return "<p>Cannot perform this operation. Use one of the acceptable operators: +, -, *, /</p>";
        }
    
        
        if (!is_numeric($num1) || !is_numeric($num2)) {
            return "<p>Cannot perform this operation. You must use two integers or floats for the numbers.</p>";
        }

        
        switch ($operator) {
            case "+":
                $result = $num1 + $num2;
                return "<p>The calculation is $num1 + $num2. The answer is $result.</p>";

            case "-":
                $result = $num1 - $num2;
                return "<p>The calculation is $num1 - $num2. The answer is $result.</p>";

            case "*":
                $result = $num1 * $num2;
                return "<p>The calculation is $num1 * $num2. The answer is $result.</p>";

            case "/":
                if ($num2 == 0) {
                    return "<p>The calculation is $num1 / $num2. The answer cannot be defined as you cannot divide by 0.</p>";
                }
                $result = $num1 / $num2;
                return "<p>The calculation is $num1 / $num2. The answer is $result.</p>";

            default:
                return "<p>Unknown operator. Cannot perform operation.</p>";
        }
    }

}

?>