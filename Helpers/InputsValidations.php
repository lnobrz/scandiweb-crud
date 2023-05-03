<?php

class InputsValidations
{
    public static function validFloatInput(float $number): bool
    {
        if ((is_numeric($number)) && ($number <= 3.402823E+38)) {
            return true;
        } else {
            return false;
        }
    }

    public static function validStringInput(string $text)
    {
        if ((strlen($text) >= 0) && (!strlen($text) <= 535)) {
            return true;
        } else {
            return false;
        }
    }
}
