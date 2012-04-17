<?php

/**
 * A Validator interface
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_Validator {
    
    protected $validator;

    public function __construct($type, $options = array()) {
        $classname = 'Eng_Validator' . $type;
        $this->validator = new $classname($options);
    }

    public function isValid($data) {
        return $this->validator->isValid($data);
    }
}


/**
 * A Not Null Validator
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_ValidatorNotnull {
    public function isValid($data) {
        return !is_null($data) && $data!==false && $data!='';
    }
}

/**
 * A Numeric Validator
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Eng_ValidatorNum {
    public function isValid($data) {
        return is_numeric($data);
    }
}