<?php
    namespace Core;
    class Validator {
        // Pure function (Just serve purpose without using external data/reference)
        // Use static for pure function
        public static function string($value, $min = 1, $max = INF){
            $value = trim($value);
            return strlen($value) >= $min && strlen($value) < $max;
        }

        public static function email($value){
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
    }