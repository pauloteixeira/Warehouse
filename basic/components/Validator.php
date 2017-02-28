<?php

    namespace app\components;

    class Validator
    {
        public function isEmail( $value )
        {
            return (!filter_var($value, FILTER_VALIDATE_EMAIL)) ? false : true;
        }
    }
