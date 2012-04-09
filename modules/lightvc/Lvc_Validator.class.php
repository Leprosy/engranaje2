<?php

/**
 * A Validator interface
 * 
 * 
 * @package lightvc
 * @author Miguel Rojas
 * @since 2012-01-12
 * */
class Lvc_Validator {
    
    protected $validator;

    public function __construct($type, $options = array()) {
        $classname = 'Lvc_Validator' . $type;
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
class Lvc_ValidatorNotnull {
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
class Lvc_ValidatorNum {
    public function isValid($data) {
        return is_numeric($data);
    }
}