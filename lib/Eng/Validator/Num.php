<?php

/**
 * A Numeric Validator
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Validator_Num extends Eng_Validator {
    public function isValid($data) {
        return is_numeric($data);
    }
}