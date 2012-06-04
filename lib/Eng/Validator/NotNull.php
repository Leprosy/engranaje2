<?php

/**
 * A Not Null Validator
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Validator_NotNull extends Eng_Validator {
    public function isValid($data) {
        return !is_null($data) && $data!==false && $data!='';
    }
}